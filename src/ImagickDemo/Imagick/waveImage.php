<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\WaveImageControl;

class waveImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::waveImage";
    }
    




    public static function getParamType(): string
    {
        return WaveImageControl::class;
    }
}
