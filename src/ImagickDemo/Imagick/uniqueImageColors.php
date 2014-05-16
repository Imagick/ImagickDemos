<?php

namespace ImagickDemo\Imagick;


class uniqueImageColors extends ImagickExample {

    function renderDescription() {
        return "Extracts all the unique colors from an image, and generates and 1 pixel high, and 1 pixel wide for each color.";
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->getControl()->getImagePath()));
        //Reduce the image to 256 colours nicely.
        $imagick->quantizeImage(256, \Imagick::COLORSPACE_YIQ, 0, false, false);
        $imagick->uniqueImageColors();
        $imagick->scaleimage($imagick->getImageWidth(), $imagick->getImageHeight() * 20);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
}