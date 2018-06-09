php composer.phar create-project slim/slim-skeleton [my-app-name]


php composer.phar require doctrine/orm
http://blog.sub85.com/slim-3-with-doctrine-2.html

#Create a file in root folder called "doctrine" (without .php), and put this:
<?php include("vendor/doctrine/orm/bin/doctrine.php"); ?>

Then you can use much easier doctrine, like:

php doctrine orm:schema-tool:create

[[6rc_yoD3,2


https://angular.io/tutorial/toh-pt5


ng generate service data