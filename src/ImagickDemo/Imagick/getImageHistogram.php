<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;
use VarMap\VarMap;


function image(
    ?string $activeCategory,
    ?string $activeExample,
    array $values)
{
    $output = sprintf(
        "<img src='/image/%s/%s?%s' alt='example image' />",
        $activeCategory,
        $activeExample,
        http_build_query($values)
    );

    return $output;
}

function customImage(
    ?string $activeCategory,
    ?string $activeExample,
    array $values)
{
    $output = sprintf(
        "<img src='/customImage/%s/%s?%s' alt='example image' />",
        $activeCategory,
        $activeExample,
        http_build_query($values)
    );

    return $output;
}

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
            $this->imageControl->getValuesForForm()
        );
        $output .= "<br/>For this image:<br/>";
        $output .= customImage(
            $activeCategory,
            $activeExample,
            $this->imageControl->getValuesForForm()
        );

        return $output;
    }

    public function renderCustomImage()
    {
        $imagick = new \Imagick(realpath($this->imageControl->getImagePath()));
        header("Content-Type: image/jpg");
        echo $imagick;
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
