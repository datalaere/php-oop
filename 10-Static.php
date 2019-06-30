<?php

/* Static is a simple concept BUT most be used with care, as it can easily lead to bad code practice. */

class Example 
{
  
  public static $var = 'foobar';

  public static function hello() 
  {
    return 'Hello World!';
  }
  
  public static function foobar() 
  {
    return $this->var;
  }

}

// Can be called without instantiation - returns "Hello World!".
echo Example::hello();
// Returns "foobar".
echo Example::$var;

// This will not work, because the class is NOT instantiated
echo Example::foobar();
