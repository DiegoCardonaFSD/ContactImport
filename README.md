# CONTACT IMPORTER BY Diego Cardona

## IMPORTANT
In the following link you can find an explanatory video of how it works and how the solution was built..

(Link) [http://thedeveloper.co/contactimporter/]

## Information to test
- Url: "http://contactimporter.thedeveloper.co/"
- User: diego0123@gmail.com
- Pass: Admin1234/

Note: this platform is hosted in DigitalOcean, Ubuntu 18.04


## Requirements
- Laravel 8
- PHP 7.4
- Mysql 5 - MariaDB 10

## Installation instructions

So far, the configuration is done in a standard way like all Laravel applications.

1) clone the repository.
2) execute the command `"composer install"`, to install all the dependencies of the project.
3) create a mysql database, we need a user with password and privileges over this database.
4) configure the .env file, you can use the base .env configuration(.env.example), but it's important configure the following variables(below): 

Environment variables, with a specific configuration

`APP_NAME = "ContactImporter"`

`DB_CONNECTION = mysql`

`DB_HOST = 127.0.0.1`

`DB_PORT = 3306`

`DB_DATABASE = $ DATABASE`

`DB_USERNAME = $ USERNAME`

`DB_PASSWORD = $ PASSWORD`

`QUEUE_CONNECTION = sync`

`MAIL_MAILER = smtp`

`MAIL_HOST = $ MAIL_HOST`

`MAIL_PORT = $ PORT`

`MAIL_USERNAME = $ MAIL_USERNAME`

`MAIL_PASSWORD = $ MAIL_PASSWORD`

`MAIL_ENCRYPTION = null`

`MAIL_FROM_ADDRESS = MAIL_FROM_ADDRESS`

`MAIL_FROM_NAME = "$ {APP_NAME}"`


5) execute the migrations + the seeders 

`"php artisan migrate: fresh --seed"`

Enjoy!

Good day!

Diego Cardona
