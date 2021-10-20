<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\PosterizeImageControl;

class posterizeImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::posterizeImage";
    }

    public function hasOriginalImage()
    {
        return true;
    }

    public function renderDescription()
    {
        $output = <<< END

END;

        return nl2br($output);
    }

    public static function getParamType(): string
    {
        return PosterizeImageControl::class;
    }
}
