<?php

namespace ImagickDemo\Imagick;


function createMask() {

    $draw = new \ImagickDraw();

    $draw->setStrokeOpacity(0);
    $draw->setStrokeColor('rgb(255, 255, 255)');
    $draw->setFillColor('rgb(255, 255, 255)');

    

    //Draw a circle on the y-axis, with it's centre
    //at x, y that touches the origin
    $draw->circle(250, 250, 220, 250);
    //$draw->point(256, 256);


    $imagick = new \Imagick();

    $imagick->newImage(512, 512, "black");

    $imagick->drawImage($draw);

    $imagick->gaussianBlurImage(20, 20);

 
    

    $imagick->autoLevelImage();

    //$imagick->negateImage(true);
    
    if (false) {
        $imagick->setImageFormat('png');
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
        exit(0);
    }
    
    return $imagick;
}


class forwardFourierTransformImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {


        try {
            $imagick = new \Imagick(realpath($this->imagePath));
            $imagick->resizeimage(512, 512, \Imagick::FILTER_LANCZOS, 1);
            
            
            
            if (false) {
                header("Content-Type: image/png");
                echo $imagick->getImageBlob();
                exit(0);
            }

            $mask = createMask();
            
            $imagick->forwardFourierTransformImage(true);
    
            //echo "The image has ".$imagick->getNumberImages();
    //        header("Content-Type: image/jpg");
    //        echo $imagick->getImageBlob();
            //$imagickPhase = $imagick->getimageindex(1);

            @$imagick->setimageindex(0);
            $magnitude = $imagick->getimage();
            
            @$imagick->setimageindex(1);
            $imagickPhase = $imagick->getimage();

            if (true) {
                $imagickPhase->compositeImage($mask, \Imagick::COMPOSITE_MULTIPLY, 0, 0);
            }
            
            if (false) {
                $output = clone $imagickPhase;
                $output->setimageformat('png');
                header("Content-Type: image/png");
                echo $output->getImageBlob();
            }

            $magnitude->inverseFourierTransformImage($imagickPhase, true);

            $magnitude->setimageformat('png');
            header("Content-Type: image/png");
            echo $magnitude->getImageBlob();
        }
        catch(\Exception $e) {
            echo "Exception: ".$e->getMessage();
            exit(0);
        }




    }
}