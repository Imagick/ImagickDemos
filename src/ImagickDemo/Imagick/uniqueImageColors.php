<?php

namespace ImagickDemo\Imagick;


class uniqueImageColors extends ImagickExample {

    function renderDescription() {
        return "Extracts all the unique colors from an image, and generates and 1 pixel high, and 1 pixel wide for each color.";
    }

    function renderImage() {
        $imagick = new \Imagick(realpath("../images/coolGif.gif"));
        $imagick->uniqueImageColors();
        $imagick->scaleimage($imagick->getImageWidth() * 4, $imagick->getImageHeight() * 4);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
}