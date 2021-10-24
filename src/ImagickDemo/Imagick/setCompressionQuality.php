<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\SetCompressionQualityControl;

class setCompressionQuality extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::setCompressionQuality";
    }

    public function renderDescription()
    {
        $html = <<< HTML
Imagick::setCompressionQuality is used to set the compression quality for newly created images. It may have no effect on existing images.
HTML;

        return $html;
    }

    public static function getParamType(): string
    {
        return SetCompressionQualityControl::class;
    }
}
