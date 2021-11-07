<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\ChannelFxImageControl;

class channelFxImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::channelFxImage";
    }

    public static function getParamType(): string
    {
        return ChannelFxImageControl::class;
    }
}
