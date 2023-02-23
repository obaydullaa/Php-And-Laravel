<?php
/**
 * 22 How to Write Strings Differently in PHP
 * ===========================================================
 *  <<<EOD ....... EOD; // HereDoc
 * <<<'EOD' ....... EOD; // NowDoc
 */

//  $name = "Rakib";

//  $string01 = 'My name is $name';
//  echo $string01;

//  $heredoc = <<<EOD

//   Data One
//   My name jis $name \n
//   Data Twoooooooooooo
//   EOD;

//  echo $heredoc;

/**
 * 23 Introduction to ASCII Code
 * ==============================================================
 * American Standard Code for Information Interchange,
 *  ord('A'); // Convert the first byte of a string to a value between 0 and 255
 * chr(99); // Generate a single-byte string from a number
 */

//  echo ord('A');
//  echo PHP_EOL;
//  echo ord('a');
//  echo PHP_EOL;
//  echo chr(99);


/**
 * 24 Accessing characters within a string
 * =============================================================
 * substr($string,1,4)
 * substr($string, -3)
 */

//  $string = 'Hellow World';

// //  echo $string[-5];
// //  echo $string[5];

// $length = strlen($string);
// // echo substr($string,1,4);
// echo substr($string,$length-3);

// echo PHP_EOL;

// echo substr($string, -10, -8);


/**
 * 25 Reversing strings
 * ========================================
 */

 $string = "Hello World";


 $length = strlen($string)-1;

 for($i=$length; $i>=0; $i--){
    echo $string[$i];
 }

 echo PHP_EOL;

 for($i =1; $i<=$length; $i++){
    echo $string[$i* -1];
 }

 echo PHP_EOL;

echo strrev($string);