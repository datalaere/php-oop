<?php 

// PHP class 
class Person { 

  public $name; 
  public $age; 
   
  // Add contructor to class 
  public function __contruct($name, $age) { 
    $this->name = $name; 
    $this->age = $age; 
  } 
  
  // Class method (function)
  public function sentence() { 
      return $this->name . ' is ' . $this->age . ' years old'; 
  } 

} 

// Instantiate class and set default contruct parameters 
$person = new Person('John', 20);

// Will show "John is 20 years old."
echo $person->sentence(); 
