<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ModulateImageControl;

class modulateImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Modulate image";
    }

    public function hasOriginalImage()
    {
        return true;
    }

    public function renderDescription()
    {
        $html = <<< HTML


Hue - 0 = -180°, 100 = 0°, 200 = +180°. So 0 and 200 give them same result.<br/>
Brightness - 0 = totally dark, 100 = no brightness change, 200 = totally white.<br/>
Saturation - 0 = totally gray, 100 = no change, 200 maximum color<br/>



HTML;

        return $html;
    }

    public static function getParamType(): string
    {
        return ModulateImageControl::class;
    }
}
