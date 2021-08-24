<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

#[\Attribute]
class SigmoidalContrast implements Param
{
    public function __construct(
        private int $default,
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(0.5),
            new RangeFloatValue(-1000, 1000)
        );
    }
}
