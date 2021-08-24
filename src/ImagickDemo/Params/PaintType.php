<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetStringOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\EnumMap;




#[\Attribute]
class PaintType implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
//            new GetIntOrDefault(\Imagick::PAINT_FILLTOBORDER),
            new GetStringOrDefault("Fill to border"),
            new EnumMap(getPaintTypeOptions())
        );
    }
}
