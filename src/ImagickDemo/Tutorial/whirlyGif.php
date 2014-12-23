<?php


namespace ImagickDemo\Tutorial;


class whirlyGif extends \ImagickDemo\Example {

    function renderDescription() {
        $output = "Number of dots % (Phase divider + 1) = 0<br/>";

        return $output;
    }
    
    function render() {
        return $this->renderImageURL();
    }

}