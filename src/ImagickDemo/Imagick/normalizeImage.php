<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageAndChannelControl;

class normalizeImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::normalizeImage";
    }

    public function renderDescription()
    {
        $output = "As the effect is very subtle, to make it easier to see the different, the original images is on the left side, normalised on right. <br/>";
        return $output;
    }

    public static function getParamType(): string
    {
        return ImageAndChannelControl::class;
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }
}
