<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Control\ReactControls;
use ImagickDemo\Imagick\Controls\ImageControl;
use VarMap\VarMap;

class pingImageFile extends \ImagickDemo\Example
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

//Example Imagick::pingImageFile
        $image = new \Imagick();
        $img_url = "https://phpimagick.com/" . normalisePublicFilePath($this->imageControl->getImagePath());
        $fp = fopen($img_url, 'rb');

        $image->pingImageFile($fp);
        $output .= "For file: " . $img_url . " <br/><br/>";
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
