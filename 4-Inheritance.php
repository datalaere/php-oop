<?php 

class Bird { 
   
  public $canFly; 
  public $legCount 
     
  public function __construct($canFly, $legCount) { 
      $this->canFly = $canFly; 
    $this->legCount = $legCount; 
  } 
   
  public function getCanFly() { 
      return $this->canFly; 
  } 
   
  public function getLegCount() { 
      return $this->legCount; 
  } 

}

// Setup Bird class
$bird = new Bird(true, 2);

// Will show "2"
echo $bird->getLegCount();
// Will be true
echo $bird->getCanFly();


// Class Pigeon inherients the Bird class and all its content by "extending" it
class Pigeon extends Bird { 

}

// Setup Pigeon class
$pigeon = new Pigeon(true, 2);

// Will show "2"
echo $pigeon->getLegCount();
// Will be true
echo $pigeon->getCanFly();

// Class Penguin inherients the Bird class and all its content by "extending" it
class Penguin extends Bird { 

}

// Setup Penguin class
$penguin = new Pigeon(false, 2);

// Will show "2"
echo $penguin->getLegCount();
// Will be false
echo $penguin->getCanFly();
