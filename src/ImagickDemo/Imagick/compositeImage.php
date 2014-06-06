<?php

namespace ImagickDemo\Imagick;


class compositeImage extends \ImagickDemo\Example {

    function render() {

        $tutorialURL = '/Example/composite';
        
        $output = '';
        $output .= "This is a simple example. Please look at the <a href='$tutorialURL'>full composite tutorial</a> for more examples.<br/>";
        
        $output .= $this->renderImageURL();
        
        return $output;
    }
}