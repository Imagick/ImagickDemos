<?php

namespace ImagickDemo\Example;

class evaluateImage extends \ImagickDemo\Example {

    function render() {
        return "";
    }

    function renderDescription() {

    }

    function renderImage() {


//$imagick = new \Imagick();
//$imagick->newPseudoImage(400, 400, 'gradient:black-white');

        $size = 200;

        $quanta = pow(2, 16);

        /*
            const EVALUATE_ADD = 1;
            const EVALUATE_AND = 2;
            const EVALUATE_DIVIDE = 3;
            const EVALUATE_LEFTSHIFT = 4;
            const EVALUATE_MAX = 5;
            const EVALUATE_MIN = 6;
            const EVALUATE_MULTIPLY = 7;
            const EVALUATE_OR = 8;
            const EVALUATE_RIGHTSHIFT = 9;
            const EVALUATE_SET = 10;
            const EVALUATE_SUBTRACT = 11;
            const EVALUATE_XOR = 12;
            const EVALUATE_POW = 13;
            const EVALUATE_LOG = 14;
            const EVALUATE_THRESHOLD = 15;
            const EVALUATE_THRESHOLDBLACK = 16;
            const EVALUATE_THRESHOLDWHITE = 17;
            const EVALUATE_GAUSSIANNOISE = 18;
            const EVALUATE_IMPULSENOISE = 19;
            const EVALUATE_LAPLACIANNOISE = 20;
            const EVALUATE_MULTIPLICATIVENOISE = 21;
            const EVALUATE_POISSONNOISE = 22;
            const EVALUATE_UNIFORMNOISE = 23;
            const EVALUATE_COSINE = 24;
            const EVALUATE_SINE = 25;
            const EVALUATE_ADDMODULUS = 26;
            
            */


//    if (false) {
        //convert -size 100x100 gradient: -function sinusoid 4,-90  gradient_bands.jpg
        $imagick1 = new \Imagick();
        $imagick1->newPseudoImage($size, $size, 'gradient:black-white');
        $arguments = array(4, -90);
        $imagick1->functionImage(\Imagick::FUNCTION_SINUSOID, $arguments);


//    $imagick2 = new \Imagick();
//    $imagick2->newPseudoImage($size, $size, 'gradient:black-white');

        $imagick1->evaluateimage(\Imagick::EVALUATE_MULTIPLY, 2);


        $imagick1->setimageformat('png');

        header("Content-Type: image/png");
        echo $imagick1->getImageBlob();
    }

}