<?php


namespace ImagickDemo\Example;

class gradientReflection extends \ImagickDemo\ExampleWithoutControl {

    function renderTitle() {
        return "";
    }

    function renderDescription() {

    }

    function renderImageCorrect() {
        
        $im = new \Imagick(realpath('../images/sample.png'));
        
        $gradient = new \Imagick();
        $gradient->newPseudoImage($im->getImageWidth(), $im->getImageHeight(), 'gradient:rgba(255, 255, 255, 0.8)-rgba(255, 255, 255, 0.5)');

        //$im->compositeImage($gradient, \Imagick::COMPOSITE_BLEND, 0, 0);

        $im->compositeimage(
           $gradient,
           //\Imagick::COMPOSITE_COPYOPACITY,
           \Imagick::COMPOSITE_DSTOUT,
           0,
           0
        );
        

        //TODO - this line produces an dark line across the image.
        //$im->setImageOpacity(0.45);
        header('Content-Type: image/jpg');
        echo $im;
    }

    function renderImage() {

        $im = new \Imagick(realpath('../images/sample.png'));
      

        $reflection = clone $im;
        //$reflection->setimagevirtualpixelmethod( \Imagick::VIRTUALPIXELMETHOD_EDGE);
        $reflection->flipImage();
        
        $reflection->cropImage($im->getImageWidth(), $im->getImageHeight() * 0.75, 0, 0);

        $gradient = new \Imagick();
        $gradient->newPseudoImage(
             $reflection->getImageWidth(), 
             $reflection->getImageHeight(), 
                 //Putting spaces in the rgba string is bad
             'gradient:rgba(255,0,255,0.6)-rgba(255,255,0,0.99)'
        );

        $reflection->compositeimage(
          $gradient,
          \Imagick::COMPOSITE_DSTOUT,
          0, 0
        );
        
        $canvas = new \Imagick();

        $canvas->newImage($im->getImageWidth(), $im->getImageHeight() * 1.75, new \ImagickPixel('rgba(255, 255, 255, 0)'));

        $canvas->compositeImage($im, \Imagick::COMPOSITE_BLEND, 0, 0);
        $canvas->setImageFormat('png');
        $canvas->compositeImage($reflection, \Imagick::COMPOSITE_BLEND, 0, $im->getImageHeight());

        $canvas->stripImage();
        $canvas->setImageFormat('png');
        header('Content-Type: image/png');
        echo $canvas;

    }
}