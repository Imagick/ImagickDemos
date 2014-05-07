<?php


namespace ImagickDemo\Example;

class pseudoBorked extends \ImagickDemo\ExampleWithoutControl {

    function renderTitle() {
        return "";
    }

    function renderDescription() {

    }
    
    function renderImage2() {

        $image = new \Imagick();

        $image->newPseudoImage(200, 200, "gradient:red-blue");

        $image->setImageFormat("png");

        header("Content-Type: image/png");
        echo $image;
    }

    function renderImage() {


            $im = new \Imagick(realpath('../images/TestImage.jpg'));

            $reflection = clone $im;
            $reflection->flipImage();
            $reflection->cropImage($im->getImageWidth(), $im->getImageHeight() * 0.75, 0, 0);

            $gradient = new \Imagick();


            $gradient->newPseudoImage($reflection->getImageWidth(), $reflection->getImageHeight(), 'gradient:rgba(0, 0, 0, 0.2)-black');

            $gradient->setImageOpacity(0.5);
//$gradient->setImageFormat("png");

            $reflection->compositeImage($gradient, \Imagick::COMPOSITE_ATOP, 0, 0);

//$reflection->compositeImage($gradient, \Imagick::COMPOSITE_DEFAULT, 0, 0);
//$reflection->compositeImage($gradient, \Imagick::COMPOSITE_COPYOPACITY, 0, 0);


//$reflection->setImageOpacity(0.5);

//$canvas = new \Imagick();
//$canvas->newImage($im->getImageWidth(), $im->getImageHeight() * 1.75, new \ImagickPixel('black'));
//$canvas->setImageFormat('jpg');
//$canvas->compositeImage($im, \Imagick::COMPOSITE_OVER, 0, 0);
//$canvas->compositeImage($reflection, \Imagick::COMPOSITE_OVER, 0, $im->getImageHeight());
//$canvas->setImageCompression(\Imagick::COMPRESSION_JPEG);
//$canvas->setImageCompressionQuality(70);
//$canvas->stripImage();

            $gradient->writeimage("/home/intahwebz/intahwebz/testgradeient.jpg");

            //echo "done";

            //header('Content-Type: image/jpg');
//echo $canvas;

            $string = $gradient->getimageblob();

            $gradient->writeimage("/home/intahwebz/intahwebz/testout.jpg");

            echo "blob length is: " . strlen($string);

            echo $string;

    }
}