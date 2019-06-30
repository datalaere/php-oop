<?php

/* This is an example of everything we have learne and how to use OOP in practice. Here we will try making an calculator. */

class Calculator 
{
  
  protected $result;
  protected $operation;
  
  public function setOperation($operation)
  {
    $this->operation = $operation;
  }

}


interface OperatorInterface 
{

}

class Adder 
{

}


class Subtractor 
{

}


class Divider 
{

}


class Multiplier 
{

}


// Instantiate
$c = new Calculator 

// Addition
$c->setOperation(new Adder);
$c->calculate(20, 30); // 50

// Subtraction
$c->setOperation(new Subtractor);
$c->calculate(5); // 20

// Division
$c->setOperation(new Divider);
$c->calculate(2); // 25

// Muliplication
$c->setOperation(new Multiplier);
$c->calculate(5); // 100!

echo $c->getResult();

