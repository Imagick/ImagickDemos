<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Control\ReactControls;
use ImagickDemo\Imagick\Controls\ImageControl;
use VarMap\VarMap;

class pingImageBlob extends \ImagickDemo\Example
{
    private ImageControl $imageControl;

    public function __construct(VarMap $varMap)
    {
        $this->imageControl = ImageControl::createFromVarMap($varMap);
    }

    public function renderTitle(): string
    {
        return "Imagick::pingImageFile";
    }

    public function needsFullPageRefresh(): bool
    {
        return true;
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    ) {
        $output = "This method can be used to query image width, height, size, and format without reading the whole image in to memory.<br/><br/><br/>";

//Example Imagick::pingImageBlob
        $image = new \Imagick();
        $image_data = file_get_contents(realpath($this->imageControl->getImagePath()));

        $image->pingImageBlob($image_data);
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
