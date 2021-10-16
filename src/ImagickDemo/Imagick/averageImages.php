<?php

namespace ImagickDemo\Imagick;

class averageImages extends \ImagickDemo\Example
{
    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        return "Needs two images. Function is deprecated, and kills PHP. I suggest not using it.";
    }

    public function renderTitle(): string
    {
        return "Average images";
    }

    public function foo()
    {
        //$imagick = new \Imagick(\Imagick::LAYERMETHOD_MERGE);
        //$imagick->mergeImageLayers($layerMethodType);
    }
}
