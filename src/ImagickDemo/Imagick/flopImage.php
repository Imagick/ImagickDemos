<?php

namespace ImagickDemo\Imagick;


class flopImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {

        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->flopImage();

//header("Content-Type: image/jpg");
//echo $imagick->getImageBlob();


//$imagick->setImageDepth(32);
//MagickSetImageFormat($origImgMedia, 'PNG24');

//$imagick->setImageFormat('PNG24');


//png:color-type=

//png:format=value
//valid values are png8, png24, png32, png48, png64, and png00.

        $imagick->setOption('png:bit-depth', '8');
        $imagick->setOption('png:color-type', 6);


#define PNG_COLOR_TYPE_GRAY         0
#define PNG_COLOR_TYPE_RGB          2
#define PNG_COLOR_TYPE_PALETTE      3
#define PNG_COLOR_TYPE_GRAY_ALPHA   4
#define PNG_COLOR_TYPE_RGB_ALPHA    6

//const IMGTYPE_BILEVEL = 1;
//const IMGTYPE_GRAYSCALE = 2;
//const IMGTYPE_GRAYSCALEMATTE = 3;
//const IMGTYPE_PALETTE = 4;
//const IMGTYPE_PALETTEMATTE = 5;
//const IMGTYPE_TRUECOLOR = 6;
//const IMGTYPE_TRUECOLORMATTE = 7;


//=value
//=value


//$imagick->setOption('png:format', 'png64');
//$imagick->setOption('png:format', 'png00');

//png8, png24, png32, png48, png64, and png00.


//$imagick->writeImage("../images/Flop.png");
//echo $imagick->getImageType();

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }
}