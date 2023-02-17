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
   * Multidimensional or nested arrays
   * ======================================================================
   */

   $foods = [
    'vegetables'=> explode(', ', 'brinjal, brocoli, carrot, capsicum'),
    'fruits'    => explode(', ', 'orange, banana, apple'),
    'drinks'    => explode(', ', 'water, milks'),
   ];

  //  print_r($foods);

   array_push($foods['drinks'],'orange juice');

  //  print_r($foods);

  // echo $foods['vegetables'][3];


  $sample = [
    'test' => [
      	'test-again' => [
				'a',
				'b',
				'c',
				'd'
			]
		]
    ];

//   echo $sample['test']['test-again'][3];

$sample2 =[
	[1,2,3,4],
	[11,22,33,44],
	[111,222,333,444],
	[111,222,333,[5,6,7]],
];


 echo $sample2[3][3][1];
    

