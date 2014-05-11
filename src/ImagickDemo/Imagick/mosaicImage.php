<?php

namespace ImagickDemo\Imagick;


class mosaicImage extends \ImagickDemo\ExampleWithoutControl {

    function renderDescription() {
//        Inlays an image sequence to form a single coherent picture. It returns a wand with each image in the sequence composited at the location defined by the page offset of the image.
    }

    function renderImage() {
        $imagick = new \Imagick();
        $imagick->newimage(500, 500, 'white');

        $imagick->setimageformat('png');
        
        $images = [
            "../images/dickbutt.jpg"
        ];

        foreach ($images as $image) {
            $nextImage = new \Imagick(realpath($image));
            $nextImage->setPage(100, 100, 50, 50);
            $imagick->addImage($nextImage);
        }

        @$imagick->mosaicimages();

        //header("Content-Type: image/jpg");
        $blah = $imagick->getImageBlob();
        
        echo "bytes = ".strlen($blah);
    }
}