<?php

namespace ImagickDemo\Imagick;


class evaluateImage extends \ImagickDemo\Example {

    function render() {

        $output = $this->renderImageURL();
        
        $output .= ' 
        
	EVALUATE_ADD 
	EVALUATE_AND 
	EVALUATE_DIVIDE 
	EVALUATE_LEFTSHIFT
	EVALUATE_MAX - pick max of image and value
	EVALUATE_MIN - pick min of image and value
	EVALUATE_MULTIPLY !Q
	EVALUATE_OR 
	EVALUATE_RIGHTSHIFT !Q 
	EVALUATE_SET 
	EVALUATE_SUBTRACT 
	EVALUATE_XOR 
	EVALUATE_POW 
	EVALUATE_LOG 
	EVALUATE_THRESHOLD 
	EVALUATE_THRESHOLDBLACK 
	EVALUATE_THRESHOLDWHITE 
	EVALUATE_GAUSSIANNOISE 
	EVALUATE_IMPULSENOISE 
	EVALUATE_LAPLACIANNOISE 
	EVALUATE_MULTIPLICATIVENOISE 
	EVALUATE_POISSONNOISE 
	EVALUATE_UNIFORMNOISE 
	EVALUATE_COSINE 
	EVALUATE_SINE 
	EVALUATE_ADDMODULUS - x = (x + value) % 1
        
        ';

        $output = nl2br($output);
        
        
        
        return $output;
    }
}