<?php
$xml = new DOMDocument();
$xml->load( 'products.xml' );

#start xslt
$xslt = new XSLTProcessor();

#import stylesheet
$xsl = new DOMDocument();
$xsl->load( 'products.xsl' );
$xslt->importStylesheet($xsl);

#print
    print $xslt->transformToXML($xml);
?> 