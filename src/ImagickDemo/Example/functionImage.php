<?php

namespace ImagickDemo\Example;

class functionImage extends \ImagickDemo\ExampleWithoutControl {

    function renderTitle() {
        return "";
    }

    function renderDescription() {

    }

    function renderImage() {


//$imagick = new \Imagick();
//$imagick->newPseudoImage(400, 400, 'gradient:black-white');

        $size = 200;

            $quanta = pow(2, 16);

            //$channel = \Imagick::CHANNEL_RED | \Imagick::CHANNEL_GREEN |\Imagick::CHANNEL_BLUE;

//    if (false) {
            //convert -size 100x100 gradient: -function sinusoid 4,-90  gradient_bands.jpg
            $imagick1 = new \Imagick();
            $imagick1->newPseudoImage($size, $size, 'gradient:black-white');
            $arguments = array(9, -90);
            $imagick1->functionImage(\Imagick::FUNCTION_SINUSOID, $arguments);

            $imagick2 = new \Imagick();
            $imagick2->newPseudoImage($size, $size, 'gradient:black-white');
            $arguments = array(0.5, 0);
            $imagick2->functionImage(\Imagick::FUNCTION_SINUSOID, $arguments);
            $imagick1->compositeimage($imagick2, \Imagick::COMPOSITE_MULTIPLY, 0, 0);


//    }
//    else {
            //$arguments = array(4, -4, 1);
            //$arguments = array(3.5,-5.05,2.05,0.3);
            //$arguments = array(0.5, 1, 0);

//    $imagick = new \Imagick();
//    $imagick->newPseudoImage(200, 200, 'gradient:black-white');
////    $arguments = array( -3.0 , 2.5, 0.45);
//    $result = $imagick->functionImage(\Imagick::FUNCTION_POLYNOMIAL, $arguments);//, \Imagick::CHANNEL_GREEN);

//    $arguments = array(10);
//    $result = $imagick->functionImage(\Imagick::FUNCTION_ARCTAN, $arguments);

            //}

//    echo "Result is ".$result."<br/>";
//    echo "<br/>Fin.";
//    exit(0);

            $imagick1->setimageformat('png');

            header("Content-Type: image/png");
            echo $imagick1->getImageBlob();
    }

}