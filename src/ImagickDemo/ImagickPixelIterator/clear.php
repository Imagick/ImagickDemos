<?php


namespace ImagickDemo\ImagickPixelIterator;


class clear extends \ImagickDemo\Example {

    function renderDescription() {
        return "Clears the resources used by the ImagePixelIterator. This may be required if you are processing many images in one script - which is not recommended.";
    }
    
    function render() {
        return  $this->renderImageURL();
    }
}