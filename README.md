# Employee API

<div align="center">
    <img alt="Kanban" width="450px" src="https://cdn.dribbble.com/userupload/12747635/file/original-0bbd3eec3342ea5d1d5f372a9a98a5d7.png?resize=1024x768&vertical=center" />

![Status](http://img.shields.io/static/v1?label=STATUS&message=FINALIZADO&color=RED&style=for-the-badge)

![Top language](https://img.shields.io/github/languages/top/felipesilva15/employees-api.svg)
![Language count](https://img.shields.io/github/languages/count/felipesilva15/employees-api.svg)
![Repository size](https://img.shields.io/github/repo-size/felipesilva15/employees-api.svg)
[![Last commit](https://img.shields.io/github/last-commit/felipesilva15/employees-api.svg)](https://github.com/felipesilva15/employees-api/commits/main)
[![Issues](https://img.shields.io/github/issues/felipesilva15/employees-api.svg)](https://github.com/felipesilva15/employees-api/issues)
[![Licence](https://img.shields.io/github/license/felipesilva15/employees-api.svg)](https://github.com/felipesilva15/employees-api/blob/main/LICENSE)

</div>

API RESTful desenvolvida em Laravel com MySQL, que permite a gestão de funcionários, cargos e empresas. Possui autenticação via JWT, estrutura de consulta dinâmica, documentação Swagger, CI/CD com publicação no DockerHub e deploy em uma VPS.

## 📑 Sumário

- [Descrição geral](#-descrição-geral)
- [Executando localmente](#-executando-localmente)
- [Executando com Docker](#-executando-com-docker)
- [Testes](#-testes)
- [Documentação no Swagger](#-documentação-no-swagger)
- [Endpoints](#-endpoints)
- [Tecnologias utilizadas](#%EF%B8%8F-tecnologias-utilizadas)
- [Autores](#%EF%B8%8F-autores)
- [Licença](#-licença)

## 📘 Descrição Geral

- **Versão:** 1.0.0  
- **Autor:** [Felipe Silva](mailto:felipe.allware@gmail.com)  
- **Licença:** [Licença API](https://github.com/felipesilva15/employees-api/blob/main/LICENSE)
- **Deploy:** [Swagger](https://employee-api.felipesilva15.com.br/api/documentation)

### Principais funcionalidades

- CRUD completo para Employees, Positions e Enterprises.
- Documentação gerada com Swagger (OpenAPI 3).
- CI/CD com GitHub Actions e deploy para DockerHub.
- Autenticação com JWT.

## 🚀 Executando localmente

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.

### 📋 Pré-requisitos

- PHP v8.2.0
- Composer

### 🔧 Instalação

1. Clone o projeto utilizando o comando abaixo

    ``` bash
    git clone https://github.com/felipesilva15/employees-api.git
    ```

2. Acesse a pasta dos fonts deste projeto

    ```bash
    cd employees-api
    ```

3. Instale as dependências do projeto

    ```bash
    composer install
    ```

4. Copie o arquivo de exemplo de variáveis de ambiente  

    ```bash
    cp .env.example .env
    ```

5. Atualize as credenciais de acesso ao seu banco de dados e secret para o JWT preenchendo os campos abaixo

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=
    DB_USERNAME=root
    DB_PASSWORD=
    
    JWT_SECRET=
    ```

6. Gere as tabelas da aplicação e a semente para o serviço de autenticação

    ```bash
    php artisan migrate --seed
    ```

7. Inicie a aplicação

    ```bash
    php artisan serve
    ```

8. Acesse a aplicação em <http://localhost:8000>.

## 🐳 Executando com Docker

```bash
# Build da imagem
docker build -t felipesilva15/employees-api .

# Rodar container
docker run -d -p 8000:80 felipesilva15/employees-api
```

## 🧪 Testes

Execute o comando de testes do Laravel (PHPUnit).

```bash
php artisan test
```

## 📄 Documentação no Swagger

Acesse via a documentação através do endpoint `/api/documentation` (Veja a versão do [deploy](https://employee-api.felipesilva15.com.br/api/documentation)).

## 📁 Endpoints

### 🔐 Authentication

| Método | Endpoint                        | Descrição                            |
|--------|---------------------------------|--------------------------------------|
| GET    | `/api/REST/API.APDATA.V1/AUTH`  | Obtém o token JWT para autenticação  |

### 🔧 Application

| Método | Endpoint                 | Descrição                       |
|--------|--------------------------|---------------------------------|
| GET    | `/api/application`       | Lista todas as aplicações       |
| GET    | `/api/application/{id}`  | Detalha uma aplicação por ID    |
| POST   | `/api/application`       | Cadastra uma nova aplicação     |
| PUT    | `/api/application/{id}`  | Atualiza uma aplicação          |
| DELETE | `/api/application/{id}`  | Remove uma aplicação            |

### 👤 Employee

| Método | Endpoint              | Descrição                       |
|--------|-----------------------|---------------------------------|
| GET    | `/api/employee`       | Lista todos os funcionários     |
| GET    | `/api/employee/{id}`  | Detalha um funcionário por ID   |
| POST   | `/api/employee`       | Cadastra um novo funcionário    |
| PUT    | `/api/employee/{id}`  | Atualiza um funcionário         |
| DELETE | `/api/employee/{id}`  | Remove um funcionário           |

### 🏢 Enterprise

| Método | Endpoint                | Descrição                      |
|--------|-------------------------|--------------------------------|
| GET    | `/api/enterprise`       | Lista todas as empresas        |
| GET    | `/api/enterprise/{id}`  | Detalha uma empresa por ID     |
| POST   | `/api/enterprise`       | Cadastra uma nova empresa      |
| PUT    | `/api/enterprise/{id}`  | Atualiza uma empresa           |
| DELETE | `/api/enterprise/{id}`  | Remove uma empresa             |

### 💼 Position

| Método | Endpoint             | Descrição                       |
|--------|----------------------|---------------------------------|
| GET    | `/api/position`      | Lista todos os cargos           |
| GET    | `/api/position/{id}` | Detalha um cargo por ID         |
| POST   | `/api/position`      | Cadastra um novo cargo          |
| PUT    | `/api/position/{id}` | Atualiza um cargo               |
| DELETE | `/api/position/{id}` | Remove um cargo                 |

### 🔍 Query

| Método | Endpoint                          | Descrição                                      |
|--------|-----------------------------------|------------------------------------------------|
| GET    | `/api/REST/API.APDATA.V1/QUERYS`  | Lista os funcionários com base nos parâmetros  |

## 🛠️ Tecnologias utilizadas

- **Laravel 11.09**
- **PHP 8.2**
- **MySQL**
- **JWT**
- **Swagger UI**
- **Docker**
- **GitHub Actions (CI/CD)**

## ✒️ Autores

- **Felipe Silva** - *Desenvolvedor e mentor* - [felipesilva15](https://github.com/felipesilva15)

## 📄 Licença

Este projeto está sob a licença (MIT) - veja o arquivo [LICENSE](https://github.com/felipesilva15/FoxtrotToyStore/blob/main/LICENCE) para detalhes.

---

Documentado por [Felipe Silva](https://github.com/felipesilva15) 😊
