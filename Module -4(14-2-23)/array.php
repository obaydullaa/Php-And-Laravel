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
  
  //  $students = [
  //   "rahim",
  //   "karim",
  //   "Rifat",
  //   "monir",
  // ];

  // $students[2] = 'Rohim';
  
  // echo PHP_EOL;
  
  // echo array_shift($students);
  // echo PHP_EOL;
  // echo array_pop($students);
  // echo PHP_EOL;
  // echo PHP_EOL;

  // echo array_unshift($students,'rahim');
  // echo array_push($students,'monir');

  // $n = count($students);
  // for($i = 0; $i < $n; $i++) {
  //   echo $students[$i]."\n";
  // }

  
  // echo PHP_EOL;


  // array_shift($students);              // Cut first array element.
  // array_pop($students);                // Cut last array element.
  // array_unshift($students, 'element'); // Add first element
  // array_push($students, 'element');    // Add last element


  /**
   * 3. Detailed discussion of associative arrays
   * =====================================================================================
   */
// Associative Arrays
  //   $students = [
  //   "12" =>  "rahim",
  //   "13" =>"karim",
  //   "20" =>"Rifat",
  // ];

  // echo $students[12];

  // $foods = [
  //   'vegetables' => 'brinjal, brocoli, carrot, capsicum ',
  //   'fruits' => ' orange, banana, apple',
  //   'drinks' => ' water, milk',
  // ];

  // Add array value

//   $foods['drinks'] = $foods['drinks'] . ", orange juice";  // long way
//   $foods['drinks'] .=", orange juice";  // short way

  // echo count($foods);
  // echo $foods['vegetables'];

  /**
   * // It's not work because it's associative array thant's shy here will be foreach loop.
   */
  
  // for($i=0; $i <count($foods); $i++){
  //   echo $foods[$i];
  // }

  // foreach($foods as $key=>$value) {
  //   echo $key."=>".$value."\n";
  // }

//   $keys = array_keys($foods); 
// //   print_r($keys);

//   for($i=0; $i<count($keys); $i++) {
//     $key = $keys[$i];
//     echo $foods[$key]."\n";
//   }

//   $values = array_values($foods); 
// //   print_r($values);

//   for($i=0; $i<count($values); $i++) {
//     $value = $values[$i];
//     echo $value."\n";
//   }

/**
 * 4. String to Array and Array to String, Multiple Delimiters
 * ===========================================================================================
 * 
 *  delimeter = ', '
 * explode('key',$var-string') // string to array convert.
 * join('key', $var)           // array tp string
 * preg_split('/(, |,)/', 'brinjal, brocoli, carrot) //  its better explode functions
 */


  // $vegetables = preg_split('/(, |,)/', 'brinjal, brocoli, carrot, capsicum,potato, shweet-potato ');
  // var_dump($vegetables);
  // // var_dump($vegetable);

  // // $vegetable_explode = explode(', ', $vegetables);
  
  // $vegetableString = join(', ',  $vegetables);

  // // echo ($vegetableString);

  // echo count($vegetables);


  /**
   * 5. Multidimensional or nested arrays
   * ======================================================================
   */

//    $foods = [
//     'vegetables'=> explode(', ', 'brinjal, brocoli, carrot, capsicum'),
//     'fruits'    => explode(', ', 'orange, banana, apple'),
//     'drinks'    => explode(', ', 'water, milks'),
//    ];

  //  print_r($foods);

//    array_push($foods['drinks'],'orange juice');

  //  print_r($foods);

  // echo $foods['vegetables'][3];


	// $sample = [
    // 'test' => [
    //   	'test-again' => [
	// 			'a',
	// 			'b',
	// 			'c',
	// 			'd'
	// 		]
	// 	]
    // ];

//   echo $sample['test']['test-again'][3];

// $sample2 =[
// 	[1,2,3,4],
// 	[11,22,33,44],
// 	[111,222,333,444],
// 	[111,222,333,[5,6,7]],
// ];


//  echo $sample2[3][3][1];
    

/**
 * 6. Associative Array to String Conversion - Serialize, json
 * ====================================================================================
 * 
 * serialize($student); // a:5:{s:5:"fname";s:5:"Jamal";s:5:"lname";
 * unserialize($serialize); // normal array
 * json_encode($student); // {"fname":"Jamal","lname":"Ahmed" }
 * json_decode($jsonData); //  stdClass Object([fname] => Jamal [lname] => Ahmed
 * json_decode($jsonData, true); // for get array
 * 
 */

//  $student = [
// 	'fname' => 'Jamal',
// 	'lname' => 'Ahmed',
// 	'age' => '15',
// 	'class' => 8,
// 	'section' => '8',
//  ];

//  print_r($student);

//  echo $student['fname']. " ". $student['lname'];

// printf(" %s, %s \n",$student['fname'],$student['lname']);

// echo join(", ", $student);
// echo PHP_EOL;

// $serialize = serialize($student);

// $newStudent = unserialize($serialize);

// print_r($serialize);
// print_r($newStudent);

// echo "\n";

// $jsonData = json_encode($student);
// echo $jsonData;
// echo PHP_EOL;
// $student2 = json_decode($jsonData, true);
// print_r($student2) ;


/**
 * 7. Copy by Value and Copy by Reference
 * ===============================================================
 * 
 * 
 */

//  $person = [
//   'fname' => 'Hello',
//  'lname' => 'world',
// ];

// $newPerson = $person;

// $newPerson['lname']='Pluto';

// print_r($person);
// print_r($newPerson);
// // copy by value.
// // Deep copy.

// // Copy by reference
// //shallow copy

// function printData(&$person) {
// 	$person['fname'] .= " changed";
// 	print_r($person);
// }

//  printData($person);

//  print_r($person); 


/**
 * Write a PHP function to find the longest word in a string?
// Hints :
// // Example usage
// $str = "The quick brown fox jumped over the lazy dog";
// echo longestWord($str);
// Output: jumped

 */

// $str = "The quick brown fox jumped over the lazy dog";


// function longestWord($str) {
//   $words = explode(" ", $str); 
  
//   $longestWord = "";
  
//   for ($i = 0; $i < count($words); $i++) {
//     if (strlen($words[$i]) > strlen($longestWord)) {
//       $longestWord = $words[$i];
//     }
//   }
  
//   return $longestWord;
// }
// echo longestWord($str); // Output: jumped

/**
 * 8. Removing data from associative arrays
 * ===============================================================
 * unset($person) // Remove associative  array elements remove
 */

// $person = ['fname' => 'obaydul', 'lname' => 'Islam'];

// print_r($person);
// unset($person['lname']);

// print_r($person);


/**
 * 9. Discussion of Empty Values ​​(Important)
 * =========================================================================
 */

//  $name =0;

//  if(isset($name)) {
//   echo "Name is set";
//  }else {
//   echo "Not Set";
//  }

//  echo PHP_EOL;
//  if(empty($name)) {
//   echo "Name is Empty";
//  }else {
//   echo "Not Empty";
//  }
//  echo "\n";

//  if(isset($name) && (is_numeric($name) || $name != '')){
//    echo 'Name is set it\'s not empty';
//  } else {
//   echo 'Name is either not set or it\'s empty';
//  }

/**
 * 10. Extracting some data from an array while keeping the original array intact
 * ====================================================================================
 * array_slice()  // Don' modify original array.
 */

// $fruits = array("apple", "banana", "orange", "plum", "dates", "mango");
// $random = ["a" => 12, "b" =>45, "c" => 34, "d" => 22, "e" => 77, "f" => 31, 12=>78, "g" => 55 ];

// // $someFruits = array_slice($fruits, 2);
// // $someFruits = array_slice($fruits, 2, 2);
// // $someFruits = array_slice($fruits, -5, -2);
// // $someFruits = array_slice($fruits, 2, 2, true); // main index
// // $randomData = array_slice($random, 3, null, true); 
// $randomData = array_slice($random, -6, -4,); 

// print_r($randomData);

/**
 * 11. Decluttering an array
 * =========================================================================
 * array_splice() // Modify original array and add extra array 
 */

// $fruits = array("apple", "banana", "orange", "plum", "dates", "mango");
// $random = ["a" => 12, "b" =>45, "c" => 34, "d" => 22, "e" => 77, "f" => 31, 12=>78, "g" => 55 ];

// $newFruits = ['Jackfruit', 'tamarind'];
// $someFruits = array_splice($fruits,-5,2, $newFruits);

// print_r($someFruits);
// print_r($fruits);


/**
 * 12. Concatenating several arrays (very important)
 * =========================================================================================
 */

// $fruits = array("apple", "banana", "orange", "plum", "dates", "mango");
// $random = ["a" => 12, "b" =>45, "c" => 34, "d" => 22, "e" => 77, "f" => 31, 12=>78, "g" => 55 ];

// $newFruits1 = array_slice($fruits, 0, 3);
// $newFruits2 = array_slice($fruits, 3);

// $newFruits = array_merge($newFruits1, $newFruits2);

// print_r($newFruits1);
// print_r($newFruits2); 
// print_r($newFruits);

// $newFruitsPlus = $newFruits1 + $newFruits2;

// print_r($newFruitsPlus);


// $r1 = array_slice($random,0,2,true);
// $r2 = array_slice($random ,4,null,true);
// $r3 = ["j"=>45, "k"=>12];

// $randomData = array_splice($random, 2,2, ["j"=>45, "k"=>12]);

// $randomDataCorrectWay = $r1 + $r3 + $r2;

// print_r($random);
// print_r($randomDataCorrectWay);


/**
 * 13. Sorting Indexed and Associated Arrays
 * =====================================================================
 * sort() // associative array create and sort  a b c akare...
 * asort() // associative array create and asort  a b c akare ONLY VALUE SORT HOISE DON"T KEY..
 * arsort() // associative array create and reverse  c b a akare...
 *  ksort($fruits); // key sorting
 *  krsort($fruits); // key sorting reverse
 *  sort($numbers, SORT_STRING); // key and value ar sate ja golo mase kortbe je golo age asbe -> [0]=>1,[1]=>2,[2]=>22
 *  sort($random); // Case sensitive seat =>a,A,B,b P //skey code jar man besi sei first thake
 *  sort($random, SORT_STRING | SORT_FLAG_CASE); => // Case insensitive sort
 * 
 * 
 * 
 * 
 */

//  $fruits = array("A"=> "apple", "B"=>"banana", "OR"=>"orange", "D"=>"plum", "E"=>"dates", "F"=>"mango");
//  $numbers = [1,2,56,3,4,22,77,5];

//  krsort($fruits);
//  sort($numbers, SORT_STRING);

// //  print_r($fruits);
// //  print_r($numbers);

//  $random = ["apple","Apple","banana","Banana","Pineapple"];
//  sort($random, SORT_STRING | SORT_FLAG_CASE);
//  print_r($random);

//  for ($i =0; $i<count($numbers); $i++) {
//   echo $numbers[$i]."\n";
//  }

// foreach($numbers as $number) {
//   echo $number."\n";
// }

// foreach($fruits as $fruit) {
//   echo $fruit."\n";
// }]


/**
 * 14. Searching in Indexed and Associated Arrays
 * ================================================================================================================================
 * in_array(56, $numbers, true)  // array te ase kina.. jodi type check kore thole true/false dite hobe..
 * array_search(56, $numbers); // array r modde position ber korar jonnu use hoi...
 * key_exists('B', $fruits) // array te ley ase kina seta chek kora jonno use hoi.
 * 
 */
 
//   $fruits = array("A"=> "apple", "B"=>"banana", "OR"=>"orange", "D"=>"plum", "E"=>"dates", "F"=>"mango");

//   $numbers = [1,2,'56',3,4,22,77,5];
 
//  if(in_array(56, $numbers)) {
//     echo '56 is found'."\n";
//  }
 
//  $offset = array_search(56, $numbers);
//  echo $offset;
// echo PHP_EOL;

// if(key_exists('B', $fruits)) {
//   echo 'key B Exists';
// }

/**
 * 15. Difference and intersection of two indexed and associated arrays
 * ==================================================================================
 * array_intersect($numbers1, $numbers2); // search common element 2 array...check only value.
 * array_intersect_assoc($fruits2, $fruits1); // search key and value.
 * 
 *  array_diff($numbers2, $numbers1); // jagolo mil nai sei golo dekhabe.. check only value
 * array_diff_assoc($fruits2, $fruits1); // check value and key
 */

//  $numbers1 = [1,4,3,66,54,7,23,1,2];
//  $numbers2 = [88,3,21,44,3,28,1,2,7];

//  $fruits1 = array("a"=> "malta", "b"=>"grapes", "c"=>"lemon");
//  $fruits2 = array("d"=> "pineapple", "b"=>"malta", "a"=>"grapes", "c"=>"lemon");

//  $common = array_intersect($numbers1, $numbers2);
// //  $commonf = array_intersect($fruits2, $fruits1);
//  $commonf = array_intersect_assoc($fruits2, $fruits1);

//  print_r($common);
//  print_r($commonf);

// //  $diff = array_diff($numbers1, $numbers2);
//  $diff = array_diff($numbers2, $numbers1);
//  $difff = array_diff_assoc($fruits2, $fruits1);

//  print_r($diff);
//  print_r($difff);

/**
 * 16. Array Utility Functions - Very Important - Walk, Map and Filter
 * =================================================================================
 * array_walk($numbers, 'square'); // protita function ar element ar upore kaj kore.... // not modify main arry
 * array_walk echo or onno kono kaj ar jonno use hoi... eta return kore kono lav nai.
 * array_map('cube', $numbers); // protita element ar upore kaj kore and eta return o kore.
 * array_filter($persons, 'filterBys'); // every element niye kaj kore
 * 
 */

//  $numbers =[1,2,3,4,5,6,7,8,9,10,11,12];

//  function square($n) {
//   printf("Square of %d is %d \n", $n, $n*$n);
//  }
//  $newArray = array_walk($numbers, 'square');


//  function cube($n) {
//   return $n*$n*$n;
//  }

//  $newArray = array_map('cube', $numbers);

//  function even($n) {
//   return $n%2== 0;
//  }
//  function odd($n) {
//   return $n%2== 1;
//  }

//  $evenNumbers = array_filter( $numbers, 'even'); // call back function
//  $oddNumbers = array_filter( $numbers, 'odd'); // call back function

//  print_r($evenNumbers);
//  print_r($oddNumbers);

//  $persons = ['sujon','kabir','sabab','selim','roni','jamal','kamal','sayma'];

//  function filterBys($name) {
//     return $name[0]=='s';
//  }

//  $newPersons = array_filter($persons, 'filterBys');

//  print_r($newPersons);

/**
 * 17. Array Utility Functions - Very Important - Array Reduce
 * ===========================================================================
 * array_reduce() // array er modder protita value niye kaj kore se golo return kore...
 * 
 */

//  $numbers = [1,2,3,4];

//  function sum($oldValue, $newValue) {

// 	if($newValue % 2==0) {
// 		return $oldValue + $newValue;
// 	}
//   	return $oldValue;
//  }

//  $sum =array_reduce($numbers, 'sum');

//  echo $sum;

/**
 * 18. Using the list function to get data from an array into a variable
 * $color = [122,233,65];
 * list($red, $green, $blue) = $color;  // long data store in small data
 * 
 */
// $color = [122,233,65];
// $red = $color[0];
// $green = $color[1];
// $blue = $color[2];

// list($red, $green, $blue) = $color;

// echo $blue;

