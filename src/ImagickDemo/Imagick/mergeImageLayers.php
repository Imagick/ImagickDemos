<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\MergeImageControl;

class mergeImageLayers extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Merge image layers";
    }

    public static function getParamType(): string
    {
        return MergeImageControl::class;
    }
}
