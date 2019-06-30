<?php

/* Autolading in PHP */

// Autoloading may refer to different things, but generally it is how you load your classes.
// If you just use "require" (even in ONE big file) this still not autoloading, 
// as ALL your files have to be required at once.

/* PHP standard autolading */
// Simple autolading built-into PHP

spl_autoload_register(function($class) {
  // In this case all class files would be located in the folder "classes".
  require_once "classes/{$class}.php";
});


/* Autoloading with Composer - Dependency Manager for PHP */

// Instead of creating your own autoloader, you can just use Composer, 
// which give you many more options when working with other projects.
// Composer is: Composer is a tool for dependency management in PHP. 
// It allows you to declare the libraries your project depends on and it will manage (install/update) them for you.
// Read more here: https://getcomposer.org/doc/00-intro.md

// Example autoloading with Composer

// After installation, you can use Composers autoload file in your project
require '/vendor/autoload.php';

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));
$log->addWarning('Foo');

// Or you can add your own namespace
$loader = require __DIR__ . '/vendor/autoload.php';
$loader->addPsr4('Acme\\Test\\', __DIR__);
