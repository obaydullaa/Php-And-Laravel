<?php

$fileName = "C:/xampp/htdocs/Php-And-Laravel/Module-6-(9-3-23)/php01/file/data/f2.txt";

$fp = fopen($fileName, "w");
fwrite($fp,"Obaydul\n");
fwrite($fp,"Normoni\n");
fclose($fp);

