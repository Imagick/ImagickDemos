<?php

namespace ImagickDemo\Params;

use DataType\ExtractRule\GetStringOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\EnumMap;




#[\Attribute]
class PaintType implements HasInputType
{
    public function __construct(
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
//            new GetIntOrDefault(\Imagick::PAINT_FILLTOBORDER),
            new GetStringOrDefault("Fill to border"),
            new EnumMap(getPaintTypeOptions())
        );
    }
}
