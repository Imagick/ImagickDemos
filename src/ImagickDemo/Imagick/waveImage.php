<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\WaveImageControl;

class waveImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::waveImage";
    }
    
    public function render()
    {
        return $this->renderImageURL();
    }



    public static function getParamType(): string
    {
        return WaveImageControl::class;
    }
}
