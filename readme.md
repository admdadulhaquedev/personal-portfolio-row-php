# Parsonal Protfolio With PHP


## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x/installation)


Clone the repository

    git clone git@github.com:karnoder1998/your-project-repo.git

Switch to the repo folder

    cd your-project-repo

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Generate a new JWT authentication secret key

    php artisan jwt:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:gothinkster/laravel-realworld-example-app.git
    cd laravel-realworld-example-app
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan jwt:generate 
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh
    

# Code overview

## Full Project Details

- Login User
- Register User
- Reset Password
- Create record in database through forms
- Update record in database through forms
- Delete record through forms.
- Search and view the record.
- Laravel admin panel.
- View Record in tables
- API
- Wouteing in web.php
- Blade Template
- Email Verification
- Authentication
- Filesystem
- Mail
- Migrations
- Policies
- Providers
- Requests
- Seeding & Factories

Beside Laravel, this project uses other tools like:

- [Bootstrap](https://getbootstrap.com/)
- [Font Awesome](https://fontawesome.com/)
- Javascript

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Authentication
 
This applications uses [Laravel](https://laravel.com/docs/8.x/authentication) - authentication.`Laravel` application's authentication configuration file is located at `config/auth.php`. This file contains several well-documented options for tweaking the behavior of Laravel's `Authorization` services.

- https://laravel.com/docs/8.x/authentication#introduction

----------

# See Demo in LIVE SERVER
 

- https://www.unishshoekattor24.com/
