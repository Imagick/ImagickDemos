<?php

require_once('../vendor/autoload.php');


$entityBlock = <<< END



<!-- Imagick generic return types -->


<!DOCTYPE imagick [

<!ENTITY imagick.return.success 'Returns &true; on success.'>
<!ENTITY imagick.imagick.throws 'Throws ImagickException on error.'>
<!ENTITY imagick.imagickdraw.throws 'Throws ImagickDrawException on error.'>
<!ENTITY imagick.imagickpixel.throws 'Throws ImagickPixelException on error.'>
<!ENTITY imagick.imagickpixeliterator.throws 'Throws ImagickPixelIteratorException on error.'>

<!-- Imagick version infos -->
<!ENTITY imagick.method.available.0x629 'This method is available if Imagick has been compiled against ImageMagick version 6.2.9 or newer.'>
<!ENTITY imagick.method.available.0x631 'This method is available if Imagick has been compiled against ImageMagick version 6.3.1 or newer.'>
<!ENTITY imagick.method.available.0x632 'This method is available if Imagick has been compiled against ImageMagick version 6.3.2 or newer.'>
<!ENTITY imagick.method.available.0x636 'This method is available if Imagick has been compiled against ImageMagick version 6.3.6 or newer.'>
<!ENTITY imagick.method.available.0x637 'This method is available if Imagick has been compiled against ImageMagick version 6.3.7 or newer.'>
<!ENTITY imagick.method.available.0x638 'This method is available if Imagick has been compiled against ImageMagick version 6.3.8 or newer.'>
<!ENTITY imagick.method.available.0x639 'This method is available if Imagick has been compiled against ImageMagick version 6.3.9 or newer.'>
<!ENTITY imagick.method.available.0x640 'This method is available if Imagick has been compiled against ImageMagick version 6.4.0 or newer.'>
<!ENTITY imagick.method.available.0x641 'This method is available if Imagick has been compiled against ImageMagick version 6.4.1 or newer.'>
<!ENTITY imagick.method.available.0x642 'This method is available if Imagick has been compiled against ImageMagick version 6.4.2 or newer.'>
<!ENTITY imagick.method.available.0x643 'This method is available if Imagick has been compiled against ImageMagick version 6.4.3 or newer.'>
<!ENTITY imagick.method.available.0x644 'This method is available if Imagick has been compiled against ImageMagick version 6.4.4 or newer.'>
<!ENTITY imagick.method.available.0x645 'This method is available if Imagick has been compiled against ImageMagick version 6.4.5 or newer.'>
<!ENTITY imagick.method.available.0x647 'This method is available if Imagick has been compiled against ImageMagick version 6.4.7 or newer.'>
<!ENTITY imagick.method.available.0x649 'This method is available if Imagick has been compiled against ImageMagick version 6.4.9 or newer.'>
<!ENTITY imagick.method.available.0x653 'This method is available if Imagick has been compiled against ImageMagick version 6.5.3 or newer.'>
<!ENTITY imagick.method.available.0x657 'This method is available if Imagick has been compiled against ImageMagick version 6.5.7 or newer.'>

<!ENTITY imagick.constant.available 'This constant is available if Imagick has been compiled against ImageMagick version'>

<!-- Imagick default channel information -->
<!ENTITY imagick.default.channel.info 'Defaults to <constant xmlns="http://docbook.org/ns/docbook">Imagick::CHANNEL_DEFAULT</constant>. Refer to this list of <link xmlns="http://docbook.org/ns/docbook" linkend="imagick.constants.channel">channel constants</link>'>

<!-- Fuzz parameter -->
<!ENTITY imagick.parameter.fuzz 'The amount of fuzz. For example, set fuzz to 10 and the color red at intensities of 100 and 102 respectively are now interpreted as the same color.'>

<!-- Channel parameter -->
<!ENTITY imagick.parameter.channel 'Provide any channel constant that is valid for your channel mode. To apply to more than one channel, combine <link xmlns="http://docbook.org/ns/docbook" linkend="imagick.constants.channel">channel constants</link> using bitwise operators. &imagick.default.channel.info;'>

<!-- Alpha parameter -->
<!ENTITY imagick.parameter.alpha 'The level of transparency: 1.0 is fully opaque and 0.0 is fully transparent.'>

<!ENTITY imagick.imagickexception.throw 'Throw an
<classname xmlns="http://docbook.org/ns/docbook">ImagickException</classname> on error.'>

<!ENTITY imagick.bestfit.note '<note xmlns="http://docbook.org/ns/docbook">
 <simpara>
  The behavior of the parameter <parameter>bestfit</parameter> changed in Imagick 3.0.0.
  Before this version given dimensions 400x400 an image of dimensions 200x150 would be
  left untouched. In Imagick 3.0.0 and later the image would be scaled up to size 400x300 as
  this is the "best fit" for the given dimensions. If <parameter>bestfit</parameter>
  parameter is used both width and height must be given.
 </simpara>
</note>'>


]>

END;


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
    
    function toArray() {
        return [
            'type' => $this->type,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}

class ManualEntry {

    private $functionName;
    
    private $description;
    
    private $methodDescription;
    
    private $returnType;
    
    /** @var  Parameter[] */
    private $parameters = [];


    private $classname;
    
    private $method;
    

    function __construct($classname, $method) {
        $this->classname = $classname;
        $this->method = $method;
    }

    function toArray() {

        $return = [
            'functionName' => $this->functionName,
            'description' => $this->description,
            'methodDescription' => $this->methodDescription,
            'returnType' => $this->returnType,
            'classname' => $this->classname,
            'method' => $this->method,
            'parameters' => []
        ];
        
        foreach ($this->parameters as $parameter) {
            $return['parameters'][] = $parameter->toArray(); 
        }

        return $return;
    }
    
    /**
     * @return mixed
     */
    public function getClassname() {
        return $this->classname;
    }

    /**
     * @return mixed
     */
    public function getMethod() {
        return $this->method;
    }

    function setFunctionName($functionName) {
        $this->functionName = trim($functionName);

        $this->functionName = str_replace(
            ['Imagick::',
                'ImagickPixel::',
                'ImagickDraw::',
            ],
            '',
            $this->functionName
        );
    }

    function setMethodDescription($methodDescription) {
        $this->methodDescription = trim($methodDescription);
    }
    
    function addParam(Parameter $parameter) {
        $this->parameters[] = $parameter;
    }
    
    function setDescription($description) {
        $this->description = trim($description);
    }

    function setReturnType($returnType) {
        $this->returnType = trim($returnType);
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
        
        if ($this->functionName) {
            $output .= $this->functionName."\n";
        }
        else {
            $output .= "Method name missing\n";
        }
        $output .= "\n";
        
        if ($this->methodDescription) {
            $output .= $this->methodDescription."\n";
            $output .= "\n";
        }

        if ($this->parameters) {
            foreach ($this->parameters as $parameter) {
                $output .=   $parameter->getType()." ".$parameter->getName()." ".$parameter->getDescription()."\n";
            }
        }
        else {
          //no parameters  
        }

        if ($this->returnType) {
            $output .= $this->returnType."\n";
        }
        else {
            $output .= "Return type not set\n";
        }

        return $output;
    }
}



class DocParser {

    /**
     * @var ManualEntry[]
     */
    private $manualEntries = [];


    function writeDoc() {
        foreach ($this->manualEntries as $manualEntry) {
            echo "".$manualEntry->getClassname()." - ".$manualEntry->getMethod()."\n";
            echo $manualEntry->toString();
            echo "\n\n";
        }
    }
    
//    function writeFile($filename) {
//     
//        $output = <<< END
//
//        class Doc
//
//END;
//
//        
//        
//        
//        file_put_contents($filename, $output);        
//        
//    }
    

function getDoc($fullURL, $classname, $method) {

    $client = new \Artax\Client;
    $request = new \Artax\Request;
    
    $client->setOption('transfertimeout', 25);

    echo "$fullURL \n";
    $request->setUri($fullURL);
    $request->setHeader('Accept', 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8');

    $request->setHeader('Accept-Encoding', 'gzip,deflate,sdch');
    $request->setHeader('Accept-Language', 'en-US,en;q=0.8');
    $request->setHeader('Host', 'svn.php.net');
    $request->setHeader('User-Agent', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36');


    


//Cache-Control:max-age=0
//Connection:keep-alive
//Cookie:MYPHPNET=%2C%2CNONE%2C0%2C; uvts=1nfuEIFstwB6CP0; LAST_NEWS=1401284942; COUNTRY=GBR%2C89.242.230.142; LAST_LANG=en

//If-Modified-Since:Thu, 12 Jan 2012 05:08:38 GMT
//If-None-Match:"322115//phpdoc/en/trunk/reference/imagick/imagick/annotateimage.xml"
///User-Agent:Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36
    
    
    
    $response = $client->request($request);
    
    if ($response->getStatus() != 200) {
        echo "Failed to read URL";
        echo $response->getBody();

        return null;
    }

    $contentTypeHeaders = $response->getHeader('Content-Type');

    if (array_key_exists(0, $contentTypeHeaders) == false) {
        throw new Exception("Content-type header not set.");
    }

    $contentType = $contentTypeHeaders[0];
    $colonPosition = strpos($contentType, ';');

    if ($colonPosition !== false) {
        $contentType = substr($contentType, 0, $colonPosition);
    }

//    if ($contentType !== 'text/html') {
//        echo "Unknown content type $contentType";
//        return;
//    }




    $SR = [
        
        '&reftitle.errors' => 'errors',
        '&example.outputs.similar' => 'similar',
        '&reftitle.returnvalues' => 'returnvalues',
        '&reftitle.examples' => 'examples',
        '&reftitle.seealso' => 'examples',
        '&reftitle.description' => 'description',
        '&reftitle.parameters' => 'parameters',
        '&reftitle.changelog' => 'changelog',
        '&Version' => 'Version',
        '&Description' => 'Description',
        '&true' => 'True',
        '&false' => 'False',
        '&return.success' => 'Return success',
        '&return.void' => 'return void', //setimagegravity.xml 
        '&example.outputs' => 'Output',
        '&float' => 'float', //imagick/getpointsize.xml,
        '&reftitle.notes' => 'Notes',
        '&warn.undocumented.func' => 'Undocumented',
        '&no.function.parameters' => 'no.function.parameters',
        
//        '&imagick.return.success' => 'true on success, false on error',
//        '&imagick.method.available' => 'available',
//        '&imagick.imagick.throws' => 'throws',
//        '&imagick.parameter.channel' => 'Imagick channel constant',
//        '&imagick.parameter.alpha' => 'Alpha',
//        '&imagick.bestfit.note' => 'imagick.bestfit.note',
//        '&imagick.parameter.fuzz' => '',
//        '&imagick.imagickexception.throw' => 'Throws ImagickException',
    
          '&url.imagemagick.usage.transform.function' => 'transform.function', 
          '&url.imagemagick' => 'ImageMagick URL',  //imagick/fximage.xml

    
    ];

    $body = $response->getBody();

    $body = str_replace(
        "<?xml version=\"1.0\" encoding=\"UTF-8\"?>",
        "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n".$GLOBALS['entityBlock'],
        $body
    );

    $body = str_replace(array_keys($SR), array_values($SR), $body);

    $fluentDOM = new FluentDOM();
    $fluentDOM->namespaces(['ref' => 'http://docbook.org/ns/docbook']);
    $manualEntry  = new ManualEntry($classname, $method);
    //echo $body;    
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

    if ($nameBlock->count()) {
        $methodDescriptionBlock = $dom->find('//ref:refnamediv/ref:refpurpose');
    
        foreach ($methodDescriptionBlock as $methodDescriptionElement) {
            /** @var DOMElement $term */
            $manualEntry->setMethodDescription($methodDescriptionElement->textContent);
        }
    }


    $returnTypeBlock = $dom->find('//ref:refsect1[@role="returnvalues"]/ref:para');

    foreach ($returnTypeBlock as $returnTypeElement) {
        /** @var DOMElement $term */
        $manualEntry->setReturnType($returnTypeElement->textContent);
    }

    $this->manualEntries[] = $manualEntry;

    return $manualEntry;
}

}
    


$urlList = [ 

'imagickpixel' => [
    'clear.xml',
    'construct.xml',
    'destroy.xml',
    'getcolor.xml',
    'getcolorasstring.xml',
    'getcolorcount.xml',
    'getcolorvalue.xml',
    'gethsl.xml',
    'ispixelsimilar.xml',
    'issimilar.xml',
    'setcolor.xml',
    'setcolorvalue.xml',
    'sethsl.xml',
],

'imagickpixeliterator' => [
    'clear.xml',
    'construct.xml',
    'destroy.xml',
    'getcurrentiteratorrow.xml',
    'getiteratorrow.xml',
    'getnextiteratorrow.xml',
    'getpreviousiteratorrow.xml',
    'newpixeliterator.xml',
    'newpixelregioniterator.xml',
    'resetiterator.xml',
    'setiteratorfirstrow.xml',
    'setiteratorlastrow.xml',
    'setiteratorrow.xml',
    'synciterator.xml',
],
    
    
'imagickdraw' => [

'affine.xml',
'annotation.xml',
'arc.xml',
'bezier.xml',
'circle.xml',
'clear.xml',
'clone.xml',
'color.xml',
'comment.xml',
'composite.xml',
'construct.xml',
'destroy.xml',
'ellipse.xml',
'getclippath.xml',
'getcliprule.xml',
'getclipunits.xml',
'getfillcolor.xml',
'getfillopacity.xml',
'getfillrule.xml',
'getfont.xml',
'getfontfamily.xml',
'getfontsize.xml',
'getfontstyle.xml',
'getfontweight.xml',
'getgravity.xml',
'getstrokeantialias.xml',
'getstrokecolor.xml',
'getstrokedasharray.xml',
'getstrokedashoffset.xml',
'getstrokelinecap.xml',
'getstrokelinejoin.xml',
'getstrokemiterlimit.xml',
'getstrokeopacity.xml',
'getstrokewidth.xml',
'gettextalignment.xml',
'gettextantialias.xml',
'gettextdecoration.xml',
'gettextencoding.xml',
'gettextundercolor.xml',
'getvectorgraphics.xml',
'line.xml',
'matte.xml',
'pathclose.xml',
'pathcurvetoabsolute.xml',
'pathcurvetoquadraticbezierabsolute.xml',
'pathcurvetoquadraticbezierrelative.xml',
'pathcurvetoquadraticbeziersmoothabsolute.xml',
'pathcurvetoquadraticbeziersmoothrelative.xml',
'pathcurvetorelative.xml',
'pathcurvetosmoothabsolute.xml',
'pathcurvetosmoothrelative.xml',
'pathellipticarcabsolute.xml',
'pathellipticarcrelative.xml',
'pathfinish.xml',
'pathlinetoabsolute.xml',
'pathlinetohorizontalabsolute.xml',
'pathlinetohorizontalrelative.xml',
'pathlinetorelative.xml',
'pathlinetoverticalabsolute.xml',
'pathlinetoverticalrelative.xml',
'pathmovetoabsolute.xml',
'pathmovetorelative.xml',
'pathstart.xml',
'point.xml',
'polygon.xml',
'polyline.xml',
'pop.xml',
'popclippath.xml',
'popdefs.xml',
'poppattern.xml',
'push.xml',
'pushclippath.xml',
'pushdefs.xml',
'pushpattern.xml',
'rectangle.xml',
'render.xml',
'rotate.xml',
'roundrectangle.xml',
'scale.xml',
'setclippath.xml',
'setcliprule.xml',
'setclipunits.xml',
'setfillalpha.xml',
'setfillcolor.xml',
'setfillopacity.xml',
'setfillpatternurl.xml',
'setfillrule.xml',
'setfont.xml',
'setfontfamily.xml',
'setfontsize.xml',
'setfontstretch.xml',
'setfontstyle.xml',
'setfontweight.xml',
'setgravity.xml',
'setstrokealpha.xml',
'setstrokeantialias.xml',
'setstrokecolor.xml',
'setstrokedasharray.xml',
'setstrokedashoffset.xml',
'setstrokelinecap.xml',
'setstrokelinejoin.xml',
'setstrokemiterlimit.xml',
'setstrokeopacity.xml',
'setstrokepatternurl.xml',
'setstrokewidth.xml',
'settextalignment.xml',
'settextantialias.xml',
'settextdecoration.xml',
'settextencoding.xml',
'settextundercolor.xml',
'setvectorgraphics.xml',
'setviewbox.xml',
'skewx.xml',
'skewy.xml',
'translate.xml',

    
],
    
    

'imagick' => [


'adaptiveblurimage.xml',
'adaptiveresizeimage.xml',
'adaptivesharpenimage.xml',
'adaptivethresholdimage.xml',
'addimage.xml',
'addnoiseimage.xml',
'affinetransformimage.xml',
'animateimages.xml',
'annotateimage.xml',
'appendimages.xml',
'averageimages.xml',
'blackthresholdimage.xml',
'blurimage.xml',
'borderimage.xml',
'charcoalimage.xml',
'chopimage.xml',
'clear.xml',
'clipimage.xml',
'clippathimage.xml',
'clone.xml',
'clutimage.xml',
'coalesceimages.xml',
'colorfloodfillimage.xml',
'colorizeimage.xml',
'combineimages.xml',
'commentimage.xml',
'compareimagechannels.xml',
'compareimagelayers.xml',
'compareimages.xml',
'compositeimage.xml',
'construct.xml',
'contrastimage.xml',
'contraststretchimage.xml',
'convolveimage.xml',
'cropimage.xml',
'cropthumbnailimage.xml',
'current.xml',
'cyclecolormapimage.xml',
'decipherimage.xml',
'deconstructimages.xml',
'deleteimageartifact.xml',
'deskewimage.xml',
'despeckleimage.xml',
'destroy.xml',
'displayimage.xml',
'displayimages.xml',
'distortimage.xml',
'drawimage.xml',
'edgeimage.xml',
'embossimage.xml',
'encipherimage.xml',
'enhanceimage.xml',
'equalizeimage.xml',
'evaluateimage.xml',
'exportimagepixels.xml',
'extentimage.xml',
'flattenimages.xml',
'flipimage.xml',
'floodfillpaintimage.xml',
'flopimage.xml',
'frameimage.xml',
'functionimage.xml',
'fximage.xml',
'gammaimage.xml',
'gaussianblurimage.xml',
'getcolorspace.xml',
'getcompression.xml',
'getcompressionquality.xml',
'getcopyright.xml',
'getfilename.xml',
'getfont.xml',
'getformat.xml',
'getgravity.xml',
'gethomeurl.xml',
'getimage.xml',
'getimagealphachannel.xml',
'getimageartifact.xml',
'getimagebackgroundcolor.xml',
'getimageblob.xml',
'getimageblueprimary.xml',
'getimagebordercolor.xml',
'getimagechanneldepth.xml',
'getimagechanneldistortion.xml',
'getimagechanneldistortions.xml',
'getimagechannelextrema.xml',
'getimagechannelkurtosis.xml',
'getimagechannelmean.xml',
'getimagechannelrange.xml',
'getimagechannelstatistics.xml',
'getimageclipmask.xml',
'getimagecolormapcolor.xml',
'getimagecolors.xml',
'getimagecolorspace.xml',
'getimagecompose.xml',
'getimagecompression.xml',
'getimagecompressionquality.xml',
'getimagedelay.xml',
'getimagedepth.xml',
'getimagedispose.xml',
'getimagedistortion.xml',
'getimageextrema.xml',
'getimagefilename.xml',
'getimageformat.xml',
'getimagegamma.xml',
'getimagegeometry.xml',
'getimagegravity.xml',
'getimagegreenprimary.xml',
'getimageheight.xml',
'getimagehistogram.xml',
'getimageindex.xml',
'getimageinterlacescheme.xml',
'getimageinterpolatemethod.xml',
'getimageiterations.xml',
'getimagelength.xml',
'getimagemagicklicense.xml',
'getimagematte.xml',
'getimagemattecolor.xml',
'getimageorientation.xml',
'getimagepage.xml',
'getimagepixelcolor.xml',
'getimageprofile.xml',
'getimageprofiles.xml',
'getimageproperties.xml',
'getimageproperty.xml',
'getimageredprimary.xml',
'getimageregion.xml',
'getimagerenderingintent.xml',
'getimageresolution.xml',
'getimagesblob.xml',
'getimagescene.xml',
'getimagesignature.xml',
'getimagesize.xml',
'getimagetickspersecond.xml',
'getimagetotalinkdensity.xml',
'getimagetype.xml',
'getimageunits.xml',
'getimagevirtualpixelmethod.xml',
'getimagewhitepoint.xml',
'getimagewidth.xml',
'getinterlacescheme.xml',
'getiteratorindex.xml',
'getnumberimages.xml',
'getoption.xml',
'getpackagename.xml',
'getpage.xml',
'getpixeliterator.xml',
'getpixelregioniterator.xml',
'getpointsize.xml',
'getquantumdepth.xml',
'getquantumrange.xml',
'getreleasedate.xml',
'getresource.xml',
'getresourcelimit.xml',
'getsamplingfactors.xml',
'getsize.xml',
'getsizeoffset.xml',
'getversion.xml',
'haldclutimage.xml',
'hasnextimage.xml',
'haspreviousimage.xml',
'identifyimage.xml',
'implodeimage.xml',
'importimagepixels.xml',
'labelimage.xml',
'levelimage.xml',
'linearstretchimage.xml',
'liquidrescaleimage.xml',
'magnifyimage.xml',
'mapimage.xml',
'mattefloodfillimage.xml',
'medianfilterimage.xml',
'mergeimagelayers.xml',
'minifyimage.xml',
'modulateimage.xml',
'montageimage.xml',
'morphimages.xml',
'mosaicimages.xml',
'motionblurimage.xml',
'negateimage.xml',
'newimage.xml',
'newpseudoimage.xml',
'nextimage.xml',
'normalizeimage.xml',
'oilpaintimage.xml',
'opaquepaintimage.xml',
'optimizeimagelayers.xml',
'orderedposterizeimage.xml',
'paintfloodfillimage.xml',
'paintopaqueimage.xml',
'painttransparentimage.xml',
'pingimage.xml',
'pingimageblob.xml',
'pingimagefile.xml',
'polaroidimage.xml',
'posterizeimage.xml',
'previewimages.xml',
'previousimage.xml',
'profileimage.xml',
'quantizeimage.xml',
'quantizeimages.xml',
'queryfontmetrics.xml',
'queryfonts.xml',
'queryformats.xml',
'radialblurimage.xml',
'raiseimage.xml',
'randomthresholdimage.xml',
'readimage.xml',
'readimageblob.xml',
'readimagefile.xml',
'recolorimage.xml',
'reducenoiseimage.xml',
'remapimage.xml',
'removeimage.xml',
'removeimageprofile.xml',
'render.xml',
'resampleimage.xml',
'resetimagepage.xml',
'resizeimage.xml',
'rollimage.xml',
'rotateimage.xml',
'roundcorners.xml',
'sampleimage.xml',
'scaleimage.xml',
'segmentimage.xml',
'separateimagechannel.xml',
'sepiatoneimage.xml',
'setbackgroundcolor.xml',
'setcolorspace.xml',
'setcompression.xml',
'setcompressionquality.xml',
'setfilename.xml',
'setfirstiterator.xml',
'setfont.xml',
'setformat.xml',
'setgravity.xml',
'setimage.xml',
'setimagealphachannel.xml',
'setimageartifact.xml',
'setimagebackgroundcolor.xml',
'setimagebias.xml',
'setimageblueprimary.xml',
'setimagebordercolor.xml',
'setimagechanneldepth.xml',
'setimageclipmask.xml',
'setimagecolormapcolor.xml',
'setimagecolorspace.xml',
'setimagecompose.xml',
'setimagecompression.xml',
'setimagecompressionquality.xml',
'setimagedelay.xml',
'setimagedepth.xml',
'setimagedispose.xml',
'setimageextent.xml',
'setimagefilename.xml',
'setimageformat.xml',
'setimagegamma.xml',
'setimagegravity.xml',
'setimagegreenprimary.xml',
'setimageindex.xml',
'setimageinterlacescheme.xml',
'setimageinterpolatemethod.xml',
'setimageiterations.xml',
'setimagematte.xml',
'setimagemattecolor.xml',
'setimageopacity.xml',
'setimageorientation.xml',
'setimagepage.xml',
'setimageprofile.xml',
'setimageproperty.xml',
'setimageredprimary.xml',
'setimagerenderingintent.xml',
'setimageresolution.xml',
'setimagescene.xml',
'setimagetickspersecond.xml',
'setimagetype.xml',
'setimageunits.xml',
'setimagevirtualpixelmethod.xml',
'setimagewhitepoint.xml',
'setinterlacescheme.xml',
'setiteratorindex.xml',
'setlastiterator.xml',
'setoption.xml',
'setpage.xml',
'setpointsize.xml',
'setresolution.xml',
'setresourcelimit.xml',
'setsamplingfactors.xml',
'setsize.xml',
'setsizeoffset.xml',
'settype.xml',
'shadeimage.xml',
'shadowimage.xml',
'sharpenimage.xml',
'shaveimage.xml',
'shearimage.xml',
'sigmoidalcontrastimage.xml',
'sketchimage.xml',
'solarizeimage.xml',
'sparsecolorimage.xml',
'spliceimage.xml',
'spreadimage.xml',
'steganoimage.xml',
'stereoimage.xml',
'stripimage.xml',
'swirlimage.xml',
'textureimage.xml',
'thresholdimage.xml',
'thumbnailimage.xml',
'tintimage.xml',
'transformimage.xml',
'transparentpaintimage.xml',
'transposeimage.xml',
'transverseimage.xml',
'trimimage.xml',
'uniqueimagecolors.xml',
'unsharpmaskimage.xml',
'valid.xml',
'vignetteimage.xml',
'waveimage.xml',
'whitethresholdimage.xml',
'writeimage.xml',
'writeimagefile.xml',
'writeimages.xml',
'writeimagesfile.xml',
]
];


function writeManualEntry(ManualEntry $manualEntry, $filename) {
    $output = var_export($manualEntry->toArray(), true);
    file_put_contents($filename, $output);
}

$docParser = new DocParser();
$baseURL = "http://svn.php.net/repository/phpdoc/en/trunk/reference/imagick/";


foreach ($urlList as $subdir => $entries) {
    foreach ($entries as $entry) {

        $filename = "./man/".$subdir.$entry.".txt";
        
        if (file_exists($filename) == false) {
            $manualEntry = $docParser->getDoc($baseURL."/$subdir/$entry", $subdir, $entry);
            
            if ($manualEntry) {
                writeManualEntry($manualEntry, $filename);
            }
        }
    }

}







$manualEntries = [];

foreach ($urlList as $subdir => $entries) {
    foreach ($entries as $entry) {
        $filename = "./man/".$subdir.$entry.".txt";
    
        if (file_exists($filename) == true) {
            $contents = file_get_contents($filename);
            $contents = "return ".$contents.";";
            $result = eval($contents);
            $entry = str_replace('.xml', '', $entry);
            $manualEntries[$subdir][$entry] = $result;
        }
    }
    
}

$manualEntries = var_export($manualEntries, true);

$output = <<< END
<?php

namespace ImagickDemo;

class DocHelper {

    private \$manualEntries = $manualEntries;

    private \$category;
    private \$example;

    function __construct(\$category, \$example) {
        \$this->category = strtolower(\$category);
        \$this->example = strtolower(\$example);
    }

    function showDoc() {
        if (isset(\$this->manualEntries[\$this->category][\$this->example]) == false) {
            return "";
        }

        \$manualEntry = \$this->manualEntries[\$this->category][\$this->example];
        
        \$output = '';
        //\$output = '<table>';
        //\$output .= "<tr><td colspan='3'>".\$manualEntry['functionName']."</td></tr>";
        //\$output .= "<tr><td colspan='3'>".\$manualEntry['description']."</td></tr>";

        \$output .= \$manualEntry['description'];
        
      
    
        if (count(\$manualEntry['parameters'])) {
            \$output .= "<h5>Parameters</h5>";

            \$output .= "<table class='smallPadding'><tbody>";

            foreach (\$manualEntry['parameters'] as \$parameter) {
                \$output .= "<tr>";
                    \$output .= "<td class='smallPadding' valign='top'>".\$parameter['name']."</td>";
                    \$output .= "<td class='smallPadding' valign='top'>".\$parameter['type']."</td>";
                    \$output .= "<td class='smallPadding' valign='top'>".\$parameter['description']."</td>";
                \$output .= "</tr>";
            }

            \$output .= "</tbody></table>";
        }


        return \$output; 
    }

}
END;

$path = "../var/compile/ImagickDemo/DocHelper.php";

file_put_contents($path, $output);
