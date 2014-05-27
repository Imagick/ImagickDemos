<?php




$string = <<< XML
<a xmlns="http://docbook.org/ns/docbook" xml:id="imagick.annotateimage">
 <b>
  <c>text</c>
  <c>stuff</c>
 </b>
 <d>
  <c>code</c>
 </d>
</a>
XML;


$phpString = <<< XML

<refentry xmlns="http://docbook.org/ns/docbook" xml:id="imagick.annotateimage">


 <refnamediv>
  <refname>Imagick::annotateImage</refname>
  <refpurpose>Annotates an image with text</refpurpose>
 </refnamediv>

</refentry>
XML;

//
//$xml = new SimpleXMLElement($string);
//$result = $xml->xpath('/a/b/c');
//var_dump($result);




$sxe = new SimpleXMLElement($phpString);
$sxe->registerXPathNamespace('c', 'http://docbook.org/ns/docbook');
//$result = $sxe->xpath('//c:title');

$result = $sxe->xpath('//c:refnamediv');
var_dump($result);
