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
// Composer has many autoloading methods, but PSR-4 is highly recommended if your follow the PSR-2 standard.
// Read more: https://www.php-fig.org/psr/psr-4/
// Read more: https://www.php-fig.org/psr/psr-2/

// Composer is: "Composer is a tool for dependency management in PHP. 
// It allows you to declare the libraries your project depends on and it will manage (install/update) them for you."
// Read more here: https://getcomposer.org/doc/00-intro.md
// ! Please note, that Composer require you to use a terminal to use it properly. !

/* Example autoloading with Composer */

// Install composer from terminal
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '48e3236262b34d30969dca3c37281b3b4bbe3221bda826ac6a9a62d6444cdb0dcd0615698a5cbe587c3f0fe57a54d8f5') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

  
/* Composer classmap Autoload */
  
//Composer also requires a "composer.json"-file in the root of your project like so.
{
  "autoload": {
    "classmap": [
      "app/models"
    ]
  }
  // Require other dependencies yo your project
  "require": {}
}

// Run in your terminal (CMD on Windows, Linux or Mac terminal)
composer self-update // only when Composer has not been used in a while
composer dump-autoload -o // Composer will generate optimized autoload files (fastest autoloading) which will create the folder "vendor" if it does not exist.

// After installation, you can use Composers autoload file in your project
require_once _DIR_ . '/vendor/autoload.php';

// Example class (located in the folder "app/models/") will now load automatically.
class User 
{
  public function __contruct()
  {
    echo 'Start';
  }
}

// Returns "Start"
$user = new User();


/* Composer PSR-4 autoload */

//Composer also requires a "composer.json"-file in the root of your project like so.
{
  "autoload": {
    "psr-4": {
      // Namespace and folder location for your whole project
      "App\\": "app"
    }
  }
  // Require other dependencies yo your project
  "require": {}
}

// Run in your terminal (CMD on Windows, Linux or Mac terminal)
composer self-update // only when Composer has not been used in a while
composer dump-autoload -o // Composer will generate optimized autoload files (fastest autoloading) which will create the folder "vendor" if it does not exist.

// After installation, you can use Composers autoload file in your project
require_once _DIR_ . '/vendor/autoload.php';

// Example class (located in the folder "app/models/") will now load automatically with the correct namespace. 
// Notice the "\" is backwards.The namespace should be like the folder structure.
Namespace App\Models;

class User 
{
  public function __contruct()
  {
    return 'Start';
  }
}

// Returns "Start". "Use" in like "require" in this case.
use App\Models;
$user = new User();
