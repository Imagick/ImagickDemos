<?php

namespace ImagickDemo\Params;


use DataType\ExtractRule\GetStringOrDefault;
use DataType\ProcessRule\EnumMap;
use DataType\HasInputType;
use DataType\InputType;

#[\Attribute]
class FXAnalyzeExample implements HasInputType
{
    public function __construct(
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
            new GetStringOrDefault('fxAnalyzeExample'),
            new EnumMap([
                'example1' => 'Sinusoid',
                'example2' => 'Linear gradient',
                'example3' => 'Gamma gradient',
                'example4' => 'Squished sinusoid',
            ])
        );
    }
}
