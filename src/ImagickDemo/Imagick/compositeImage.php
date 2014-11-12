<?php

namespace ImagickDemo\Imagick;


class compositeImage extends \ImagickDemo\Example {

    function renderDescription() {
        $tutorialURL = '/Tutorial/composite';

        $output = '';
        $output .= "This is a simple example. Please look at the <a href='$tutorialURL'>full composite tutorial</a> for more examples.<br/>";

        return $output;
    }


    function render() {
        return $this->renderImageURL();
    }
}