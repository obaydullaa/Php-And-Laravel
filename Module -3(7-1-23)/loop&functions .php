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

 for ($i= 0; $i<100; $i++) {
  //  if($i % 7 == 0) echo $i."\n";
  //  if($i % 11 == 0) echo $i."\n";
  // echo $i % 7 == 0 ? $i. "\n" : '';
  // echo $i % 11 == 0 ? $i. "\n" : '';
 }


 for($i = 0, $j = 0; $i < 100; $i+= 7, $j +=11) {
  echo $i. "\n";
  echo $j < 100 ? $j . "\n" : '';
 }