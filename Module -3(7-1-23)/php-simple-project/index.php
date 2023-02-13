<?php
include_once 'data.php';





foreach($products as $product){
   echo "{$product['name']} - {$product['price']}"; // Interpolation
   echo "\n";
}

echo "Hello";