<?php


namespace ImagickDemo\Imagick;


class textureImage extends ImagickExample {

    function renderDescription() {
        return "";
    }

    function renderImage() {
        $image = new \Imagick();
        $image->newImage(640, 480, new \ImagickPixel('pink'));
        $image->setImageFormat("jpg");
        $texture = new \Imagick(realpath($this->imagePath));
        $texture->scaleimage($image->getimagewidth() / 4, $image->getimageheight() / 4);
        $image = $image->textureImage($texture);
        header("Content-Type: image/jpg");
        echo $image;
    }
}