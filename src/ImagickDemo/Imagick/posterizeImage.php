<?php

namespace ImagickDemo\Imagick;


class posterizeImage extends \ImagickDemo\Example {

    function getOriginalImage() {
        return $this->control->getURL().'&original=true';
    }
    
    
    function renderDescription() {

        $output = <<< END

END;

        return nl2br($output);
    }
    
    function render() {
        return $this->renderImageURL();
    }
}