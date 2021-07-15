<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\AdaptiveBlurImageControl;

class adaptiveBlurImage extends \ImagickDemo\Example
{
    function getOriginalImage()
    {
        return $this->control->getOriginalURL();
    }

    function getOriginalFilename()
    {
        return $this->control->getImagePath();
    }

    public function renderTitle()
    {
        return "Adaptive blur image";
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
        return AdaptiveBlurImageControl::class;
    }
}
