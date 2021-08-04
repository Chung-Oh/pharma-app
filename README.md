# Pharma Inc

## Sumário:
- [Sobre](#sobre)
- [Objetivo](#objetivo)
- [Tecnologias utilizadas](#tecnologias-utilizadas)
- [Preparando ambiente](#preparando-ambiente)
- [Coleção compartilhada de endpoints para Teste](#coleção-compartilhada-de-endpoints-para-Teste)
- [Motivação](#motivação)

## Sobre

A empresa Pharma Inc, está trabalhando em um projeto em colaboração com sua base de clientes.

Para facilitar a gestão e visualização da informação dos seus pacientes de maneira simples e objetiva em um Dashboard onde podem listar, filtrar e expandir os dados disponíveis.

## Objetivo

Desenvolver REST API da empresa Pharma Inc.

Um sistema de atualização que irá importar os dados para a Base de Dados com a versão mais recente do [Random User](https://randomuser.me/documentation) uma vez ao dia.

## Tecnologias utilizadas

> - **MySQL** Server versão: **5.7**
> - **PHP** versão: **^7.2.5**
> - **[Laravel Framework](https://laravel.com/docs/7.x#server-requirements)** versão: **^7.29**
> - **[Task Scheduling](https://laravel.com/docs/7.x/scheduling)** - agendador de comandos do artisan para agendamento das importações
> - **[Guzzle HTTP client](https://laravel.com/docs/7.x/http-client)** - permiti que faça solicitações HTTP de saída rapidamente para se comunicar com outras aplicações web
> - **Postman** - desenvolvendo e testando os endpoints da REST API

## Preparando ambiente

Primeiramente devemos clonar o repositório `pharma-app`, segue abaixo algumas opções:

- Baixando ZIP

- Utilizando HTTPS:
```
git clone https://github.com/Chung-Oh/pharma-app.git
```

- Utilizando GitHub CLI:
```
gh repo clone Chung-Oh/pharma-app
```

Após clonar o projeto, devemos executar alguns comandos pelo terminal dentro do projeto clonado

- Baixando dependências do composer.json
```
composer install
```

- Configurando o arquivo `.env`
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={ sua_base_dados }
DB_USERNAME={ seu_username }
DB_PASSWORD={ sua_senha }
```

- Criar as tabelas com Laravel através do artisan
```
php artisan migrate
```

- Comando para importar dados da API de RandomUser e popular a base de dados do pharma-app
```
php artisan command:import-users
```

## Coleção compartilhada de endpoints para Teste

- **[Aqui coleção dos endpoints desenvolvidos Postman](https://www.postman.com/cryosat-geoscientist-79917435/workspace/pharma-app/documentation/16726946-df0d59c2-661b-4501-b1a6-bf5c0450c97d)**

[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/920591f9091311b8a775?action=collection%2Fimport)


## Motivação

Esse projeto foi um **[desafio lançado por TradeUP](https://github.com/tradeupgroup/testes-tradeup/blob/master/teste-1/teste-backend-2021.md)** para teste de desenvolvimento Backend.
