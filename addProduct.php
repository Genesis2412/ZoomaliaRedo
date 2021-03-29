<?php

    session_start();

    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $type = $_POST['type'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $img = $_SESSION['filename'];

        if($id != "" && $type != "" && $name != "" && $description != "" && $price != "" && $img != "")
        {
            $dom = new DOMDocument();
        $dom->load('products.xml');
        $dom->formatOutput = false;

        // Get the root element
        $root = $dom->getElementsByTagName('products');
        $child_node = $root->item(0);        

		// Create a new element
        $product_node = $dom->createElement('product');        
            $product_node->setAttribute( 'id', $id );
            $child_node->appendChild( $product_node );

            $child_node_type = $dom->createElement('Type', $type);
            $product_node->appendChild($child_node_type);

            $child_node_name = $dom->createElement('Name', $name);
            $product_node->appendChild($child_node_name);

            $child_node_description = $dom->createElement('Description', $description);
            $product_node->appendChild($child_node_description);

            $child_node_price = $dom->createElement('Price', $price);
            $child_node_price->setAttribute( 'currency', 'Rs' );
            $product_node->appendChild($child_node_price);

            $child_node_img = $dom->createElement('img', $img);
            $product_node->appendChild($child_node_img);

            //Save to XML file
        $dom->save('products.xml');
        echo ("<script type='text/javaScript'>
	            window.alert('Product has been added successfully!');
	            window.location.href='addproductform.php';
	        </script>");

        unset($_SESSION['filename']);
        }
        else
        {
            echo ("<script type='text/javaScript'>
	            window.alert('Fill in all details, please');
	            window.location.href='addproductform.php';
	        </script>");
            unset($_SESSION['filename']);
        }

    }
    else
    {
        die ("Not this tym");
    }        
?>