<?php

namespace ImagickDemo\ImagickPixelIterator;

class clear extends \ImagickDemo\Example
{

    public function renderDescription()
    {
        return "Clears the resources used by the ImagePixelIterator. This may be required if you are processing many images in one script - which is not recommended.";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
