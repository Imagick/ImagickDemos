<?php

require_once('../vendor/autoload.php');


class DocParser {

    
}

class Parameter {
    private $type;
    
    private $name;
    
    private $description;
    
    
    
    function __construct($type, $name) {
        $this->type = $type;
        $this->name = $name;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function getDescription() {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getType() {
        return $this->type;
    }
}

class ManualEntry {

    private $functionName;
    
    private $description;
    
    private $methodDescription;
    
    /** @var  Parameter[] */
    private $parameters;

    function setFunctionName($functionName) {
        $this->functionName = $functionName;
    }

    function setMethodDescription($methodDescription) {
        $this->methodDescription = $methodDescription;
    }
    
    function addParam(Parameter $parameter) {
        $this->parameters[] = $parameter;
    }
    
    function setDescription($description) {
        $this->description = $description;
    }

    function addParamDescription($term, $description) {
        foreach($this->parameters as $parameter) {
            if ($parameter->getName() === $term) {
                $parameter->setDescription($description);
            }
        }
    }
    
    function toString() {
        $output =  "";
        
        $output .= $this->functionName."\n";
        $output .= "\n";
        $output .= $this->methodDescription."\n";
        $output .= "\n";

        foreach ($this->parameters as $parameter) {
            $output .=   $parameter->getType()." ".$parameter->getName()." ".$parameter->getDescription()."\n";
        }
        

        return $output;
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


    
    $dom->find('//ref:methodparam')->each($methodParam);

    $description = function (DOMElement $element) use ($manualEntry) {
        $manualEntry->setDescription($element->textContent);
    };

    $dom->find('//ref:refsect1[@role="description"]/ref:para')->each($description);

    $paramDescriptionBlock = $dom->find('//ref:refsect1[@role="parameters"]/ref:para/ref:variablelist/ref:varlistentry');
    
    foreach ($paramDescriptionBlock as $element) {
        /** @var DOMElement $element */

        //echo "Found entry \n";
        $paramName = null;
        $paramDescription = null;
        
        $subDOM = new FluentDOM();
        $subDOM->load($element);
        $subDOM->namespaces(['ref' => 'http://docbook.org/ns/docbook']);
        
        $termBlock = $subDOM->find("child::ref:term/ref:parameter");
        foreach ($termBlock as $term) {
            /** @var DOMElement $term */
            //echo $term->textContent."\n";
            $paramName .= trim($term->textContent);
        }

        $descriptionBlock = $subDOM->find("child::ref:listitem/ref:para");
        foreach ($descriptionBlock as $description) {
            /** @var DOMElement $term */
            $paramDescription .= trim($description->textContent);
        }

        $manualEntry->addParamDescription($paramName, $paramDescription);
    }

    $nameBlock = $dom->find('//ref:refnamediv/ref:refname');
    
    if ($nameBlock->count()) {
        foreach ($nameBlock as $nameElement) {
            /** @var DOMElement $term */
            $manualEntry->setFunctionName($nameElement->textContent);
        }
    }
    else {
        echo "No method name found.";
    }

    if ($nameBlock->count()) {
        $methodDescriptionBlock = $dom->find('//ref:refnamediv/ref:refpurpose');
    
        foreach ($methodDescriptionBlock as $methodDescriptionElement) {
            /** @var DOMElement $term */
            $manualEntry->setMethodDescription($methodDescriptionElement->textContent);
        }
    }
    else {
        echo "No description found.";
    }
    

    
    echo $manualEntry->toString();
}

$baseURL = "https://svn.php.net/repository/phpdoc/en/trunk/reference/imagick/";

getDoc($baseURL."imagick/annotateimage.xml");