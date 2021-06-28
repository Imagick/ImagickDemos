<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Control;
use ImagickDemo\Helper\PageInfo;
use ImagickDemo\ImagickDraw\Params\AffineParams;
use VarMap\VarMap;
use ImagickDemo\ReactParamType;

class affine extends \ImagickDemo\Example
{
    /** @var \ImagickDemo\Helper\PageInfo */
    private $pageInfo;

    /** @var VarMap */
    private $varMap;

    public function __construct(
        PageInfo $pageInfo,
        Control $control,
        VarMap $varMap
    ) {
        $this->pageInfo = $pageInfo;
        $this->varMap = $varMap;
        parent::__construct($control);
    }

    public function renderDescription()
    {
        $output = nl2br("Adjusts the current affine transformation matrix with the specified affine transformation matrix.
            sx - The amount to scale the drawing in the x direction.
            sy - The amount to scale the drawing in the y direction.
            rx - The amount to rotate the drawing for each unit in the x direction.
            ry - The amount to rotate the drawing for each unit in the y direction.
            tx - The amount to translate the drawing in the x direction.
            ty - The amount to translate the drawing in the y direction.");


        return $output;
    }

    public function hasReactControls(): bool
    {
        return true;
    }

    public static function getParamType(): string
    {
        return AffineParams::class;
    }

    public function render()
    {
        $imageBaseUrl = $this->control->getURL();
        $activeCategory = $this->pageInfo->getCategory();
        $activeExample = $this->pageInfo->getExample();
        $pageBaseUrl = \ImagickDemo\Route::getPageURL($activeCategory, $activeExample);

        return sprintf(
            '<div
                id="imagePanel"
                data-imageBaseUrl="%s"
                data-pagebaseurl="%s"
                ></div>',
            $imageBaseUrl,
            $pageBaseUrl
        );
    }

    public function renderOld()
    {
        $output = $this->renderImageURL();

        return $output;
    }
}
