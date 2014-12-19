<?php


namespace ImagickDemo\Tutorial;


use Imagick;


class gradientGeneration extends \ImagickDemo\Example {

//    private $customImageBaseURL;
//    
//    function __construct($customImageBaseURL) {
//        $this->customImageBaseURL = $customImageBaseURL;
//    }

//    function getCustomImageParams() {
//        return [];//$this->control->getParams();
//    }


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
        $output .= $this->renderCustomImageURL([]);

        return $output;
    }

    /**
     * 
     */
    function renderCustomImage() {
        $imagick = new \Imagick();
        $imagick->setcolorspace(\Imagick::COLORSPACE_GRAY);
        $imagick->newPseudoImage(10, 256, 'gradient:black-white');
        $imagick->evaluateimage(\Imagick::EVALUATE_POW, 0.5);
        analyzeImage($imagick);
    }


    /**
     * 
     */
    function renderCustomImage123() {
        $imagick = new \Imagick();
        $imagick->newPseudoImage(10, 256, 'gradient:black-white');
        $imagick->evaluateimage(\Imagick::EVALUATE_SINE, 0.5);
        $imagick->normalizeImage();
        $imagick->evaluateimage(\Imagick::EVALUATE_COSINE, 8);
        analyzeImage($imagick);
    }
    
//    function renderCustomImageURL() {
//
//        $vars = '';
//
//        $this->renderCustomImageURL()
//
//        return sprintf(
//            "<img src='%s?%s' />",
//            $this->customImageBaseURL,
//            $vars
//        );
//    }
}

 