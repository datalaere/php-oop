<?php

/* Abstract classes are almost like interfaces in design, but are more like a combination of both classes and interfaces. */

// Example

abstract class Foo 
{

  public function bar() 
  {
    return 'foobar';
  }
  
  abstract function foobar();
  
}

// Instantiate
$foo = new Foo();

// Will return an error, because an abstract class cannot be instantiated.
echo $foo->bar();


class Bar extends Foo 
{

  public function hello() 
  {
    return 'Hello World!';
  }
  
  public function foobar() 
  {
    return 'Foobar!';
  }
  
}

// Instantiate
$bar = new Bar();

echo $bar->hello();
// Will also work because we extend the abstract class
echo $bar->bar();

// Abstract method return "Foobar!"
echo $bar->foobar();
