<?php

namespace ImagickDemo\Example;


class fxAnalyzeImage extends \ImagickDemo\Example {


    function render() {
        $output = "<br/>";
        $output .= $this->renderImageURL();

        return $output;
    }
    




    function renderImage2() {
        $graph = new \Imagick();
        $graph->newPseudoImage(256, 256, "xc:pink");

        $imagick = new \Imagick();
        $imagick->newPseudoImage(256, 256, 'gradient:black-white');
        $arguments = array(9, -90);
        $imagick->functionImage(\Imagick::FUNCTION_SINUSOID, $arguments);

        $graph->addImage($imagick);
        $fx = 'colorInt=int(256 * v.p{0,j}.lightness); pos=int(i); (int(pos) >= colorInt && int(pos) <= colorInt)';
        $fxImage = $graph->fxImage($fx);

        header("Content-Type: image/png");
        $fxImage->setimageformat('png');
        echo $fxImage->getImageBlob();
        
    }

    function renderImage3() {
        $imagick = new \Imagick();
        $imagick->newPseudoImage(10, 256, "gradient:white-black");
        //http://www.imagemagick.org/script/fx.php
        $fx = "(1.0/(1.0+exp(10.0*(0.5-u)))-0.006693)*1.0092503";
        //$fx = "1/2";
        $fx = "(1.0/(1.0+exp(10.0*(0.5-u)))-0.006693)*1.0092503";


//        p{0,0}.r     red value of the pixel in the upper left corner of the image
//        p{12,34}.b   blue pixel value at column number 12, row 34 of the image
        
//        p{0,j}.lightness;
//        
//        
        
        $fxImage = $imagick->fxImage($fx);
        header("Content-Type: image/jpg");
        $fxImage->setimageformat('jpg');
        echo $fxImage->getImageBlob();
    }

    //canvas:
//-fx 

//convert -size 80x80 xc: -channel G -fx  'sin((i-w/2)*(j-h/2)/w)/2+.5'\
//-separate fx_2d_gradient.gif



    
}