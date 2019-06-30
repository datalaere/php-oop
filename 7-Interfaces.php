<?php

// Interfaces are simply blueprints for a class

/* Built-in interfaces in PHP */

// Class example implementing an interface (default PHP interface)
// A class that implements an interface have to either be abstract or have all the methods of the implementing interfaces

class Collection implements Countable, JsonSerializable {

  // Default properties
  protected $items = [];
  
  public function add($value) {
    $this->items[] = $value;
  }
  
  public function set($key, $value) {
    $this->items[$key] = $value;
  }
  
  // interface method
  public function jsonSerialize() {
    return json_encode($this->items);
  }
  
  // interface method
  public function count() {
    return count($this->items);
  }
  
}


// Instantiate Collection
$c = new Collection();

$c->add('foo');
$c->add('bar');

echo $c->jsonSerialize();
echo $c->count();

/* Custom interfaces */

// Example of a custom interface. A good practice is to name it (and the file) as so: "Name"+"Interface"
interface TalkInterface {

  public function talk();

}

// Custom classes

class Dog implements TalkInterface {

  public function talk() {
    return 'Woof';
  }
  
}


class Cat implements TalkInterface {

  public function talk() {
    return 'Miauw';
  }

}

// Instantiate classes
$dog = new Dog();
$cat = new Cat();

echo $dog->talk();
echo $cat->talk();

