<?php

namespace ImagickDemo\Imagick;


class deskewImage extends ImagickExample {


    function renderDescription() {        
        return "Hint - look at the left edge of the left column. In the deskewed image it is vertical.";
    }

    function renderImage() {

        $imagick = new \Imagick(realpath("../images/NYTimes-Page1-11-11-1918.jpg"));

        $deskewImagick = clone $imagick;

        $deskewImagick->deskewImage(5);

        $trim = 9;

        $deskewImagick->cropImage($deskewImagick->getImageWidth() - $trim, $deskewImagick->getImageHeight(), $trim, 0);

        $imagick->cropImage($imagick->getImageWidth() - $trim, $imagick->getImageHeight(), $trim, 0);

        $deskewImagick->resizeimage($deskewImagick->getImageWidth() / 2, $deskewImagick->getImageHeight() / 2, \Imagick::FILTER_LANCZOS, 1);

        $imagick->resizeimage($imagick->getImageWidth() / 2, $imagick->getImageHeight() / 2, \Imagick::FILTER_LANCZOS, 1);

        $newCanvas = new \Imagick();
        $newCanvas->newimage($imagick->getImageWidth() + $deskewImagick->getImageWidth() + 20, $imagick->getImageHeight(), 'red', 'jpg');

        $newCanvas->compositeimage($imagick, \Imagick::COMPOSITE_COPY, 5, 0);
        $newCanvas->compositeimage($deskewImagick, \Imagick::COMPOSITE_COPY, $imagick->getImageWidth() + 10, 0);

        header("Content-Type: image/jpg");
        echo $newCanvas->getImageBlob();
    }

}