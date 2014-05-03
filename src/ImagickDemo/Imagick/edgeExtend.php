<?php


namespace ImagickDemo\Imagick;


class edgeExtend extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/edgeExtend'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_EDGE);

        $desiredWidth = 1000;
        //$desiredHeight = 1500;

        $originalWidth = $imagick->getImageWidth();

//Make the image be the desired width.
        $imagick->sampleimage($desiredWidth, $imagick->getImageHeight());

//Now scale, rotate, translate (aka affine project) it
//to be how you want
        $points = array(//The x scaling factor is 0.5 when the desired width is double
            //the source width
            ($originalWidth / $desiredWidth), 0, //Don't scale vertically
            0, 1, //Offset the image so that it's in the centre
            ($desiredWidth - $originalWidth) / 2, 0);

        $imagick->distortImage(\Imagick::DISTORTION_AFFINEPROJECTION, $points, false);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

//Fyi it may be easier to think of the affine transform by 
//how it works for a rotation:
//$affineRotate = array(
//    "sx" => cos($angle),
//    "sy" => cos($angle),
//    "rx" => sin($angle),
//    "ry" => -sin($angle),
//    "tx" => 0,
//    "ty" => 0,
//);
    }

    function renderImage2() {

        $image = new \Imagick();
        $image->newImage(800, 800, new \ImagickPixel('red'));
        $image->setImageFormat("png");
        $type = $image->getFormat();
        header("Content-type: $type");

        $texture = new \Imagick(realpath($this->imagePath));
        $texture->scaleimage($texture->getimagewidth() / 4, $texture->getimageheight() / 4);

        $image->setimagevirtualpixelmethod(\Imagick::VIRTUALPIXELMETHOD_EDGE);
        $image = $image->textureImage($texture);

        echo $image;


// Perform the distortion 


//$imagick->cropImage ($imagick->getImageWidth() + 500 , $imagick->getImageHeight() /2, -100, 0);


        header("Content-Type: image/jpg");
        echo $image->getImageBlob();

    }
}