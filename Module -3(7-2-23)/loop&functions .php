<?php
/**
 * 1. Introduction to different types of loops
 * ==================================================================
 */

// for ($i=1; $i<=5; $i++){
//   // echo $i;
//   echo PHP_EOL;
//   for($j=0; $j<$i; $j++) {
//     echo "*";
//   }
// }
// echo PHP_EOL;

// $i = 0;
// while($i<=5){
//   $i++;
//   echo $i.PHP_EOL;
// }
// echo PHP_EOL;

// $i = 0;

// do{
//   $i++;
//   echo $i.PHP_EOL;
// }while($i<5);

// echo "Go To\n";

// $i = 0;
// a: $i++;

// echo $i.PHP_EOL;
// if($i<10) goto a;


/**
 * 2. Multiple Stepping in For Loops
 * ==================================================================
 */

//  for($i = 10, $j=1; $i>0; $i--, $J++) {
//   echo $i.":".$j;
//   echo PHP_EOL;
//   echo $i.":".(11-$i);
//   echo PHP_EOL;
//  } 

/**
 *  3. More on Multiple Stepping in For Loops
 */

//  for ($i= 0; $i<100; $i++) {
  //  if($i % 7 == 0) echo $i."\n";
  //  if($i % 11 == 0) echo $i."\n";
  // echo $i % 7 == 0 ? $i. "\n" : '';
  // echo $i % 11 == 0 ? $i. "\n" : '';
//  }


//  for($i = 0, $j = 0; $i < 100; $i+= 7, $j +=11) {
//   echo $i. "\n";
//   echo $j < 100 ? $j . "\n" : '';
//  }

/**
 * 4. Things to keep in mind with ++ in while loops
 */ 

//  $i = 0;
//  while($i<5) {
//   echo $i;
//   echo PHP_EOL;
//   $i++;
//  }

//  echo "============\n";

// $j = 0;
//  while($j++ <5) {
//   echo $j;
//   echo PHP_EOL;
//  }

//  echo "============\n";

//  $j = 0;
//  while(++$j<5) {
//   echo $j;
//   echo PHP_EOL;
//  }

//  echo "============\n";

//  $x = $y = 5;
//  $x = $y++;

//  echo $x.":".$y;

//  $x = $y++;
//  $x = $y;
//  $y = $y +1;


/**
 * 5. Continue and break between loops
 */

//  for($i = 17; $i<20; $i++) {
  // echo $i;
  // echo PHP_EOL;

    // if($i == 6) {
    //   echo $i++;
    //     echo PHP_EOL;
    //   break;
    // }

    // if($i % 6 == 0) {
    //   echo $i;
    //   break; 
    // }

    // if($i<17) {
    //   continue;
    // }
    
    // echo $i;
    // echo PHP_EOL;
//  }

/**
 * 6. Printing the Fibonacci Series with Loops
 */

 // 0 1 2 3 5 8 13 21 34 55 89 

//   $veryold = 0;
//   $old = 1;
//   $new = 1;

//   for($i=0; $i<10; $i++){
//     echo $veryold." ";
//     $old = $new;
//     $new = $old + $veryold;
//     $veryold = $old;
//  }

 /**
  * Details fibonacci Series
  *initial
  v = 0
  o = 1 
  n = 1 

  *1st Loop
  v = 1
  o = 1 
  n = 1 

  *2nd Loop
  v = 1
  o = 1 
  n = 2 

  *3rd Loop
  v = 2
  o = 2 
  n = 3 

  *4th Loop
  v = 3
  o = 3 
  n = 5 

  *5th Loop
  v = 3
  o = 5 
  n = 8 

  *6th Loop
  v = 8
  o = 8 
  n = 13 

  *7th Loop
  v = 13
  o = 13
  n = 21 

  */

/**
 * 7. What are functions and how to write them
 */

// encapsulation

// function isEven($n){ // parameter
//   if($n % 2 == 0) {
//     return true;
//   }
//   return false;
// }

// $x = 11;
// if(isEven($x)) { // argument
//   echo "{$x} is an event number";
// }else {
//   echo "{$x} is an odd number";
// }

/**
 * 8. Type hinting or type checking of function parameters
 */

 // It work PHP 7
// function factorial( int $n) {
//   $result = 1;
//   for($i = $n; $i > 1; $i--) {
//     $result *= $i;
//   }
//   return $result;
// }

// $x = 'abcd';

// echo "Factorial of {$x} is ".factorial($x);

 // It work under PHP 7
// function factorial( $n) {
//   if(gettype($n) !="integer") {
//     return "invalid";
//   }
//   $result = 1;
//   for($i = $n; $i > 1; $i--) {
//     $result *= $i;
//   }
//   return $result;
// }

// $x = 2;

// echo "Factorial of {$x} is ".factorial($x);

/**
 * 9. Default value of function parameter or optional parameter
 */

//  function serve($foodType='Coffee', $numberOfItems='1 cup') {
//   echo "{$numberOfItems} of {$foodType} has been served.";
//  }
//  $ft = "Tree";
//  $n =  "2 cups";
//  serve($ft);

//  serve('Salad', '5 Plates');

//  serve('apple', '2 pices');

/**
 * 10. Fixing function return type
 */

//  function sum(int $x, int $y, int $z):int {
//   return $x + $y + $z;
//  }


//  echo sum("5",5,5);
// what is the output ?
// 

/**
 * 11. Accepting Unlimited Arguments in Functions
 */


// function sum(int ...$n):int {
// $result = 0;
//   for($i =0; $i<count($n); $i++) {
//     $result += $n[$i];
//   }
//   return $result;

// }
// echo sum(1,2,3,4,5);

/**
 * 12. Dividing a large function into smaller functions
 */

//  function doTaskA(){
//   echo "Step A Done \n";
//  }
//  function doTaskB(){
//   echo "Step B Done \n";
//  }

//  function doTaskC(){
//   echo "Step C Done \n";
//  }
//  function doTaskD(){
//   echo "Step D Done \n";
//  }
//  function doTaskE(){
//   echo "Step E Done \n";
//  }

//  function doTheLargerTask(){
//    doTaskA();
//    doTaskB();
//    doTaskC();
//    doTaskD();
//    doTaskE();
//  }

//  doTheLargerTask();

/**
 * 13. Recursion and Recursive Functions
 */

//  function printN($i){
//   if($i>=10){
//     return;
//   }
//   echo $i. "\n";
//   $i++;
//   printN($i);
//  }
//  echo printN(0);

// function printNumber($counter, $end, $stepping='1'){
//   if($counter > $end){
//     return;
//   }
//   echo $counter. "\n";
//   $counter += $stepping;


//   printNumber($counter, $end, $stepping);

// }

// printNumber(10, 20, 5);

/**
 * 14. Printing Fibonacci Series Using Recursive Functions
 */
// function fibonacci($old, $new, $end) {
//     static $start;
//     $start = $start ?? 1;

//   if($start > $end) {
//     return;
//   }
//   $start ++;
//   echo $old. " ";
//   $_temp = $old + $new;
//   $old = $new;
//   $new = $_temp;

//   fibonacci($old, $new, $end);

// }

//  fibonacci(0,1,10);

/**
 * 15. Variable Scope in PHP Function
 * PHP Variable Scope 3
 *  1. Local scope.
 * 2. Global Scope.
 * 3. Static Scope.
 */

// $name = "Earth"; // global scope
// function dosomething() {
//   // global $name; // wya one
//   // echo  $GLOBALS['name']; // waye two
// }
// dosomething();



// function dosomething() {
//   global $name;
//   $name = "Earth"; // local scope;
// }

// dosomething();

// echo $name;

// function dosomething() {
//   static $i;   // static scope
//   $i = $i ?? 0;
//   $i++;
//   echo $i;
//   echo "\n";
// }
// dosomething();
// dosomething();
// dosomething();

/**1
 * 3-02-2023
 * Live class Hasin Hyder vai..
 */


// foreach($products as $product){
//   echo "{$product['name']} - {$product['price']}"; // Interpolation
//   echo "\n";
// }

// echo "Hello";

function student($name, $title='Md') {
    echo "My Name is {$title} {$name}";
}

// student('Obaydul', 'Md');
// student(name:"Obaydul", title:"Md"); // Name Argument