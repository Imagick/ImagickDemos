<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Control\ReactControls;
use ImagickDemo\Imagick\Controls\ImageControl;
use VarMap\VarMap;

class pingImage extends \ImagickDemo\Example
{
    private ImageControl $imageControl;

    public function __construct(VarMap $varMap)
    {
        $this->imageControl = ImageControl::createFromVarMap($varMap);
    }

    public function renderTitle(): string
    {
        return "Imagick::pingImage";
    }

    public function needsFullPageRefresh(): bool
    {
        return true;
    }

    public function hasBespokeRender()
    {
        return true;
    }

    public function bespokeRender(ReactControls $reactControls)
    {
        $output = "This method can be used to query image width, height, size, and format without reading the whole image in to memory.<br/><br/><br/>";

//Example Imagick::pingImage
        $image = new \Imagick();
        $image->pingImage(realpath($this->imageControl->getImagePath()));
        $output .= "For file: " . basename($this->imageControl->getImagePath()) . " <br/><br/>";
        $output .= "Width is " . $image->getImageWidth() . "<br/>";
        $output .= "Height is " . $image->getImageHeight() . "<br/>";
//Example end
        return $output;
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
