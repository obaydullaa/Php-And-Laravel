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

$fname = 'Obaydul';
$lname = 'islam';

printf("My %s is %s %s \n", 'name', $fname, $lname);

echo "
  Hello,
  My
  nick name 
  is {$fname},
  & my full name is 
  Obaydulla. \n
";

echo "My Name First Name is ".$fname." And Last Name is ".$lname.".\n ";
echo "My Name First Name is {$fname} And Last Name is {$lname}.\n ";
printf("My Name First Name is %s And Last Name is %s", strtoupper($fname), strrev($lname) );



