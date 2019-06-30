<?php

/* Method chaining is just a way of using multiple methods together */

class Example {

  public function hello() {
    echo 'Hello ';
    
    // This is the important for getting chaining to work
    return $this;
  }
  
  public function world() {
    echo 'World1';
  }

}

// Instantiate
$example = new Example();

// Will return "Hello World!"
$example->hello()->world();

