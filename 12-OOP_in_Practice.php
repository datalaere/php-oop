<?php

/* This is an example of everything we have learne and how to use OOP in practice. Here we will try making an calculator. */

class Calculator 
{
  protected $result;
  protected $operation;
  
  public function setOperation(OperatorInterface $operation)
  {
    $this->operation = $operation;
  }
  
  public function calculate()
  {
    foreach(func_get_args() as $number) {
      $this->result = $this->operation->run($number, $this->result);
    }
  }
  
  public function getResult()
  {
    return $this->result;
  }
}


interface OperatorInterface 
{
  public function run($number, $result);
}


class Adder implements OperatorInterface
{
  public function run($number, $result) 
  {
    return $result + $number;
  }
}


class Subtractor implements OperatorInterface
{
  public function run($number, $result) 
  {
    return $result - $number;
  }
}


class Divider implements OperatorInterface
{
  public function run($number, $result) 
  {
    return $result / $number;
  }
}


class Multiplier implements OperatorInterface
{
  public function run($number, $result) 
  {
    return $result * $number;
  }
}


// Instantiate
$c = new Calculator; 

// Addition
$c->setOperation(new Adder);
$c->calculate(30, 30); // 60

// Subtraction
$c->setOperation(new Subtractor);
$c->calculate(10); // 50

// Division
$c->setOperation(new Divider);
$c->calculate(2); // 25

// Muliplication
$c->setOperation(new Multiplier);
$c->calculate(4); // 100!

// Should give "100"
echo $c->getResult();

