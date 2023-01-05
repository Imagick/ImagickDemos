<?php

namespace ImagickDemo\Params;

use DataType\ExtractRule\GetStringOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\EnumMap;

#[\Attribute]
class SparseColorType implements HasInputType
{
    public function __construct(
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
            new GetStringOrDefault('Voronoi'),
            new EnumMap(getSparseColorOptions())
        );
    }
}
