<?php

// 1. Write a Reusable  PHP Function that can check Even & Odd Number And Return Decision

function evenAndOdd($number) {
  if($number % 2 == 0){
    return "{$number} Is a Even Number.";
  }else {
    return "{$number} Is a Odd Number.";
  }
}

echo evenAndOdd(10); // 10 Is a Even Number.
echo evenAndOdd(11); // 11 Is a Odd Number.

