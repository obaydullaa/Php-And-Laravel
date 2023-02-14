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

  // echo count($students); // Howm much element in array

  // $n = count($students);

  // for($i = 0; $i < $n; $i++) {
  //   echo $students[$i]."\n";
  // }

  // Reverse Loop

  // for($i = $n -1; $i >= 0; $i--) {
  //   echo $students[$i]."\n";
  // }


  /**
 * 1. 2. Array Manipulation
 * ============================================================================
 * array is mutable = array is  modified.
 * Immutable na mane modified kora jai.
 */
  
   $students = [
    "ramhim",
    "karim",
    123,
    "monir",

  ];

  $students[2] = 'Rohim';
  
  $n = count($students);
  for($i = 0; $i < $n; $i++) {
    echo $students[$i]."\n";
  }
