<?php

namespace ImagickDemo\Imagick;


class transparentPaintImage  extends ImagickExample  {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath("../images/stock-photo-portrait-of-a-young-sexy-woman-with-shopping-bags-posing-against-a-removable-green-chroma-key-168933251.jpg"));
        
        $imagick->setimageformat('png');

        $imagick->transparentPaintImage(
            //TODO - shouldn't need quantum scaling.
            '#06ae37', 0, 0.04 * \Imagick::getQuantum(), false 
        );

        $imagick->transparentPaintImage(
        //TODO - shouldn't need quantum scaling.
            '#24b74f', 0, 0.04 * \Imagick::getQuantum(), false
        );
        
        $imagick->despeckleimage();

        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
}