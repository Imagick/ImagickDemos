<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;
use Params\ProcessRule\MaxFloatValue;

#[\Attribute]
class Gamma implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(2.2),
            new RangeFloatValue(0.01, 10),
        );
    }
}
