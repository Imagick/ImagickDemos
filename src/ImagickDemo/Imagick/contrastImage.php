<?php

namespace ImagickDemo\Imagick;


class contrastImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/contrastImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));

        try {

            $imagick2 = clone($imagick);
            $imagick3 = clone($imagick);

            $imagick2->contrastImage(false);
            $imagick3->contrastImage(true);

            $imagick2->cropImage($imagick2->getImageWidth() / 3, $imagick2->getimageheight(), 0, 0);

            $offsetX = 2 * $imagick3->getImageWidth() / 3;
            $imagick3->cropImage($imagick3->getImageWidth() / 3, $imagick3->getimageheight(), $offsetX, 0);

            $imagick->compositeImage($imagick2, \Imagick::COMPOSITE_ATOP, 0, 0);
            $imagick->compositeImage($imagick3, \Imagick::COMPOSITE_ATOP, $offsetX, 0);


            header("Content-Type: image/jpg");
            echo $imagick->getImageBlob();

        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
}