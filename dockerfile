# ============================================================
# Stage 1 – Dependências PHP via Composer
# ============================================================
FROM composer:2 AS vendor

WORKDIR /app

# Copia lock + json primeiro para aproveitar o cache de layers
COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --no-scripts \
    --no-autoloader \
    --prefer-dist \
    --ignore-platform-reqs

COPY . ./

RUN composer dump-autoload --optimize --no-dev

# ============================================================
# Stage 2 – Imagem final de produção
# ============================================================
FROM php:8.4-apache

# Instala extensões e limpa cache
RUN apt-get update && apt-get install -y --no-install-recommends \
        libzip-dev \
        unzip \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        libpq-dev \
        gettext-base \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        zip \
        opcache \
    && apt-get purge -y --auto-remove \
    && rm -rf /var/lib/apt/lists/*

# Habilita mod_rewrite para o Laravel
RUN a2enmod rewrite

# VirtualHost próprio
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Configurações de PHP/OPcache
COPY docker/php.ini /usr/local/etc/php/conf.d/custom.ini

WORKDIR /var/www/html

# Copia o código da aplicação com ownership correto direto no COPY
COPY --chown=www-data:www-data . .
COPY --chown=www-data:www-data --from=vendor /app/vendor ./vendor

# Garante que os diretórios necessários existam com permissões corretas.
RUN mkdir -p storage/logs \
             storage/framework/cache \
             storage/framework/sessions \
             storage/framework/views \
             bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache \
    && chmod -R 755 public

COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 80

# ENTRYPOINT roda o script de inicialização (migrations, caches, etc.)
# CMD é passado como argumento para o entrypoint e pode ser sobrescrito
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["apache2-foreground"]