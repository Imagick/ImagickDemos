<?php

require_once('../vendor/autoload.php');


class DocParser {

    
}

class Parameter {
    private $type;
    
    private $name;
    
    function __construct($type, $name) {
        $this->type = $type;
        $this->name = $name;
    }
}

class ManualEntry {

    private $description;
    
    /** @var  Parameter[] */
    private $parameters;
    
    function addParam(Parameter $parameter) {
        $this->parameters[] = $parameter;
    }
    
    function setDescription($description) {
        $this->description = $description;
    }
    function addParamDescription($term, $description) {
        echo "term $term, description $description\n";
    }
}


function getDoc($fullURL) {

    $client = new \Artax\Client;
    
    $client->setOption('transfertimeout', 25);
    $response = $client->request($fullURL);

    $contentTypeHeaders = $response->getHeader('Content-Type');

    if (array_key_exists(0, $contentTypeHeaders) == false) {
        throw new Exception("Content-type header not set.");
        //return new URLResult($path, 500, "Content-type header not set.");
    }

    $contentType = $contentTypeHeaders[0];
    $colonPosition = strpos($contentType, ';');

    if ($colonPosition !== false) {
        $contentType = substr($contentType, 0, $colonPosition);
    }

    if ($contentType !== 'text/html') {
        //Unknown content type
        return;
    }

   // $body = $response->getBody();

    
    
    $body = <<< 'END'
<refentry xmlns="http://docbook.org/ns/docbook" xml:id="imagick.annotateimage">


 <refnamediv>
  <refname>Imagick::annotateImage</refname>
  <refpurpose>Annotates an image with text</refpurpose>
 </refnamediv>

 <refsect1 role="description">
  &reftitle.description;
  <methodsynopsis>
   <type>bool</type><methodname>Imagick::annotateImage</methodname>
   <methodparam><type>ImagickDraw</type><parameter>draw_settings</parameter></methodparam>
   <methodparam><type>float</type><parameter>x</parameter></methodparam>
   <methodparam><type>float</type><parameter>y</parameter></methodparam>
   <methodparam><type>float</type><parameter>angle</parameter></methodparam>
   <methodparam><type>string</type><parameter>text</parameter></methodparam>
  </methodsynopsis>
  <para>
   Annotates an image with text.
  </para>
 </refsect1>

 <refsect1 role="parameters">
  &reftitle.parameters;
  <para>
   <variablelist>
    <varlistentry>
     <term><parameter>draw_settings</parameter></term>
     <listitem>
      <para>
       The ImagickDraw object that contains settings for drawing the text
      </para>
     </listitem>
    </varlistentry>
    <varlistentry>
     <term><parameter>x</parameter></term>
     <listitem>
      <para>
       Horizontal offset in pixels to the left of text
      </para>
     </listitem>
    </varlistentry>
    <varlistentry>
     <term><parameter>y</parameter></term>
     <listitem>
      <para>
       Vertical offset in pixels to the baseline of text
      </para>
     </listitem>
    </varlistentry>
    <varlistentry>
     <term><parameter>angle</parameter></term>
     <listitem>
      <para>
       The angle at which to write the text
      </para>
     </listitem>
    </varlistentry>
    <varlistentry>
     <term><parameter>text</parameter></term>
     <listitem>
      <para>
       The string to draw
      </para>
     </listitem>
    </varlistentry>
   </variablelist>
  </para>

 </refsect1>
 <refsect1 role="returnvalues">
  &reftitle.returnvalues;
  <para>
   &imagick.return.success;
  </para>
 </refsect1>

 <refsect1 role="examples">
  &reftitle.examples;
  <para>
   <example>
    <title>Using <function>Imagick::annotateImage</function>:</title>
    <para>
     Annotate text on an empty image
    </para>
    <programlisting role="php">
<![CDATA[
<?php
/* Create some objects */
$image = new Imagick();
$draw = new ImagickDraw();
$pixel = new ImagickPixel( 'gray' );

/* New image */
$image->newImage(800, 75, $pixel);

/* Black text */
$draw->setFillColor('black');

/* Font properties */
$draw->setFont('Bookman-DemiItalic');
$draw->setFontSize( 30 );

/* Create text */
$image->annotateImage($draw, 10, 45, 0, 'The quick brown fox jumps over the lazy dog');

/* Give image a format */
$image->setImageFormat('png');

/* Output the image with headers */
header('Content-type: image/png');
echo $image;

?>
]]>
    </programlisting>
   </example>
  </para>
 </refsect1>

 <refsect1 role="seealso">
  &reftitle.seealso;
  <para>
   <simplelist>
    <member><function>ImagickDraw::annotation</function></member>
    <member><function>ImagickDraw::setFont</function></member>
   </simplelist>
  </para>
 </refsect1>

</refentry>



END;


//
//
//
//    $result = $sxe->xpath('//c:refnamediv');
//


    $body = str_replace('&reftitle.returnvalues', 'returnvalues', $body);
    $body = str_replace('&reftitle.examples', 'examples', $body);
    $body = str_replace('&reftitle.seealso', 'examples', $body);
    $body = str_replace('&reftitle.description', 'description', $body);
    $body = str_replace('&reftitle.parameters', 'parameters', $body);
    $body = str_replace('&imagick.return.success', 'success', $body);

    $parameters = [];
    
    $fluentDOM = new FluentDOM();
    
    $fluentDOM->namespaces(['ref' => 'http://docbook.org/ns/docbook']);

    $manualEntry  = new ManualEntry();
    
    $dom = $fluentDOM->load($body, 'text/xml');

    $methodParam = function (DOMElement $element) use($manualEntry) {

        $name = null;
        $type = null;

        foreach ($element->childNodes as $childNode) {
            if ($childNode instanceof DOMElement) {
                if ($childNode->nodeName === 'type') {
                    $type = $childNode->textContent;
                }
                if ($childNode->nodeName === 'parameter') {
                    $name = $childNode->textContent;
                }
            }
        }

        $manualEntry->addParam(new Parameter($type, $name));
    };
//    $imgClosure = function (DOMElement $element) use ($urlToCheck) {
//        $this->parseImgResult($element, $urlToCheck->getUrl());
//    };
//

    
    
    
    $dom->find('//ref:methodparam')->each($methodParam);

    $description = function (DOMElement $element) use ($manualEntry) {
        $manualEntry->setDescription($element->textContent);
    };

    $dom->find('//ref:refsect1[@role="description"]/ref:para')->each($description);


    $paramDescription = function (DOMElement $element) use($manualEntry) {
        $fluentDOM = new FluentDOM();
        $fluentDOM->load($element);
       
        $term = null;
        $description = null;
        
        $termCallback = function (DOMElement $element) {
            var_dump($element);
        };

        $descriptionCallback = function (DOMElement $element) use (&$description) {
            var_dump($element);
        };

        //$fluentDOM->namespaces(['ref' => 'http://docbook.org/ns/docbook']);

        //$fluentDOM->find("/varlistentry/term/parameter", $termCallback);
        $fluentDOM->find("*", $termCallback);
        //$fluentDOM->find("/varlistentry/listitem/para", $descriptionCallback);

//        $manualEntry->addParamDescription($term, $description);
        
    };

//    <variablelist>
//    <varlistentry>
//     <term><parameter>draw_settings</parameter></term>
//     <listitem>
//      <para>
//    The ImagickDraw object that contains settings for drawing the text
//    </para>
//     </listitem>
//    </varlistentry>
    
    $paramDescriptionBlock = $dom->find('//ref:refsect1[@role="parameters"]/ref:para/ref:variablelist');
    
    foreach ($paramDescriptionBlock as $element) {
        /** @var DOMElement $element */
        //echo get_class($element);

        $subDOM = new FluentDOM();
        $subDOM->load($element);

        $subDOM->namespaces(['ref' => 'http://docbook.org/ns/docbook']);
        
        //$termBlock = $subDOM->find("child::*");
        $termBlock = $subDOM->find("ref:varlistentry/ref:term/ref:parameter");

        
        foreach ($termBlock as $term) {
            /** @var DOMElement $term */
            
            var_dump($term);
            echo $term->nodeName."\n";
        }
        
    }

//    var_dump($manualEntry);

 //   var_dump($parameters);
}

$baseURL = "https://svn.php.net/repository/phpdoc/en/trunk/reference/imagick/";

getDoc($baseURL."imagick/annotateimage.xml");