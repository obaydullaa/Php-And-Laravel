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

 for($i = 10, $j=1; $i>0; $i--, $J++) {
  echo $i.":".$j;
  echo PHP_EOL;
  echo $i.":".(11-$i);
  echo PHP_EOL;
 } 