<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\BlurImageControl;

class blurImage extends \ImagickDemo\Example
{
    public function hasOriginalImage()
    {
        return true;
    }

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
        return BlurImageControl::class;
    }
}
