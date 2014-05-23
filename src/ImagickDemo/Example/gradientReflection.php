<?php


namespace ImagickDemo\Example;

class gradientReflection extends \ImagickDemo\Example {

    function render() {
        $output = "<br/>";
        $output .= $this->renderImageURL();

        return $output;
    }
    

//    function renderImageCorrect() {
//        
//        $im = new \Imagick(realpath('../images/sample.png'));
//        
//        $gradient = new \Imagick();
//        $gradient->newPseudoImage($im->getImageWidth(), $im->getImageHeight(), 'gradient:rgba(255, 255, 255, 0.8)-rgba(255, 255, 255, 0.5)');
//
//        //$im->compositeImage($gradient, \Imagick::COMPOSITE_BLEND, 0, 0);
//
//        $im->compositeimage(
//           $gradient,
//           //\Imagick::COMPOSITE_COPYOPACITY,
//           \Imagick::COMPOSITE_DSTOUT,
//           0,
//           0
//        );
//        
//
//        //TODO - this line produces an dark line across the image.
//        //$im->setImageOpacity(0.45);
//        header('Content-Type: image/jpg');
//        echo $im;
//    }


}