<?php

namespace ImagickDemo\Imagick;


class roundCorners extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->setBackgroundColor('red');

        
        $x_rounding = 40;
        $y_rounding = 40;
        $stroke_width = 5;
        $displace = 0;
        $size_correction = 0;

        $imagick->roundCornersImage(
            $x_rounding,
            $y_rounding,
            $stroke_width,
            $displace,
            $size_correction
        );
        
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}