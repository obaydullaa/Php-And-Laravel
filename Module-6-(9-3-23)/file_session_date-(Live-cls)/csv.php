<?php
$file = fopen("./csv.txt", "r");

while (($data = fgetcsv($file))!==false) {
    // print_r($data);
    echo $data[1]."\n";
}