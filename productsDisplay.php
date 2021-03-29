<?php
// Load XML file
$xml = new DOMDocument;
$xml->load('products.xml');

// Load XSL file
$xsl = new DOMDocument;
$xsl->load('products.xsl');

// Configure the transformer
$proc = new XSLTProcessor;

// Attach the xsl rules
$proc->importStyleSheet($xsl);

echo $proc->transformToXML($xml);
?>