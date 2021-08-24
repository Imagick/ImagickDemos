<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\EnumMap;

#[\Attribute]
class OrientationType implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(\Imagick::ORIENTATION_TOPLEFT),
            new EnumMap([
                \Imagick::ORIENTATION_TOPLEFT => "TopLeftOrientation",
                \Imagick::ORIENTATION_TOPRIGHT => "TopRightOrientation",
                \Imagick::ORIENTATION_BOTTOMRIGHT => "BottomRightOrientation",
                \Imagick::ORIENTATION_BOTTOMLEFT => "BottomLeftOrientation",
                \Imagick::ORIENTATION_LEFTTOP => "LeftTopOrientation",
                \Imagick::ORIENTATION_RIGHTTOP => "RightTopOrientation",
                \Imagick::ORIENTATION_RIGHTBOTTOM => "RightBottomOrientation",
                \Imagick::ORIENTATION_LEFTBOTTOM => "LeftBottomOrientation",
            ])
        );
    }
}
