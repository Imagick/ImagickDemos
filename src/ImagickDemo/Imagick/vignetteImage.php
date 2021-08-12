<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\VignetteImageControl;

class vignetteImage extends \ImagickDemo\Example
{
    function getOriginalImage()
    {
        return $this->control->getOriginalURL();
    }

    function getOriginalFilename()
    {
        return $this->control->getImagePath();
    }

    public function render()
    {
        return $this->renderImageURL();
    }

    public function hasReactControls(): bool
    {
        return true;
    }

    public static function getParamType(): string
    {
        return VignetteImageControl::class;
    }
}
