<?php
$file = fopen("./data.txt","w");
fwrite($file, "Hello World");
fclose($file);

