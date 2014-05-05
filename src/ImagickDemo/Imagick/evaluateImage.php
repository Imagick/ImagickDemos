<?php

namespace ImagickDemo\Imagick;


class evaluateImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick();
        $imagick->newimage(400, 400, "white");
        $imagick->evaluateimage(\Imagick::EVALUATE_COSINE, "4,-90");
        $imagick->setimageformat('png');
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
}