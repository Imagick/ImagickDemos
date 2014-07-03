<?php


namespace ImagickDemo\Tutorial;


use Imagick;


class gradientGeneration extends \ImagickDemo\Example {

    private $customImageBaseURL;
    
    function __construct($customImageBaseURL) {
        $this->customImageBaseURL = $customImageBaseURL;
    }



    function getCustomImageParams() {
        return [];//$this->control->getParams();
    }


//
//    EVALUATE_UNDEFINED
//    EVALUATE_ADD
//    EVALUATE_AND
//    EVALUATE_DIVIDE
//    EVALUATE_LEFTSHIFT
//    EVALUATE_MAX
//    EVALUATE_MIN
//    EVALUATE_MULTIPLY
//    EVALUATE_OR
//    EVALUATE_RIGHTSHIFT
//    EVALUATE_SET
//    EVALUATE_SUBTRACT
//    EVALUATE_XOR 
//    EVALUATE_POW 
//    EVALUATE_LOG 
//    EVALUATE_THRESHOLD 
//    EVALUATE_THRESHOLDBLACK 
//    EVALUATE_THRESHOLDWHITE 
//    EVALUATE_GAUSSIANNOISE 
//    EVALUATE_IMPULSENOISE 
//    EVALUATE_LAPLACIANNOISE 
//    EVALUATE_MULTIPLICATIVENOISE
//    EVALUATE_POISSONNOISE
//    EVALUATE_UNIFORMNOISE
//    EVALUATE_COSINE
//    EVALUATE_SINE 
//    EVALUATE_ADDMODULUS 
//    
//  FUNCTION_POLYNOMIAL
//	FUNCTION_SINUSOID
//	FUNCTION_ARCSIN
//	FUNCTION_ARCTAN
    
    
    function renderDescription() {
//http://www.imagemagick.org/Usage/transform/
        
//        For example, this curve will modify the gradient in an image to produce very sharp threshold around the input gray level of 0.7, but with the values changing between the range limits of 0.5 and 1.0
//
//  convert gradient.png -function Arctan 15,0.7,0.5,0.75 func_arctan_typ.png
//        
        return '';
    }

    function render() {
        $output = $this->renderDescription();
        $output .= $this->renderCustomImageURL();

        return $output;
    }

    function renderCustomImage() {
        $imagick = new \Imagick();
        $imagick->setcolorspace(\Imagick::COLORSPACE_GRAY);
        $imagick->newPseudoImage(10, 256, 'gradient:black-white');

        //$imagick->newPseudoImage(10, 256, 'xc:white');
        

//        $arguments = array(4, -90);
//        $imagick->functionImage(\Imagick::FUNCTION_SINUSOID, $arguments);
//        $imagick->normalizeImage();
        //$imagick->evaluateimage(\Imagick::EVALUATE_SINE, 0.5);
        //$imagick->evaluateimage(\Imagick::EVALUATE_GAUSSIANNOISE, 0.7);
        //$imagick->evaluateimage(\Imagick::EVALUATE_IMPULSENOISE, 0.4);
        //const EVALUATE_LAPLACIANNOISE = 20;
        //$imagick->evaluateimage(\Imagick::EVALUATE_MULTIPLICATIVENOISE, 0.7);

        $imagick->evaluateimage(\Imagick::EVALUATE_POW, 0.5);

        //

//        const EVALUATE_POISSONNOISE = 22;
//        const EVALUATE_UNIFORMNOISE = 23; 
        
        //$imagick->normalizeImage();
        //$imagick->evaluateimage(\Imagick::EVALUATE_MAX, 0.5);
        
        \ImagickDemo\analyzeImage($imagick);
    }



    function renderCustomImage123() {
        $imagick = new \Imagick();
        $imagick->newPseudoImage(10, 256, 'gradient:black-white');
        $imagick->evaluateimage(\Imagick::EVALUATE_SINE, 0.5);
        $imagick->normalizeImage();
        $imagick->evaluateimage(\Imagick::EVALUATE_COSINE, 8);

        \ImagickDemo\analyzeImage($imagick);
    }
    
    function renderCustomImageasd() {
        $imagick1 = new \Imagick();
        $imagick1->newPseudoImage(10, 256, 'gradient:black-white');
        $arguments = array(4, -90);
        $imagick1->functionImage(\Imagick::FUNCTION_SINUSOID, $arguments);

        analyzeImage($imagick1);
    }

    function renderCustomImageasdsd() {
        $imagick = new \Imagick();
        $imagick->newPseudoImage(10, 256, 'gradient:black-white');
        //$imagick->evaluateimage(\Imagick::EVALUATE_SINE, [0.5, -90]);

        $arguments = array(0.5, -90);
        $imagick->functionImage(\Imagick::FUNCTION_SINUSOID, $arguments);
        
        analyzeImage($imagick);
    }

    function renderCustomImageBlah() {
        $imagick = new \Imagick();
        $imagick->newPseudoImage(10, 256, "gradient:white-black");
        $fx = "(1.0/(1.0+exp(10.0*(0.5-u)))-0.006693)*1.0092503";
        $fxImage = $imagick->fxImage($fx);
        //header("Content-Type: image/jpg");
//        $fxImage->setimageformat('jpg');
//        echo $fxImage->getImageBlob();

        analyzeImage($fxImage);
        
    }

    function renderCustomImageURL() {
        
        $vars = '';
        
        return sprintf(
            "<img src='%s?%s' />",
            $this->customImageBaseURL,
            $vars
        );
    }
}

 