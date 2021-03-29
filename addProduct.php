<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/addProduct.css">

</head>
<body>

	<div class="btn">
		<a href="products.xml"><button>Back</button></a>
	</div>

	<div class="form" align="center">
	<form method="POST">
	<table>
		<tr>
			<td>Id</td>
			<td><input type="number" name="id"></td>
		</tr>
        <tr>
			<td>Type</td>
			<td><input type="text" name="type"></td>
		</tr>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><input type="text" name="description"></td>
		</tr>
		<tr>
			<td>Price</td>
			<td><input type="number" name="price" placeholder="Rs"></td>
		</tr>
		<tr>
			<td>Image</td>
			<td><input type="file" src="img/." name="image"></td>
		</tr>
		
		<tr>
			<td><input type="submit" name="submitSave" name="Save"></td>
		</tr>
		
	</table>

</form>
</div>

</body>
</html>


<?php 

$id=$_POST["id"];
$type=$_POST["type"];
$name=$_POST["name"];
$description=$_POST["description"];
$price=$_POST["price"];
$image=$_POST["image"];

$dom = new DOMDocument();
$dom->load('products.xml');
$dom->formatOutput = true;

// Get the root element
$root = $dom->getElementsByTagName('products');
$child_node = $root->item(0);  

// Create a new element
$client_node = $dom->createElement('product'); 

$client_node->setAttribute('id', $id);
$child_node->appendChild( $client_node);

$child_node_type = $dom->createElement('Type', $type);
$client_node->appendChild($child_node_type);

$child_node_name = $dom->createElement('Name', $name);
$client_node->appendChild($child_node_name);

$child_node_description = $dom->createElement('Description', $description);
$client_node->appendChild($child_node_description);

$child_node_price = $dom->createElement('Price', $price);
$client_node->setAttribute('currency', "Rs");
$client_node->appendChild($child_node_price);

$child_node_img = $dom->createElement('img', $image);
$client_node->appendChild($child_node_img);

?>