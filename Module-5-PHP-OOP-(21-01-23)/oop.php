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

// class Human {
//     public $name;
//     function sayHi() {
//         echo "Salam \n";
//         $this->sayName();

//     }

//     private function sayName(){
//         echo "My Name is {$this->name}\n";
//     }
// }

// class Cat{
//     function sayHi() {
//         echo "Mewo \n";
//     }
// }

// class Dog{
//     function sayHi() {
//         echo "Woof \n";
//     }
// }

// $h1 = new Human();
// $h2 = new Human();
// $h1->name = "Ruble"; // set
// $h2->name = "Obaydul";
// $c1 = new Cat();
// $d1 = new Dog();

// $h1->sayName();
// $h1->sayName();
// echo $h1->name; // get
// $c1->sayHi();


// $h2->sayHi();
// $h2->sayName();
// echo $h2->name; // get
// $c1->sayHi();

/**
 * 3 A class's constructor method that runs automatically when an object is created from the class
 * ================================================================================
 * 
 */

//  class Human {
//     public $name;
//     public $age;
//     function __construct($personName,$personAge=0) {
//         // echo "New Human Object is Created. \n";
//         $this->name = $personName;
//         $this->age = $personAge;

//     }

//     function sayHi(){
//         echo "Salam\n";
//         $this->sayName();
//     }

//     function sayName(){
//         if($this->age){
//             echo "My Name is {$this->name}, I am {$this->age} year old\n";
//         }else {
//             echo "My Name is {$this->name}, I don't know how old i am. \n";
//         }
//     }
// }

// $h1 = new Human("Obaydul",22);
// $h2 = new Human("Rifat",13);
// $h3 = new Human("Noor");
// // $h1->name = "Obaydul";
// $h1->sayHi();
// $h2->sayHi();
// $h3->sayHi();

/**
 * 4 Public and Private Methods and Properties of Classes
 * ==================================================================================
 * 
 */
// class Fund {
//     private $fund;

//     function __construct($initialFund = 0){
//         $this->fund = $initialFund;
//     }

//     public function addFund($money) {
//         $this->fund += $money;
//         $this->deductFund(0);
        
//     }

//     private function deductFund($money) {
//         $this->fund -= $money;
//     }

//     public function getTotal() {
//         echo "Total fund is {$this->fund}\n";
//     }
// }

// $ourFund = new Fund(100);
// // $ourFund->fund = 75;

// $ourFund->getTotal();
// $ourFund->addFund(10);
// // $ourFund->deductFund(7);
// $ourFund->getTotal();

/**
 * 5 Writing a Real Life Useful Class
 * ===============================================================
 *  #ff0000 // 155, 0,0
 */

 class RGB {
    private $color; //#ff0000
    private $red; 
    private $green;
    private $blue; 

    private function __construct($colorCode = '') {
        $this->color = ltrim($colorCode,"#");
        $this->parseColor();
    }

    private function getColor() {
        return $this->color;
    }

    private function setColor($colorCode) {
        $this->color = ltrim($colorCode,"#");
        $this->parseColor();
    }

    private function parseColor() {
       if($this->color) {
            $colors  = sscanf($this->color, '%02x%02x%02x');
            print_r($colors);
       }
    }
 }

$myColor = new RGB("#ffef27");

