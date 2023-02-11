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

 for($i = 17; $i<20; $i++) {
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

    if($i<17) {
      continue;
    }
    
    echo $i;
    echo PHP_EOL;

   


 }