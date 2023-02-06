<?php
/*
  HF consultancy wants to build a very simple commission-calculating calculator for their Admission agents. Usually, the commission is twenty-five percent of the tuition fee if the tuition is above twenty thousand dollars. But if the tuition fee is above ten thousand dollars but less than twenty thousand dollars, the commission is twenty percent. If the tuition fee is less than ten thousand dollars but greater than seven thousand dollars, the commission rate is fifteen percent. If the tuition fee is below seven thousand dollars the data will be invalid. As a developer please help HF Consultancy for building this simple calculator using a ternary operator in Php.

  step-1: tuition fee up 20000$ -> 25% = 0.25
  step-2: tuition fee up 10000$ less 20000$ ->  20% = 0.20
  step-3: tuition fee less 10000$ up 7000$ ->  15% = 0.15
*/

$tuition_fee =20000;

$commission = ($tuition_fee >= 20000) ? ($tuition_fee * 0.25) : 
              (($tuition_fee >= 10000 && $tuition_fee < 20000) ? ($tuition_fee * 0.20) : 
              (($tuition_fee >= 7000 && $tuition_fee < 10000) ? ($tuition_fee * 0.15) : 
              (($tuition_fee < 7000) ? "Invalid data" : "Invalid data")));

echo "The commission is $commission";

echo "\n";