<?php

$id = 1;
$names = "Hiresh Pandoo";
$email = "Hiresh3p@gmail.com";
$phone = "57894561";
$city = "Moka";
$zip = "123456";
$address = "Heya";

$dom = new DOMDocument();

$dom->encoding = 'utf-8';

$dom->xmlVersion = '1.0';

$dom->formatOutput = true;

$xml_file_name = 'clients.xml';

$root = $dom->createElement('Clients');

$attr_xsd = new DOMAttr('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
$root->setAttributeNode($attr_xsd);

$attr_xsd_location = new DOMAttr('xsi:noNamespaceSchemaLocation', 'clients.xsd');
$root->setAttributeNode($attr_xsd_location);

    $client_node = $dom->createElement('client');

        $attr_client_id = new DOMAttr('id', $id);
        $client_node->setAttributeNode($attr_client_id);

        $child_node_name = $dom->createElement('Name', $names);
        $client_node->appendChild($child_node_name);

        $child_node_email = $dom->createElement('Email', $email);
        $client_node->appendChild($child_node_email);

        $child_node_phone = $dom->createElement('Phone', $phone);
        $client_node->appendChild($child_node_phone);

        //address details
        $address_node = $dom->createElement('address');

            $child_node_city = $dom->createElement('City', $city);
            $address_node->appendChild($child_node_city);
            
            $child_node_zip = $dom->createElement('Zip', $zip);
            $address_node->appendChild($child_node_zip);
            
            $child_node_address = $dom->createElement('Address', $address);
            $address_node->appendChild($child_node_address);
        
        $client_node->appendChild($address_node);

    $root->appendChild($client_node);

$dom->appendChild($root);

//Save to XML file
$dom->save($xml_file_name);

echo "$xml_file_name has been successfully created";
}
else
{
$id = 0;
//getting the id(attribute) from the last element
$xml=simplexml_load_file("clients.xml") or die("Error: Cannot create object");
$getlast = $xml->xpath('/Clients/client[last()]/@id');

foreach($getlast as $getid)
{
    $id = $getid + 1;//incrementing the last value by 1;
}

$dom = new DOMDocument();
$dom->load('clients.xml');
$dom->formatOutput = true;

// Get the root element
$root = $dom->getElementsByTagName('Clients');
$child_node = $root->item(0);        

// Create a new element
$client_node = $dom->createElement('client');        
    $client_node->setAttribute( 'id', $id );
    $child_node->appendChild( $client_node );

    $child_node_name = $dom->createElement('Name', $names);
    $client_node->appendChild($child_node_name);

    $child_node_email = $dom->createElement('Email', $email);
    $client_node->appendChild($child_node_email);

    $child_node_phone = $dom->createElement('Phone', $phone);
    $client_node->appendChild($child_node_phone);

    //Address details
    $address_node = $dom->createElement('address');

        $child_node_city = $dom->createElement('City', $city);
        $address_node->appendChild($child_node_city);
        
        $child_node_zip = $dom->createElement('Zip', $zip);
        $address_node->appendChild($child_node_zip);
        
        $child_node_address = $dom->createElement('Address', $address);
        $address_node->appendChild($child_node_address);
    
    $client_node->appendChild($address_node);

    //Card details
    $card_node = $dom->createElement('bankcard');
                
        $child_node_accountnum = $dom->createElement('Accountnum', $accno);
        $card_node->appendChild($child_node_accountnum);
        
        $child_node_expirydate = $dom->createElement('Expirydate', $expirydate);
        $card_node->appendChild($child_node_expirydate);
        
    $client_node->appendChild($card_node);

?>