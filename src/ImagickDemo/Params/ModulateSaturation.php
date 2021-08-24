<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class ModulateSaturation implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(100),
            new RangeIntValue(0, 200)
        );
    }
}
