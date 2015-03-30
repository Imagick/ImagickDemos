<?php

namespace ImagickDemo\Imagick;


class floodFillPaintImage extends \ImagickDemo\Example {

    function getOriginalImage() {
        return $this->control->getURL().'&original=true';
    }

    function renderOriginalImage() {
        return \ImagickDemo\Imagick\renderFile(realpath("images/BlueScreen.jpg"));
    }

    function render() {
        return $this->renderImageURL();
    }
}