<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\DeskewImageControl;

class deskewImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Deskew image";
    }

    function getOriginalFilename()
    {
        return "images/NYTimes-Page1-11-11-1918.jpg";
    }

    public function render()
    {
        return $this->renderImageURL();
    }



    public static function getParamType(): string
    {
        return DeskewImageControl::class;
    }
}
