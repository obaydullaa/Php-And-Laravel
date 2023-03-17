<?php
// escape sequences

/**
 * Data write
 * ==================
 */

// $file = fopen("./data.txt","w");
// $file = fopen("./data.txt","w");
// fwrite($file,"\n\ Hello World");
// fwrite($file,"\t\ Hello World");
// fclose($file);

/**
 * Data read
 * ==================
 */

$file = fopen("./data.txt","r");
//  $data1 = fgets($file, 1024);
//  $data2 = fgets($file, 1024);
//  $data4 = fgets($file, 1024);
// echo $data1;
// echo $data2;

// Now we use write for loop bcz we don't know hou much word in file.

// while($data=fgets($file, 4095) !== false) {
//     echo $data;
// }

// another way file read 
//  $data = fread($file, filesize('./data.txt'));

//another useful function very easy way
//  $data = file_get_contents("./data.txt");

// file_put_contents("./data.txt", "\n9",FILE_APPEND); // start from end
//  $data = file_get_contents("./data.txt");

//  echo $data;