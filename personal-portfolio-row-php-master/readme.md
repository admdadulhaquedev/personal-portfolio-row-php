# Parsonal Protfolio With PHP


## Installation

Clone the repository

    git clone github.com/karnoder1998/personal-portfolio-row-php.git
    

Extract the repo folder

    Right Click on Folder and Select Extract Here

Install XAMPP Softwer

- Go to [XAMPP](https://www.apachefriends.org/download.html)
- Download [XAMPP](https://www.apachefriends.org/download.html)
- Install XAMPP

Copy the project and past Your htdocs forler

    C:\xampp\htdocs


Run the Apache & MySQL (**XAMPP Control Palen**)

![Alt text](C:\xampp\htdocs\documentation\1.jpg "images")

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
