<?php

namespace ImagickDemo\Imagick;


class setImageAlphaChannel extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/setImageAlphaChannel'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        $imagick2->setImageAlphaChannel(\Imagick::ALPHACHANNEL_DEACTIVATE);


    }

}