<?php

/* Magic Methods are methods built into PHP which aids in class usage. These methods always use TWO underscores like so "__". 
The most popular are: */

// __contruct(): the constructor of a class.
// __set($property, $value): The "__set()" method will be called when setting a member variable of a class.
// __get(): The "__get()" method will be called when getting a member variable of a class.
// __call($funName, $arguments): The "__call()" method will be called when an undefined or inaccessible method is called.
// __toString(): The "__toString()" method will be called when using echo method to print an object directly.

// Find more here with simple examples: https://www.tutorialdocs.com/article/16-php-magic-methods.html


// Example

class Collection implements 
  Countable, 
  JsonSerializable 
{
  // Default properties
  protected $items = [];
  
  // Magic method
  public function __set($key) 
  {
    $this->set($key, $value);
  }
  
  // Magic method
  public function __get($value) 
  {
    return $this->get($value);
  }
  
  // Magic method. "__callStatic" is bassically the same for static methods
  public function __call($func, $args) 
  {
    return $func . ' has been called with arguments' . implode(', ', $args);
  }
  
  // Magic method
  public function __toString() 
  {
    return $this->jsonSerialize();
  }
   
  public function add($value) 
  {
    $this->items[] = $value;
  }
  
  public function set($key, $value) 
  {
    $this->items[$key] = $value;
  }
  
  public function get($key) 
  {
    return array_key_exists($key, $this->items) ? $this->items[$key] : null;
  }
  
  // interface method
  public function jsonSerialize() 
  {
    return json_encode($this->items);
  }
  
  // interface method
  public function count() 
  {
    return count($this->items);
  }
  
  public function all() 
  {
    return $this->items;
  }
  
}


// Instantiate class
$c = new Collection();

// Normal methods
$c->add('foo');
$c->add('bar');

// __set(): Setting a property, but is overwritten by the "__set" magic method, and thereby doing what we have defined instead.
$c->john = 'doe';
// will return the array with "john => doe"
print_r( $c->all() );

// __get(): Will return "doe"
echo $c->get('john');
// This with "__get" magic method will also work
echo $c->john
  
 // __call(): Will try to call function if not defined
 echo $c->hello('world');
  
 // __toString(): Will return an output of the class if defined
echo $c;
