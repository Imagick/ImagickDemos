<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\ReactExample;
use ImagickDemo\Imagick\Controls\AdaptiveBlurImageControl;

class adaptiveBlurImage extends ReactExample
{
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
