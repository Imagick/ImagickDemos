<?php

namespace ImagickDemo\Imagick;

class appendImages extends \ImagickDemo\Example {


    function renderDescription ()
    {
        return "This function only works if the internal iterator in the image is reset to 0 before the function is called.";
    }

    function render()
    {
        return $this->renderImageURL();
    }
}