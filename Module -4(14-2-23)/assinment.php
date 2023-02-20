<?php


/**
 * 1.Write a PHP function to sort an array of strings by their length, in ascending order. (Hint: You can use the usort() function to define a custom sorting function.)
*/
$my_array = array("apple", "banana", "cherry", "date", "elderberry", "fig");
function custom_sorting($arr) {
    usort($arr, function($a, $b) {
        return strlen($a) - strlen($b);
    });
    return $arr;
}
$sorted_array = custom_sorting($my_array);
print_r($sorted_array);

/**
 * 2.Write a PHP function to concatenate two strings, but with the second string starting from the end of the first string.
 */
$str1 = "Hello";
$str2 = "World";

 function concatenate_string_reverse($str1, $str2) {
    return $str1 . strrev($str2);
}

$result = concatenate_string_reverse($str1, $str2);
echo $result;

/**
 * 3.Write a PHP function to remove the first and last element from an array and return the remaining elements as a new array.
 */
$my_array = array("apple", "banana", "cherry", "date");
 function remove_first_lastLast_element($arr) {
    array_shift($arr);
    array_pop($arr);
    return $arr;
}

$new_array = remove_first_lastLast_element($my_array);
print_r($new_array);

/**
 * 4.Write a PHP function to check if a string contains only letters and whitespace.
 */

 $firstStr = "Hello World";
 $secondStr = "Hello123";
 function is_letters_and_whitespace($str) {
    return preg_match('/^[a-zA-Z\s]+$/', $str);
}

if (is_letters_and_whitespace($firstStr)) {
    echo "String 1 contains only letters and whitespace.";
} else {
    echo "String 1 does not contain only letters and whitespace.";
}
if (is_letters_and_whitespace($secondStr)) {
    echo "String 2 contains only letters and whitespace.";
} else {
    echo "String 2 does not contain only letters and whitespace.";
}

/**
 * 5.Write a PHP function to find the second largest number in an array of numbers.
 */
$my_array = array(12, 5, 23, 14, 25, 38);
 function find_second_largest($arr) {
    $largest = $arr[0];
    $second_largest = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] > $largest) {
            $second_largest = $largest;
            $largest = $arr[$i];
        } else if ($arr[$i] > $second_largest && $arr[$i] != $largest) {
            $second_largest = $arr[$i];
        }
    }
    return $second_largest;
}

$second_largest = find_second_largest($my_array);
echo "The second largest number is: " . $second_largest;
