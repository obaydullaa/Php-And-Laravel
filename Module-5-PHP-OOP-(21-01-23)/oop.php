<?php

/**
 * 1 Introduction to Object Oriented Programming
 * ============================================================== 
 *  Just Introduction about OOP
 */

/**
 * 2 Classes, Objects, Methods and Properties
 * ================================================================
 * 1. Camale case hose..
 * 
 */

class Human {
    public $name;
    function sayHi() {
        echo "Salam \n";
        $this->sayName();

    }

    private function sayName(){
        echo "My Name is {$this->name}\n";
    }
}

class Cat{
    function sayHi() {
        echo "Mewo \n";
    }
}

class Dog{
    function sayHi() {
        echo "Woof \n";
    }
}

$h1 = new Human();
$h2 = new Human();
$h1->name = "Ruble"; // set
$h2->name = "Obaydul";
$c1 = new Cat();
$d1 = new Dog();

// $h1->sayName();
// $h1->sayName();
// echo $h1->name; // get
// $c1->sayHi();


$h2->sayHi();
// $h2->sayName();
// echo $h2->name; // get
// $c1->sayHi();