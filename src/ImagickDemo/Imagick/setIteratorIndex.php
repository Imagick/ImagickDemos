<?php

namespace ImagickDemo\Imagick;

class setIteratorIndex extends \ImagickDemo\Example {

    function render() {
        $output = '';
        $output .= "Selecting first two layers:<br/>";
        $output .= $this->renderImageURL();
        $output .= '<br/>All layers in the image:<br/>';
        $output .= $this->renderCustomImageURL();

        return $output;
    }

    function renderCustomImageURL() {
        return sprintf(
            "<img src='%s' />",
            $this->control->getCustomImageURL()
        );
    }

    function renderCustomImage() {
        $imagick = new \Imagick(realpath("../images/LayerTest.psd"));
        $imagick->setImageFormat('png');
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
}