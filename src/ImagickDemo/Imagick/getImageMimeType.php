<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\ImageControl;
use VarMap\VarMap;

class getImageMimeType extends Example
{
    private ImageControl $imageControl;

    public function __construct(VarMap $varMap)
    {
        $this->imageControl = ImageControl::createFromVarMap($varMap);
    }

    public function renderTitle(): string
    {
        return "Imagick::getImageMimeType";
    }

    public function render(?string $activeCategory, ?string $activeExample)
    {
//Example Imagick::getImageMimeType
        $imagick = new \Imagick($this->imageControl->getImagePath());

        $output = 'Imagick::getImageMimeType result is: ';
        $output .= $imagick->getImageMimeType();

        return $output;
//Example end
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
