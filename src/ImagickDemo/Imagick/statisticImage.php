<?php

namespace ImagickDemo\Imagick;

class statisticImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::statisticImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
