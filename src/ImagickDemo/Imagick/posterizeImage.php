<?php

namespace ImagickDemo\Imagick;


class posterizeImage extends \ImagickDemo\Example {

    use OriginalImageFile;

    function renderDescription() {

        $output = <<< END

END;

        return nl2br($output);
    }
    
    function render() {
        return $this->renderImageURL();
    }
}