# PRKJECT SETUP

-   uncommit in the php conhig file "extension=initl"
-   composer create-project --prefer-dist cakephp/app myproject
-   If you have php and composer and dont need anything extra

# DATABSE CONNECTION & ENV

-   composer require vlucas/phpdotenv
-   go to php.init and uncommit PDO_psql and psql extensionss
-   install composer require vlucas/phpdotenv
-   then composer dump-autoload (for updating jason, this is though optional)
-   go to bootstrap (this is a file where it always begins when the server runs each time)
-   the bootstrp called in webroot>index.php and this called in root index.php
-   now set up env like use Dotenv\Dotenv;

    // Load environment variables from .env file in the root directory
    $dotenv = Dotenv::createImmutable(ROOT);
    $dotenv->load();

-   For connecting database u have to configur two files
    1.app_local.php (id,pass,host) and 2.app.php (port, class,connection, driver ...others) this is wired but actually this is system
-   must configur the 'test' in app_local.php (so much important)

# REQUIRE FILES AND FUNCTIONS

-   require_once **DIR** . '/../src/Helper/DbConnectionTest.php'; // Adjust the path accordingly
-   Testconnection();
-   when you require file then have all from this file (nv. dnt use include )

# Controller

-   bin/cake bake controller Student

# ROUTES

-   Follow the project

# MODEL and MIGRATION

-   In here things like kinds of diffrent so, follow the bellow approchs
-   bin/cake bake migration CreateStudents
-   bin/cake migrations migrate
-   bin/cake bake model Students
-   bin/cake bake migration AddNameAndAgeColumnsToStudents name:string age:integer
-   bin/cake migrations migrate

# must deactie application.php where csrf token is called. urai daw puro ta

# CORS

-   https://github.com/ozee31/cakephp-cors

follw this patter /../ for getting files
exmple: require_once **DIR** . '/../src/Helper/DbConnectionTest.php'; // Adjust the path accordingly

# Middlewares

-   Details in project but resgted the middleware into application.php

# Filtters:

-   Here has also filter option the prject didnt show i here but easy use chat gpT
-   remember midllewares are application lavel and filters are specific -routes or methods or controller level
