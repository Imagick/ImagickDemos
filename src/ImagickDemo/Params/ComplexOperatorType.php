<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetStringOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\EnumMap;

#[\Attribute]
class ComplexOperatorType implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault("Multiply"),
            new EnumMap(getComplexOperatorOptions())
        );
    }
}