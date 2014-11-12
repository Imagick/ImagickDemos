<?php

namespace ImagickDemo\Tutorial;




class imagickCompositeGen extends \ImagickDemo\Example {

    function renderTitle() {
        return "";
    }

    function renderDescription() {
        $output = <<< END
This is a more complicated example of how to cross fade a row of images with smooth transitions between each image.

It creates the gradients for blending as required, which allows the transition between the images to be controlled.

END;

        return nl2br($output);
    }


    function render() {
        return $this->renderImageURL();
    }
}