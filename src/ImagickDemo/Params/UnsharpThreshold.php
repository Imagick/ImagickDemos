<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

#[\Attribute]
class UnsharpThreshold implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(0),
            new RangeFloatValue(0, 20)
        );
    }
}
