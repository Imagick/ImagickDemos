<?php

namespace ImagickDemo\Imagick;


class fxImage extends \ImagickDemo\Example {

    function render() {
        $text = <<< END

The fxImage function allows you to define almost any possible image manipulation by defining the operation to perform as a string composed of a large selection of variables.

For the list of possible variables please see the <a href='http://www.imagemagick.org/script/fx.php#anatomy'>FX reference sheet</a>. For a list of examples and another description of how it can be used please see the <a href='http://www.imagemagick.org/Usage/transform/#fx'>ImageMagick Examples page</a>.

And yes, it is very, very slow. You should only use it if you need an image generating that can't be generated any other way, or if you wish to generate a 
END;

        echo nl2br($text);
        
        return $this->renderImageURL();
    }

    function renderImage2() {
        $imagick = new \Imagick();
        $imagick->newPseudoImage(200, 200, "xc:white");

        $fx = 'xx=i-w/2; yy=j-h/2; rr=hypot(xx,yy); (.5-rr/140)*1.2+.5';
        $fxImage = $imagick->fxImage($fx);

        header("Content-Type: image/png");
        $fxImage->setimageformat('png');
        echo $fxImage->getImageBlob();
    }



    //canvas:
//-fx "Xi=i-w/2; Yj=j-h/2; 1.2*(0.5-hypot(Xi,Yj)/70.0)+0.5"

//convert -size 80x80 xc: -channel G -fx  'sin((i-w/2)*(j-h/2)/w)/2+.5'\
//-separate fx_2d_gradient.gif


//convert -size 100x100 xc:  -channel G \
//-fx 'xx=i-w/2; yy=j-h/2; rr=hypot(xx,yy); (.5-rr/70)*1.2+.5' \
//-separate  fx_radial_gradient.png

    function renderImage3() {

        //$canvas = new \Imagick();
        //$canvas->newImage(1, 256, "white", "jpg");
        
        $gradient = new \Imagick();
        $gradient->newPseudoImage(1, 256, "gradient:white-black");
        //$canvas->compositeImage( $gradient, \Imagick::COMPOSITE_OVER, 0, 0 );
        //$canvas->rotateImage(new \ImagickPixel('white'), 90);
        $newImage = $gradient->fxImage("floor(u*10+0.5)/10");

        $newImage->setimageformat('jpg');
        header( "Content-Type: image/jpg" );
        echo $newImage;
                
    }
    
}