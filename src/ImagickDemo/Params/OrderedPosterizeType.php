<?php

namespace ImagickDemo\Params;


use DataType\ExtractRule\GetStringOrDefault;
use DataType\ProcessRule\EnumMap;
use DataType\HasInputType;
use DataType\InputType;

#[\Attribute]
class OrderedPosterizeType implements HasInputType
{
    public function __construct(
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
            new GetStringOrDefault('o8x8'),
            new EnumMap([
                'o4x4' => 'o4x4',
                'o4x4,3,3' => 'o4x4,3,3',
                'o4x4,8,8,8' => 'o4x4,8,8,8',

                'o8x8' => 'o8x8',
                'o8x8,3' => 'o8x8,3',
                'o8x8,6,6' => 'o8x8,6,6',

                'h8x8a' => 'h8x8a',
                'h8x8a,3,3' => 'h8x8a,3,3',
                'h8x8a,8,8' => 'h8x8a,8,8',
                'checks' => 'checks',
                'checks,3,3' => 'checks,3,3',
                'checks,8,8' => 'checks,8,8',
            ])
        );
    }
}
