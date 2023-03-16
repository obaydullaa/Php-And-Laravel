<?php

/**
 * // january 1972 all seconds
 * strtotime();
 */

// $date1 = strtotime('1st january 2023');
// $date2= strtotime('28th january 2023');

// echo $date2-$date1;

$date1 = new DateTime('1AM 1st january 2021');
$date2= new DateTime('3AM 28th march 2023');

// $diff = $date1->diff($date2);
$diff = date_diff($date1, $date2);

// echo $diff->d;

// echo $diff->y>0?$diff->y." Year": '';
// echo $diff->m>0?$diff->m." Month": '';
// echo $diff->d>0?$diff->m." Day": '';

echo formatNumber($diff->y,'year').
    formatNumber($diff->m,'month') .
    formatNumber($diff->m,'day') .
    formatNumber($diff->m,'hour') .
    formatNumber($diff->m,'minute') 
;

function formatNumber ($number, $type) {
    if($number == 0) {
        return '';
    }
    if($number >1) {
        return " {$number} {$type}s";
    }
}