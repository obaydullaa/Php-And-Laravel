<?php

$fileName = "C:/xampp/htdocs/Php-And-Laravel/Module-6-(9-3-23)/php01/file/data/f2.txt";
// $existingData = file_get_contents($fileName);
$fp = fopen($fileName, "a");

// fwrite($fp, $existingData);

fwrite($fp,"Rifat\n");
fwrite($fp,"Nela\n");
fwrite($fp,"Noor,,,,\n");

// fwrite($fp,"Obaydul\n");
fclose($fp);

