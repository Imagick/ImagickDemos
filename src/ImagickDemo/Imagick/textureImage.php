<?php


namespace ImagickDemo\Imagick;


class textureImage extends ImagickExample {

    function renderDescription() {
        //TOOD - make it work
        return "This is bot working correctly";
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick2 = new \Imagick(realpath("../images/Skyline_400.jpg"));
        $imagick->textureimage($imagick2);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}