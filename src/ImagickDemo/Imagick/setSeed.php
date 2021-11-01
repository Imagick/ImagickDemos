<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\SetSeedControl;

class setSeed extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::setSeed";
    }

    public static function getParamType(): string
    {
        return SetSeedControl::class;
    }
}
