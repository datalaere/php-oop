<?php 

// PHP class 
class Person { 

  // Class properties
  public $name; 
  public $age; 
   
  // Class method (function)
  public function sentence() { 
      return $this->name . ' is ' . $this->age . ' years old'; 
  } 

} 

// Instantiate class 
$person = new Person(); 
$person->name = 'John'; 
$person->age = 20; 

// Will show "John is 20 years old."
echo $person->sentence(); 
