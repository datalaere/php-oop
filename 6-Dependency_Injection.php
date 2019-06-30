<?php

/* Theoretical example of class dependency injection */

class Chest 
{

  protected $lock;
  protected $isClosed;

  // "Type-hinting" what class should be "expected upon injection" while the class contructs
  public function __contruct(Lock $lock) 
  {
    $this->lock = $lock;
  }
  
  // Optional function parameter
  public function close($lock = true) 
  {
    if($lock === true) {
      $this->lock->lock();
    }
    
    $this->isClosed = true;
    
    echo "close";
  }
  
  public function isClosed() 
  {
    return $this->isClosed;
  }
  
  public function open() 
  {
    if( $this->lock->isLocked() ) {
      $this->lock->unLock();
    }
    
    $this->isClosed = false;
    
    echo "open";
  }
  
}


class Lock 
{
  
  protected $isLocked;
  
  public function lock() 
  {
    $this->isLocked = true;
  }
  
  public function unLock() 
  {
    $this->isLocked = false;
  }
  
  public function isLocked() 
  {
    return $this->isLocked;
  }
  
}


// Dependency injection, by "giving" a specific class to an other class that requires it to run 
$chest = new Chest(new Lock);
$chest->close();
$chest->open();


/* Real life example of dependency injection */

class Database 
{

  // A static property of the class
  protected static $instance;

  // We create a new static instance of the class itself
  public static function getInstance() 
  {
    if(!static::$instance) {
      static::$instance = new self;
    }
    
    return static::$instance;
  }
  
  public function query($sql) 
  {
    // PDO database driver
    $this->pdo->prepare($sql)->execute();
  }
  
}


class User 
{

  protected $db;

  // "Type-hinting" what class should be "expected upon injection" while the class contructs
  public function __contruct(Database $db) 
  {
    $this->db = $db;
  }
  
  // GOOD dependency injection
  public function create(array $data) 
  {
    $this->db->query('INSERT INTO `users` ...');
  }

  // BAD dependency injection becuase of "tight coupling", which makes it harder to chance in future
  public function create(array $data) 
  {
    $db = Database::getInstance();
    $db->query('INSERT INTO `users` ...');
  }

}


// Dependency injection, by "giving" a specific class to an other class that requires it to run 
$user = new User(new Database);
$user->create([
  'username' => 'John'
]);

