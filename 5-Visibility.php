<?php 

/* Visibility scopes */

// public
// protected
// private


// Default class
class Bird { 
   
  private $canFly; 
  protected $legCount 
     
  public function __construct($canFly, $legCount) { 
    $this->canFly = $canFly; 
    $this->legCount = $legCount; 
  } 
   
  private function getCanFly() { 
      return $this->canFly; 
  } 
   
  protected function getLegCount() { 
      return $this->legCount; 
  } 
}

// Setup Bird class
$bird = new Bird(true, 2);
// Will show "2" (no difference)
echo $bird->getLegCount();
// Will be true (no difference)
echo $bird->getCanFly();


// Class Pigeon inherients the Bird class and all its content by "extending" it
class Pigeon extends Bird { 

}

// Setup Pigeon class
$pigeon = new Pigeon(true, 2);
Will show as normal, because protected properties (or methods) can be accessed by extending classes
echo $pigeon->getLegCount();
// Will give an error, because private properties (or methods) can ONLY be accessed by the default class
echo $pigeon->getCanFly();
