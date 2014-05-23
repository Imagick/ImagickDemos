<?php

namespace ImagickDemo\Imagick;


class compositeImage extends  \ImagickDemo\Example {

    function render() {
        return $this->renderImageURL();
    }

//    function renderImage1() {
//
//        $img1 = new \Imagick();
//        $img1->readImage(realpath("../images/Biter_500.jpg"));
//
//        $img2 = new \Imagick();
//        $img2->setOption('compose:args', '50');
//        $img2->readImage(realpath("../images/Skyline_400.jpg"));
//
//        $img1->resizeimage(
//             $img2->getImageWidth(),
//             $img2->getImageHeight(),
//             \Imagick::FILTER_LANCZOS,
//             1
//        );
//
//        $img1->compositeImage($img2, \Imagick::COMPOSITE_DISSOLVE, 0, 0);
//        //$img1->writeImage("images/3.jpg");
//        header("Content-Type: image/jpg");
//        echo $img1->getImageBlob();
//    }



}