<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\TransformImageColorspaceControl;

class transformImageColorspace extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::transformImageColorspace";
    }

    public function renderDescription()
    {
        return "TODO - there's some code in the eye color resolution demo that should be used here...";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return TransformImageColorspaceControl::class;
    }
}
