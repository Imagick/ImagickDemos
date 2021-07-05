<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Control;
use ImagickDemo\Helper\PageInfo;
use ImagickDemo\ImagickDraw\Params\AffineParams;
use ImagickDemo\ImagickDraw\Params\ThreeColors;
use VarMap\VarMap;
use ImagickDemo\ReactParamType;
use ImagickDemo\ImagickDraw\ReactThreeColorExample;

class affine extends \ImagickDemo\Example
{
    public function hasReactControls(): bool
    {
        return true;
    }

    public static function getParamType(): string
    {
        return ThreeColors::class;
    }

    public function renderDescription()
    {
        $output = nl2br("Adjusts the current affine transformation matrix with the specified affine transformation matrix.
            sx - The amount to scale the drawing in the x direction.
            sy - The amount to scale the drawing in the y direction.
            rx - The amount to rotate the drawing for each unit in the x direction.
            ry - The amount to rotate the drawing for each unit in the y direction.
            tx - The amount to translate the drawing in the x direction.
            ty - The amount to translate the drawing in the y direction."
        );

        return $output;
    }

}
