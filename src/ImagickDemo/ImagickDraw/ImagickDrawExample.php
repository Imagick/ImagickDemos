<?php

namespace ImagickDemo\ImagickDraw;

abstract class ImagickDrawExample extends \ImagickDemo\Example
{
    protected $backgroundColor;
    protected $fillColor;
    protected $strokeColor;

    abstract public function getDescription();

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        $output = $this->getDescription();
        $output .= $this->renderImageURL();

        return $output;
    }
}
