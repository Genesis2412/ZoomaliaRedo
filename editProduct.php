<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/editProduct.css">

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