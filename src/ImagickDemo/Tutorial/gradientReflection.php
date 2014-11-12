<?php


namespace ImagickDemo\Tutorial;

class gradientReflection extends \ImagickDemo\Example {

    function renderDescription() {

        $output = <<< END
Reflecting an an image vertically with a gradient on the transparency of the reflected version produces a nice effect for logos:
END;

        return nl2br($output);
    }
    
    
    function render() {
        return $this->renderImageURL();
    }
}