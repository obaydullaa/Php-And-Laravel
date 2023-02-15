<?php

/**
 * 1. Introduction to arrays
 * ============================================================================
 */

  // $students = array (
  //    "ramhim",
  //    "karim",
  //    123,
  //    "monir",
  // );

  // $students = [
  //   "ramhim",
  //   "karim",
  //   123,
  //   "monir",
  // ];


  // echo  $students[0];
  // var_dump($students); // array print

  // echo count($students); // How much element in array

  // $n = count($students);

  // for($i = 0; $i < $n; $i++) {
  //   echo $students[$i]."\n";
  // }

  // Reverse Loop

  // for($i = $n -1; $i >= 0; $i--) {
  //   echo $students[$i]."\n";
  // }


  /**
 * 2. Array Manipulation
 * ============================================================================
 * array is mutable = array is  modified.
 * Immutable na mane modified kora jai.
 */
  
   $students = [
    "rahim",
    "karim",
    "Rifat",
    "monir",
  ];

  // $students[2] = 'Rohim';
  
  echo PHP_EOL;
  
  echo array_shift($students);
  echo PHP_EOL;
  echo array_pop($students);
  echo PHP_EOL;
  echo PHP_EOL;

  echo array_unshift($students,'rahim');
  echo array_push($students,'monir');

  $n = count($students);
  for($i = 0; $i < $n; $i++) {
    echo $students[$i]."\n";
  }

  
  echo PHP_EOL;


  // array_shift($students);              // Cut first array element.
  // array_pop($students);                // Cut last array element.
  // array_unshift($students, 'element'); // Add first element
  // array_push($students, 'element');    // Add last element