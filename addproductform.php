<?php
	$xml=simplexml_load_file("products.xml");
	$products = $xml->xpath("/products/product[last()]");
	foreach($products as $product) 
	{
        $x = $product['id'] + 1; //increment the id by 1
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./css/addProduct.css">
	<title>AddProduct</title>
</head>
<body>
	<div id=""></div>

	<div class="form" align="center">
		<form method="POST" action="addproduct.php" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Id</td>
					<td><input type="number" name="id" value="<?php echo $x; ?>" id="id"></td>
				</tr>
				<tr>
					<td>Type</td>
					<td><input type="text" name="type" id="type"></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" id="name"></td>
				</tr>
				<tr>
					<td>Description</td>
					<td><input type="text" name="description" id="description"></td>
				</tr>
				<tr>
					<td>Price</td>
					<td><input type="number" name="price" id="price" placeholder="Rs"></td>
				</tr>
				<tr>
					<td>Image</td>
					<td><input type="file" id="file" name="file" id="file"></td>
					<td><input type="button" value="Upload" id="but_upload" class="btn btn-primary"></td>
				</tr>			
				<tr>
					<td><button id="submit" name="submit" class="btn btn-success">Add</button></td>
				</tr>			
			</table>
		</form>
	</div>

	<!--Upload image to folder AJAX-->
    <script type="text/javascript">
        $(document).ready(function(){
        $("#but_upload").click(function(){
            var fd = new FormData();
            var files = $('#file')[0].files[0];
            fd.append('file',files);
            $.ajax({
                url: 'uploadimg.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response != 0){
						alert('Image could not be uploaded');
                    }
					else
					{
						alert('Image uploaded successfully');
					}
                },
            });
            });
        });
    </script>
</body>
</html>