<?php
$xml = simplexml_load_file("products.xml");

$id = 1;

$products= $xml->xpath("/products/product[@id='". $id ."']");
foreach($products as $product) 
{ 
    echo $product->Name;
}

?>