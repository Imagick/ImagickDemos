<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;
use VarMap\VarMap;




class getImageHistogram extends \ImagickDemo\Example
{
    private ImageControl $imageControl;

    public function __construct(VarMap $varMap)
    {
        $this->imageControl = ImageControl::createFromVarMap($varMap);
    }

    public function needsFullPageRefresh(): bool
    {
        return true;
    }

    public function renderTitle(): string
    {
        return "Get image histogram";
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    ) {
        // TODO - needs wrapping in react panel so page reload can work.

        $output = "This is the histogram:<br/>";
        $output .= image(
            $activeCategory,
            $activeExample,
            $this->imageControl->getValuesForForm(),
            $this
        );
        $output .= "<br/>For this image:<br/>";
        $output .= sprintf(
            "<img src='%s'>",
            normalisePublicFilePath($this->imageControl->getImagePath())
        );

        return $output;
    }

    public function renderCustomImage()
    {
        $imagick = new \Imagick(realpath($this->imageControl->getImagePath()));
        header("Content-Type: image/jpeg");
        echo $imagick;
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
