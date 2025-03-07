<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# ![Laravel Shop App](logo.png)

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Clone the repository

    git clone https://github.com/VktorK/TaskManager.git

Switch to the repo folder

    cd TaskManager

Install all the dependencies using composer

    composer install

Update all the dependencies using composer

    composer update

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Generate a new JWT authentication secret key

    php artisan jwt:secret

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Generate L5-Swagger service

    php artisan l5-swagger:generate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

You can now access the swagger at http://localhost:8000/api/swagger

**TL;DR command list**

    git clone https://github.com/VktorK/TaskManager.git
    cd TaskManager
    composer install
    composer update
    cp .env.example .env
    php artisan key:generate
    php artisan jwt:generate
    php artisan l5-swagger:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users, roles, cars, car-brands, car-models. This can help you to quickly start testing the api and start using it with ready content.**

Open the DatabaseSeeder and set the property values as per your requirement

    database/seeds/DatabaseSeeder.php

Or run the database seeder and enjou

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh

# Code overview

## Dependencies

- [jwt-auth](https://github.com/tymondesigns/jwt-auth) - For authentication using JSON Web Tokens
- [laravel-l5-swagger](https://github.com/DarkaOnLine/L5-Swagger) - For handling L5-Swagger recource handing (L5-Swagger)

## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers/Admin|User` - Contains all the admin|user|common controllers
- `app/Http/Middleware` - Contains the JWT auth middleware, isAdmin middleware
- `app/Http/Requests/Admin|User group` - Contains all the admin|user group form requests
- `app/Http/Resource/Admin|User group` - Contains all the admin|user group resource layer
- `app/Http/Filters` - Contains the query filters used for filtering admin|user requests
- `app/Services` - Contains сontroller methods to improve business logic and security
- `config` - Contains all the application configuration files
- `database/factories` - Contains the model factory for all the models
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `routes` - Contains all the api routes defined in api.php file
- `tests` - Contains all the application tests

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/api/swagger
 
# Authentication
 
This applications uses JSON Web Token (JWT) to handle authentication. The token is passed with each request using the `Authorization` header with `Token` scheme. The JWT authentication middleware handles the validation and authentication of the token. Please check the following sources to learn more about JWT.
 
- https://jwt.io/introduction/
- https://self-issued.info/docs/draft-ietf-oauth-json-web-token.html

----------

# L5 Swagger - OpenApi or Swagger Specification for Laravel project (L5-Swagger)
 
This package is a wrapper of Swagger-php and swagger-ui adapted to work with Laravel. The actual Swagger spec is beyond the scope of this package. All L5-Swagger does is package up swagger-php and swagger-ui in a Laravel-friendly fashion, and tries to make it easy to serve. The default configuration allows requests from `http://localhost:8000/api/swagger`
 

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
