<?php

namespace ImagickDemo\Imagick;


class transparentPaintImage  extends ImagickExample  {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->setimageformat('png');

        $imagick->transparentPaintImage(
            //TODO - shouldn't need quantum scaling.
            'orange', 0, 0.25 * \Imagick::getQuantum(), false 
        );

        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
}