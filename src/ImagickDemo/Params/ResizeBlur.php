<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxFloatValue;
use Params\ProcessRule\MinFloatValue;

#[\Attribute]
class ResizeBlur implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(1),
            new MinFloatValue(0),
            new MaxFloatValue(2),
        );
    }
}