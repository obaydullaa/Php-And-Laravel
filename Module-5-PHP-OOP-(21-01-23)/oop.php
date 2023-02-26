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

//  class RGB {
//     private $color; //#ff0000
//     private $red; 
//     private $green;
//     private $blue; 

//     public function __construct($colorCode = '') {
//         $this->color = ltrim($colorCode,"#");
//         $this->parseColor();
//     }

//     public function getColor() {
//         return $this->color;
//     }

//     public function getRGBColor() {
//         return array($this->red, $this->green, $this->blue);
//     }

//     public function readRGBColor() {
//         echo "Red = {$this->red}\nGreen = {$this->green}\nBlue = {$this->blue}";
//     }

//     public function setColor($colorCode) {
//         $this->color = ltrim($colorCode,"#");
//         $this->parseColor();
//     }

//     private function parseColor() {
//        if($this->color) {
//             list($this->red, $this->green, $this->blue)  = sscanf($this->color, '%02x%02x%02x');
//        }else {
//         list($this->red, $this->green, $this->blue)  = array(0, 0, 0);
//        }
//     }

//     public function getRed() {
//         return $this->red;
//     }
//     public function getGreen() {
//         return $this->green;
//     }
//     public function getBlue() {
//         return $this->blue;
//     }
//  }

// $myColor = new RGB("ff0000");

// $myColor->readRGBColor();

/**
 * 6 Discussing the scope of parent and child classes
 * ============================================================================
 */

//  class ParentClass {
//     protected $name;
//     function __construct($name){
//         $this->name = $name;
//         $this->sayHi();
//     }

//     function sayHi () {
//         echo "Hi from {$this->name}\n";
//     }

//  }

//  class ChildClass extends ParentClass {
    
//     function sayHi () {
//         parent::sayHi();
//         echo "Hello\n";
//     }
//  }

//  $cc = new ChildClass("ABCD"); 

/**
 * 7 More examples on inheritance
 * ======================================================
 */

//  class shape {
//     protected $name;
//     protected $area;
//     public function __construct($name) {
//         $this->name = $name;
//         $this->calculateArea();
//     }
//     public function getArea() {
//         echo "This {$this->name}'s area is {$this->area} \n";
//     }

//     public function calculateArea() {}
//  }

//  class Triangle extends Shape {
//     private $a, $b;
//     public function __construct($a, $b, $c) {
//         $this->a = $a;
//         $this->b = $b;
//         $this->c = $c;
//         parent::__construct("Triangle");
//     }

//     public function calculateArea() {
//         $perimeter = ($this->a+$this->b+$this->c)/2;
//         $this->area = sqrt($perimeter*($perimeter-$this->a)*($perimeter-$this->b)*($perimeter-$this->c));
//     }
//  }

//  class Rectangle extends Shape{
//     private $a, $b;
//     public function __construct( $a, $b) {
//         $this->a = $a;
//         $this->b = $b;
//         parent::__construct("Rectangle");
//     }
//     public function calculateArea() {
//         $this->area = $this->a * $this->b;
//     }
//  }

//  $r = new Rectangle(2,4); 
//  $r->getArea();

//  $t = new Triangle(10, 12, 8);
//  $t->getArea();

/**
 * 8 Abstract Classes and Abstract Methods in OOP
 * =======================================================================
 */

 abstract class Shape {
    abstract function getArea();
    abstract function getPerimeter();
 }

 class Rectangle extends Shape {

    private $base, $height;

    function __construct($base, $height) {
        $this->base = $base;
        $this->height = $height;

    }

    public function setBase($base) {
        $this->base = $base;
    }

    public function setHeight($height) {
        $this->height = $height;

    }

    public function getArea() {
        return $this->base*$this->height;

    }

    function getPerimeter() {

    }

 }

 class Triangle extends Shape {
    function getArea() {
        return $this->base*$this->height;

    }
    function getPerimeter() {

    }
 }

 $triangle = new Triangle(10,10);

 echo $triangle->getArea();
 $shape = new Shape();