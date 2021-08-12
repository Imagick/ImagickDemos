<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

// TODO - migrate to custom control
class fxImage extends \ImagickDemo\Example
{
    public function renderDescription()
    {
        $text = <<< END

The fxImage function allows you to define almost any possible image manipulation by defining the operation to perform as a string composed of a large selection of variables.

For the list of possible variables please see the <a href='http://www.imagemagick.org/script/fx.php#anatomy'>FX reference sheet</a>. For a list of examples and another description of how it can be used please see the <a href='http://www.imagemagick.org/Usage/transform/#fx'>ImageMagick Examples page</a>.

And yes, it is very, very slow. You should only use it if you need an image generating that can't be generated any other way, or if you wish to generate a 
END;

        return nl2br($text);
    }

    public function render()
    {
        return $this->renderImageURL();
    }

    public function renderImage2()
    {
        $imagick = new \Imagick();
        $imagick->newPseudoImage(200, 200, "xc:white");

        $fx = 'xx=i-w/2; yy=j-h/2; rr=hypot(xx,yy); (.5-rr/140)*1.2+.5';
        $fxImage = $imagick->fxImage($fx);

        header("Content-Type: image/png");
        $fxImage->setimageformat('png');
        echo $fxImage->getImageBlob();
    }


    //This is actually an example for FX image
    public function example2()
    {
        $graph = new \Imagick();
        $graph->newPseudoImage(256, 256, "xc:pink");

        $imagick = new \Imagick();
        $imagick->newPseudoImage(256, 256, 'gradient:black-white');
        $arguments = array(9, -90);
        $imagick->functionImage(\Imagick::FUNCTION_SINUSOID, $arguments);

        $graph->addImage($imagick);
        $fx = 'colorInt=int(256 * v.p{0,j}.lightness); pos=int(i); (int(pos) >= colorInt && int(pos) <= colorInt)';
        $fxImage = $graph->fxImage($fx);

//        fxAnalyzeImage($imagick);

        header("Content-Type: image/png");
        $fxImage->setimageformat('png');
        echo $fxImage->getImageBlob();

    }

    public function renderImage3()
    {
        $gradient = new \Imagick();
        $gradient->newPseudoImage(1, 256, "gradient:white-black");
        $newImage = $gradient->fxImage("floor(u*10+0.5)/10");
        $newImage->setimageformat('jpg');
        header("Content-Type: image/jpg");
        echo $newImage;
    }


    public function hasReactControls(): bool
    {
        return true;
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
