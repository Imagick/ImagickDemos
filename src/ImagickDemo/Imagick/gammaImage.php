<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\GammaImageControl;

class gammaImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Gamma image";
    }



    public static function getParamType(): string
    {
        return GammaImageControl::class;
    }
}
