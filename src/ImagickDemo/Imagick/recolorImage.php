<?php


namespace ImagickDemo\Imagick;


class recolorImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/recolorImage'/>";
    }

    function renderDescription() {
    }

    function renderImage() {

        $imagick = new \Imagick(realpath($this->imagePath));

        $remapColor = [ 1, 0, 0, 
                        0, 0, 1, 
                        0, 1, 0,];

//$remapColor = [
//    1.438, -0.122, -0.016,  0, 0, -0.03,
//    -0.062,  1.378, -0.016,  0, 0,  0.05,
//    -0.062, -0.122, 1.483,   0, 0, -0.02,
//];

        @$imagick->recolorImage($remapColor);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}