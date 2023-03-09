<?php

$fileName = "C:/xampp/htdocs/Php-And-Laravel/Module-6-(9-3-23)/php01/file/data/f1.txt";


// echo getcwd();
$fp = fopen($fileName, 'r'); // open
// fclose($fp);   // close

// $line = fgets($fp,3); // 3 char
// $line = fgets($fp);
// echo $line;
// $line = fgets($fp);
// echo $line;

while($line = fgets($fp,5)) {
    echo $line;
}

// we can loop for all data showing
// rewind($fp); // we start for new start
rewind($fp,); // we start for end

fseek($fp, -1, SEEK_END);  // where we put pointer start there

while($line = fgets($fp,5)) {
    echo $line."-";
}

fclose($fp);

$data = file($fileName); // we see all file data use this function // showing array

echo $data[2];
print_r($data);

echo "\n";

$data = file_get_contents($fileName); //  showing data 

echo $data;

// Is this function use , if readable then execute data other wise not execute file.
if(is_readable($fileName)) {
    //     // echo getcwd();
    // $fp = fopen($fileName, 'r'); // open
    // // fclose($fp);   // close

    // // $line = fgets($fp,3); // 3 char
    // // $line = fgets($fp);
    // // echo $line;
    // // $line = fgets($fp);
    // // echo $line;

    // while($line = fgets($fp,5)) {
    //     echo $line;
    // }

    // // we can loop for all data showing
    // // rewind($fp); // we start for new start
    // rewind($fp,); // we start for end

    // fseek($fp, -1, SEEK_END);  // where we put pointer start there

    // while($line = fgets($fp,5)) {
    //     echo $line."-";
    // }

    // fclose($fp);

    // $data = file($fileName); // we see all file data use this function // showing array

    // echo $data[2];
    // print_r($data);

    // echo "\n";

    // $data = file_get_contents($fileName); //  showing data 

    // echo $data;
}
