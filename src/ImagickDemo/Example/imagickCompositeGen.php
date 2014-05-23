<?php

namespace ImagickDemo\Example;




class imagickCompositeGen extends \ImagickDemo\Example {

    function renderTitle() {
        return "";
    }

    function render() {
        $output = "Composite a set of images into a row with a smooth transition between each image.";
        $output .= "<br/>";
        $output .= $this->renderImageURL();
        
        return $output;
    }


}