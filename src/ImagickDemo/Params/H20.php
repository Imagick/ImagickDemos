<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class H20 implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(100),
            new RangeIntValue(0, 20),
        );
    }
}
