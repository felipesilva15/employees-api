#!/bin/sh
set -e

# Geração do .env a partir do template com variáveis de ambiente
echo "[entrypoint] Gerando .env a partir do template..."
envsubst < .env.template > .env

# Chaves da aplicação
echo "[entrypoint] Gerando APP_KEY..."
php artisan key:generate --force

echo "[entrypoint] Gerando JWT_SECRET..."
php artisan jwt:secret --force

# Migrations
echo "[entrypoint] Rodando migrations..."
php artisan migrate --force

# Otimizações de produção (config, routes, views)
echo "[entrypoint] Cacheando configurações do Laravel..."
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Inicia o servidor — recebe o CMD do Dockerfile como argumento
echo "[entrypoint] Iniciando servidor: $*"
exec "$@"