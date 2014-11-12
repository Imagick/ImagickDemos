<?php

namespace ImagickDemo\Imagick;


class segmentImage extends \ImagickDemo\Example {

    
    function renderDescription() {
        $output = <<< END
        <p>This function is quite slow and prone to time out. Large values for the cluster and smooth threshold appear to be faster, and so safer.</p>

END;
        return $output;
    }
    
    function render() {
        return $this->renderImageURL();
    }
}