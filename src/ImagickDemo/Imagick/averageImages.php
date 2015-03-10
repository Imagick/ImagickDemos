<?php

namespace ImagickDemo\Imagick;


class averageImages  extends \ImagickDemo\Example  {

    function render() {
        return "Needs two images. Function is deprecated, and kills PHP. I suggest not using it.";
    }
    
    function foo() {
        $imagick = new \Imagick(\Imagick::LAYERMETHOD_MERGE);
        //$imagick->mergeImageLayers($layerMethodType);
    }
}