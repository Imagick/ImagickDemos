<?php

namespace ImagickDemo\Example;

class composite extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\CompositeExampleControl
     */
    private $compositeExampleControl;

    function __construct(\ImagickDemo\Control\CompositeExampleControl $compositeExampleControl) {
        $this->compositeExampleControl = $compositeExampleControl;
    }

    function render() {
        $output = $this->renderDescription();
        $output .= $this->renderCustomImageURL();

        return $output;
    }


    function renderCustomImageURL() {
        return sprintf(
            "<img src='%s' />",
            $this->compositeExampleControl->getCustomImageURL()
        );
    }
    
    function renderCustomImage() {
        $methods = [ 
            'multiplyGradients' => 'multiplyGradients',
            'screenGradients' => 'screenGradients',
            'divide' => 'divide',
            'Dst_In' => 'Dst_In',
            'Dst_Out' => 'Dst_Out',
            'ATop' => 'ATop',
            'Plus' => 'Plus',
            'Minus' => 'Minus',
            'CopyOpacity' => 'CopyOpacity', 
            'CopyOpacity2' => 'CopyOpacity2',
        ];

        $customImage  = $this->compositeExampleControl->getCompositeExampleType();

        if (array_key_exists($customImage, $methods) == false) {
            throw new \Exception("Unknown composite method $customImage");  
        }

        $method = $methods[$customImage];
        $this->{$method}();
    }
    

    function renderDescription() {
        return "Select a demo:<br/>";
    }
    
    function renderasd() {

//        echo "Select a demo:<br/>";
//        echo "<select onchange='setExample(this);'>";
//        echo "<option value='-1' >Choose a composite demo</option>";
//
//        foreach ($this->listOfExamples as $example) {
//            echo "<option value='" . $example[0] . "'>" . $example[1] . "</option>";
//        }
//
//        echo "</select>";
//
//        echo "
//   
//
//    <script type='text/javascript'>
//
//    function setExample(dropdown, baseURL) {
//        var value = $(dropdown).val();
//
//        var url = baseURL + '?example=' + encodeURIComponent(value);
//
//        var image = $('#exampleImage');
//
//        if (image) {
//            image.attr('src', url);
//            image.css('display', 'inline-block');
//        }
//        else {
//            alert('image not found');
//        }
//    }
//    
//    </script>
//    ";

        
    }

    function renderImage() {
        $this->multiplyGradients(400, 400);
    }


    function multiplyGradients() {
        $imagick = new \Imagick(realpath("../images/gradientDown.png"));
        $imagick2 = new \Imagick(realpath("../images/gradientRight.png"));
        $imagick->compositeimage($imagick2, \Imagick::COMPOSITE_MULTIPLY, 0, 0);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }


    function screenGradients() {
        $imagick = new \Imagick(realpath("../images/gradientDown.png"));
        $imagick2 = new \Imagick(realpath("../images/gradientRight.png"));
        $imagick->compositeimage($imagick2, \Imagick::COMPOSITE_SCREEN, 0, 0);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }


    function divide() {
        $imagick = new \Imagick(realpath("../images/text_scan.png"));
        $imagickCopy = clone $imagick;
        $imagickCopy->blurImage(0x20, 1);
        $imagick->compositeimage($imagickCopy, \Imagick::COMPOSITE_COLORDODGE, 0, 0);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }


    /**
     * This is meant to be a simple alpha mask
     * @internal param $width
     * @internal param $height
     */
    function Dst_In() {
        $imagick = new \Imagick(realpath("../images/gradientDown.png"));
        $imagick2 = new \Imagick(realpath("../images/whiteDiscAlpha.png"));
        $imagick->setBackgroundColor('yellow');
        $imagick2->setBackgroundColor('yellow');
        $imagick->compositeimage(
            $imagick2,
            \Imagick::COMPOSITE_DSTIN,
            0,
            0
        );

        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }



    /**
     * This is meant to be an inversed alpha mask
     * @internal param $width
     * @internal param $height
     */
    function Dst_Out() {
        $imagick = new \Imagick();
        $imagick->setBackgroundColor('yellow');
        $imagick->newPseudoImage(500, 500, 'gradient:white-black');
//        $imagick2 = new \Imagick(realpath("../images/whiteDiscAlpha.png"));
//        $imagick2->setBackgroundColor('yellow');
//
//        $imagick->compositeimage($imagick2, \Imagick::COMPOSITE_DSTOUT, //\\Imagick::COMPOSITE_DSTATOP,
//            0, 0);

        $imagick->setImageFormat('png');
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }


    function ATop() {

        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));
        $imagick2 = new \Imagick(realpath("../images/whiteDiscAlpha.png"));

        $imagick2->setBackgroundColor('yellow');

        $imagick->compositeimage($imagick2, //\\Imagick::COMPOSITE_DSTOUT,
            \Imagick::COMPOSITE_ATOP, 0, 0);

        $imagick->setImageFormat('png');
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }


    function Plus() {

        $redImagick = new \Imagick(realpath("../images/redDiscAlpha.png"));
        $greenImagick = new \Imagick(realpath("../images/greenDiscAlpha.png"));
        $blueImagick = new \Imagick(realpath("../images/blueDiscAlpha.png"));


        $redImagick->compositeimage($greenImagick, \Imagick::COMPOSITE_PLUS, 0, 0);

        $redImagick->compositeimage($blueImagick, \Imagick::COMPOSITE_PLUS, 0, 0);

        $redImagick->setImageFormat('png');
        header("Content-Type: image/png");
        echo $redImagick->getImageBlob();
    }



    function Minus() {


        $rgbImagick = new \Imagick(realpath("../images/rgbDisc.png"));
        $redImagick = new \Imagick(realpath("../images/redDiscAlpha.png"));


        $rgbImagick->compositeimage($redImagick, \Imagick::COMPOSITE_MINUS, 0, 0);

        $rgbImagick->setImageFormat('png');
        header("Content-Type: image/png");
        echo $rgbImagick->getImageBlob();
    }


    /**
     * This is meant to be a simple alpha mask
     * @internal param $width
     * @internal param $height
     */
    function CopyOpacity() {
        $imagick = new \Imagick(realpath("../images/gradientDown.png"));
        $imagick2 = new \Imagick(realpath("../images/whiteDisc.png"));

        $imagick->compositeimage($imagick2, \Imagick::COMPOSITE_COPYOPACITY, 0, 0);

        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }




    /**
     * This is meant to be a simple alpha mask
     * @internal param $width
     * @internal param $height
     */
    function CopyOpacity2() {
        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        //This is vital - the image must have an alpha channel.
        $imagick->setImageFormat('png');
        $imagick->cropImage(500, 500, 0, 0);
        $imagick2 = new \Imagick(realpath("../images/whiteDisc.png"));

        $imagick->compositeimage($imagick2, \Imagick::COMPOSITE_COPYOPACITY, 0, 0);

        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }

//    $imagick->setImageAlphaChannel(\\Imagick::ALPHACHANNEL_ACTIVATE);
//    $imagick->setImageAlphaChannel(\\Imagick::ALPHACHANNEL_SET);
//


//
//
//
//$compositeModes = [
//
//\\Imagick::COMPOSITE_NO,
//\Imagick::COMPOSITE_ADD,
//\Imagick::COMPOSITE_ATOP,
//\Imagick::COMPOSITE_BLEND,
//\Imagick::COMPOSITE_BUMPMAP,
//\Imagick::COMPOSITE_CLEAR,
//\Imagick::COMPOSITE_COLORBURN,
//\Imagick::COMPOSITE_COLORDODGE,
//\Imagick::COMPOSITE_COLORIZE,
//\Imagick::COMPOSITE_COPYBLACK,
//\Imagick::COMPOSITE_COPYBLUE,
//\Imagick::COMPOSITE_COPY,
//\Imagick::COMPOSITE_COPYCYAN,
//\Imagick::COMPOSITE_COPYGREEN,
//\Imagick::COMPOSITE_COPYMAGENTA,
//\Imagick::COMPOSITE_COPYOPACITY,
//\Imagick::COMPOSITE_COPYRED,
//\Imagick::COMPOSITE_COPYYELLOW,
//\Imagick::COMPOSITE_DARKEN,
//\Imagick::COMPOSITE_DSTATOP,
//\Imagick::COMPOSITE_DST,
//\Imagick::COMPOSITE_DSTIN,
//\Imagick::COMPOSITE_DSTOUT,
//\Imagick::COMPOSITE_DSTOVER,
//\Imagick::COMPOSITE_DIFFERENCE,
//\Imagick::COMPOSITE_DISPLACE,
//\Imagick::COMPOSITE_DISSOLVE,
//\Imagick::COMPOSITE_EXCLUSION,
//\Imagick::COMPOSITE_HARDLIGHT,
//\Imagick::COMPOSITE_HUE,
//\Imagick::COMPOSITE_IN,
//\Imagick::COMPOSITE_LIGHTEN,
//\Imagick::COMPOSITE_LUMINIZE,
//\Imagick::COMPOSITE_MINUS,
//\Imagick::COMPOSITE_MODULATE,
//\Imagick::COMPOSITE_MULTIPLY,
//\Imagick::COMPOSITE_OUT,
//\Imagick::COMPOSITE_OVER,
//\Imagick::COMPOSITE_OVERLAY,
//\Imagick::COMPOSITE_PLUS,
//\Imagick::COMPOSITE_REPLACE,
//\Imagick::COMPOSITE_SATURATE,

//\Imagick::COMPOSITE_SOFTLIGHT,
//\Imagick::COMPOSITE_SRCATOP,
//\Imagick::COMPOSITE_SRC,
//\Imagick::COMPOSITE_SRCIN,
//\Imagick::COMPOSITE_SRCOUT,
//\Imagick::COMPOSITE_SRCOVER,
//\Imagick::COMPOSITE_SUBTRACT,
//\Imagick::COMPOSITE_THRESHOLD,
//\Imagick::COMPOSITE_XOR,

}