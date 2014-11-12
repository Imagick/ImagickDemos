<?php

namespace ImagickDemo\Imagick;


class setImageDelay extends \ImagickDemo\Example {

    
    function renderDescription() {
        $output = "Modify an animated Gif so that it's frames are played at
a variable speed, varying between being shown for 50milliseconds
down to 0ms, which will cause the frame to be skipped in 
most browsers.";
        
        return $output;
    }
    
    function render() {
        return $this->renderImageURL();
    }
}