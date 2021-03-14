Installation instructions
So far, the configuration is done in a standard way like all Laravel applications.

the repository is cloned.
the composer install command is executed, to install all the dependencies of the project.
the .env file is configured, with all the environment variables that were used in development.
At this point it is important to create a database in mysql with its respective user.

We give a suitable title to the platform.

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


We execute the migrations + the seeders php artisan migrate `"php artisan migrate: fresh --seed"`

At the moment these are the installation instructions.

Good day!

Diego Cardona
