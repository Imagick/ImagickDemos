<?php

namespace ImagickDemo\Imagick;


class trimImage extends ImagickExample {

    function renderDescription() {
        
        return 'Two things should be noted from the above. First is like "-crop", "-trim" will retain the canvas size of the image. This means that the numerical arguments of the trim can be extracted, to allow for further processing, or adjustment of the of the image processing (see Trimming "Noisy" Images for an example of doing this).';
    }

    function renderImage() {
        try {
            $imagick = new \Imagick(realpath("../images/DatCat-shutterStock.jpg"));
            $imagick->borderImage("#00ff00", 10, 10);
            $imagick->trimImage(0.07 * \Imagick::getQuantum());

            header("Content-Type: image/jpg");
            echo $imagick->getImageBlob();
        }
        catch(\Exception $e) {
            echo "asdsd ".$e->getMessage();
        }
    }
}