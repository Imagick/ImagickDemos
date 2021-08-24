<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class Midpoint implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(4),
            new RangeIntValue(-100, 100)
        );
    }
}
