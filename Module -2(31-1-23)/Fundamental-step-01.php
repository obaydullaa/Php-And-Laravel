<?php
/**
 * 2. Intro to Variable;
 */
//  $name = 'Obaydulla';
// $age = 10;
// $questions = 'How are you ?';

//  $word = 'age';

//  echo 'Hello  $name';
//  echo "\n"; 
//  echo "Hello {$name} {$questions}" ;


/**
* Variables, constants and comments
*/

// $task = 'Read';
// define('PI', 3.14159);
// echo $task;
// echo "\n";

// $task = 'Write';

// echo $task;
// echo "\n";
// echo"Value of Pi = { PI }".PI;


/**
 * 3 Details on printing output in PHP
 * 
 * Print.
 *  var_dump();
 */

// $name =  'Obaydul';

// var_dump($name);

// $name = 'Obaydul';
// $fullName = strtoupper($name);

// echo "i'am $name";
// echo "\n";
// echo "i'am {$fullName}\n";

// printf("I'am %s", $fullName);

// $fname = 'Obaydul';
// $lname = 'islam';

// printf("My %s is %s %s \n", 'name', $fname, $lname);

// echo "
//   Hello,
//   My
//   nick name 
//   is {$fname},
//   & my full name is 
//   Obaydulla. \n
// ";

// echo "My Name First Name is ".$fname." And Last Name is ".$lname.".\n ";
// echo "My Name First Name is {$fname} And Last Name is {$lname}.\n ";
// printf("My Name First Name is %s And Last Name is %s", strtoupper($fname), strrev($lname) );



/**
 * 4 Fixed CodeRunner in Visual Studio for Windows (PHP Not Found)
 */

 /**
  * 5 Fixed CodeRunner in PHPStorm for Windows
  */

  /**
   * 6 Addition Subtraction Multiplication Division in PHP
   */

// $number = 12;
// $number = $number + 13;
// $number += 13;

// $number = 12 * 2;
// $number = (13-5) *6;

// $number += 1;
// $number = 13 / 6;
// $number = 13 % 6;

// echo  $number;


/**
 * 7 More on addition subtraction
 */

//  $x = $y = 2;

//  echo $x, "\n", $y;

// $n = 7;

// $m = $n++; // m = 8, n = 7

// $m = ++$n; // m = , n = ,

// echo $m, "\n", $n;

/**
 * 8 Discussion of different number systems
 */
// $n = 12;
// $o = 012; // Octal Number.
// $h = 0x1B; // HexaDecimal.

// printf("The Number is %d and %d and %d", $n, $o, $h);

// printf("The binary equivalent of %d is %b",1212,1212);
// printf("The hexadecimal equivalent of %d is %X",1212,1212);

// printf("The Octal equivalent of %d is %o",27,27); 

// printf("The Octal equivalent of %d is %o",65536,65536);

// printf(" Octal  %o = %d",0200000,0200000);

/**
 * 9 The magic of the printf function
 */

//  $fname = "Obaydul";
//  $lname = "Islam";

//  printf('My Name is %2$s %1$s ', $fname, $lname);  // We Write single(') quote. bcz we use $.
//  echo "\n";

//  printf('The binary equivalent of %1$d is %1$b',12);

//  echo "\n";

//  $n = 45.129;
// printf("%.2f", $n); // Print After dosomic 2 digit.

//  $m = 45.126; //0123
//  $n = 27.155; // 0023

//  printf("%07.3f \n", $m);
//  printf("%05.2f \n", $n);

/**
 * 10 A few words about sprintf
 */
   // $fname = "Obaydul";
   // $lname = "Islam";

   // echo "My name is {$fname} $lname";
   // echo "\n";

   // $output = sprintf("My   name is %s %s \n", $fname, $lname);

   // echo strtoupper($output);


   /**
    * 11 Discussion of Condition (Logic) and Logical Operators in PHP.
    */

   //  $n = 11;

   //  if($n == 0 ){
   //    echo "$n is an even number";
   //  } else {
   //    echo "$n is a odd number";
   //  }
   //  echo "\n";

   //  if($n > 10) {
   //    echo "$n id greather than 10";
   //  }

   // $a =100;
   // $b = 200;
   // if($a == $b) {
   //    echo "$a is equal $b";
   // }elseif($a >= $b){
   //    echo "$a is bigger $b";
   // }
   // else {
   //    echo "$a is not bigger $b";
   // }

   // $food = 'applefff';

   // if('tuna' == $food || 'salmon' == $food){
   //    echo "{$food} has Vitamin D";
   // }elseif("apple" == $food){
   //    echo "{$food} does'n contain vitamin D";
   // }else{
   //    echo "We don't know if {$food} contains vitamin D";
   // }

 
   /**
    * 12 If Else, Leap Years and How to Shortcut Complex Conditions
    */


    // Leaf year rules
    //=======================
    // 1 - divisible by 4 ? 1700 / 2000
    // 2 - divisible by 100 ?
    // 3 - divisible by 400

    $year = 2012;

    if ($year % 4 == 0 && $year % 100 == 0 && $year % 400 ==0) {
      echo "{$year} is a leap year";
    }elseif($year % 4 == 0 && $year % 100 == 0) {
      echo "{$year} is NOT a leap year";
    }elseif($year % 4 == 0){
      echo "{$year} is a leap year";
    }else {
      echo "{$year} is NOT a leap year";

    }
   echo "\n";

   if($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0)){
      echo "{$year} is a leap year";
   }else{
      echo "{$year} is NOT a leap year";
   }

   echo "\n";
