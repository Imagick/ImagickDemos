<?php

namespace ImagickDemo\Imagick;

class setImageArtifact extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::setImageArtifact";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
