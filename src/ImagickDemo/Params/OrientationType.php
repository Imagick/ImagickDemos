<?php

namespace ImagickDemo\Params;

use DataType\ExtractRule\GetIntOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\EnumMap;

#[\Attribute]
class OrientationType implements HasInputType
{
    public function __construct(
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
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
