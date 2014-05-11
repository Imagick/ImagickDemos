<?php

namespace ImagickDemo\Imagick;


function someProgress($offset, $span) {
    if (((100 * $offset) / $span)  > 50) {
        //return false;
        return 0;
    }
    return true;
}





class setProgressMonitor extends ImagickExample {

    function renderDescription() {
    }
    
    function someProgress($offset, $span) {
//        if (((100 * $offset) / $span)  > 50) {
//            return false;
//        }
        echo ".";
        return true;
    }

    function renderImage() {

        try {
            $startTime = time();
            $callback = function ($offset, $span) use ($startTime) {                
//                if (time() - $startTime > 5) {
//                    echo "Image is taking to long to proces";
//                    return false;
//                }
                if (rand(0, 20) == 0) {
                    echo "Progress is $offset / $span \n";
                }
                return true;
            };

            $imagick = new \Imagick(realpath($this->imagePath));
            //$imagick->setProgressMonitor($callback);
            //$imagick->setProgressMonitor(null);
            $imagick->setProgressMonitor(__NAMESPACE__.'\someProgress');

            $imagick->waveImage(2, 15);
            //$imagick->sketchimage(6, 15, 45);         
            //header("Content-Type: image/jpg");
            echo "Data len is: ".strlen($imagick->getImageBlob());
        }
        catch(\ImagickException $e) {
            echo "ImagickException caught: ".$e->getMessage()." Exception type is ".get_class($e);
        }
    }
}
