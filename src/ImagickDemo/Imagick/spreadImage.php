<?php
namespace ImagickDemo\Imagick;


class spreadImage extends \ImagickDemo\Example {

    use OriginalImageFile;

    function render() {
        return $this->renderImageURL();
    } 
}