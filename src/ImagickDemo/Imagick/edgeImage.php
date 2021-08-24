<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\EdgeImageControl;

class edgeImage extends \ImagickDemo\Example
{
    function getOriginalImage()
    {
        return $this->control->getOriginalURL();
    }

    function getOriginalFilename()
    {
        return $this->control->getImagePath();
    }

    public function render()
    {
        return $this->renderImageURL();
    }



    public static function getParamType(): string
    {
        return EdgeImageControl::class;
    }

}
