<?php

namespace ImagickDemo\Imagick;


class floodFillPaintImage extends ImagickExample {

    function renderDescription() {
        
        return '';
    }

    function renderImage() {
        try {
            $imagick = new \Imagick(realpath("../images/DatCat-shutterStock.jpg"));
            $imagick->floodFillPaintImage(
                'white',    
                0.3 * \Imagick::getQuantum(),
                "#00ff00",
                20, 20,
                false
            );
            //$imagick->trimImage(0.07 * \Imagick::getQuantum());

            header("Content-Type: image/jpg");
            echo $imagick->getImageBlob();
        }
        catch(\Exception $e) {
            echo "asdsd ".$e->getMessage();
        }
    }
}