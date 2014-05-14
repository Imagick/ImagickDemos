<?php

namespace ImagickDemo\Imagick;


class compositeImage extends ImagickExample {

    function renderDescription() {
        return "";
    }

    function renderImage1() {

        $img1 = new \Imagick();
        $img1->readImage(realpath("../images/Biter_500.jpg"));

        $img2 = new \Imagick();
        $img2->setOption('compose:args', '50');
        $img2->readImage(realpath("../images/Skyline_400.jpg"));

        $img1->resizeimage(
             $img2->getImageWidth(),
             $img2->getImageHeight(),
             \Imagick::FILTER_LANCZOS,
             1
        );

        $img1->compositeImage($img2, \Imagick::COMPOSITE_DISSOLVE, 0, 0);
        //$img1->writeImage("images/3.jpg");
        header("Content-Type: image/jpg");
        echo $img1->getImageBlob();
    }

    function renderImage() {

        $img1 = new \Imagick();
        $img1->readImage(realpath("../images/Biter_500.jpg"));

        $img2 = new \Imagick();
        $img2->readImage(realpath("../images/Skyline_400.jpg"));

        $img1->resizeimage(
             $img2->getImageWidth(), 
             $img2->getImageHeight(),
             \Imagick::FILTER_LANCZOS, 
             1
        );

        $opacity = new \Imagick();

        $opacity->newPseudoImage($img1->getImageHeight(), $img1->getImageWidth(), "gradient:gray(10%)-gray(90%)");
        $opacity->rotateimage('black', 90);
        
        $img2->compositeImage($opacity, \Imagick::COMPOSITE_COPYOPACITY, 0, 0);
        $img1->compositeImage($img2, \Imagick::COMPOSITE_ATOP, 0, 0);

        header("Content-Type: image/jpg");
        echo $img1->getImageBlob();
    }

}