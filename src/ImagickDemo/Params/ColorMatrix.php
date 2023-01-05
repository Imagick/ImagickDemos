<?php

namespace ImagickDemo\Params;

use DataType\ExtractRule\GetKernelMatrixOrDefault;
use DataType\HasInputType;
use DataType\InputType;

#[\Attribute]
class ColorMatrix implements HasInputType
{
    public function __construct(
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
        $default = [
            [1.5, 0.0, 0.0, 0.0, -0.157],
            [0.0, 1.0, 0.5, 0.0, -0.157],
            [0.0, 0.0, 0.5, 0.0, 0.5],
            [0.0, 0.0, 0.0, 1.0, 0.0],
            [0.0, 0.0, 0.0, 0.0, 1.0],
        ];

         return new InputType(
            $this->name,
            new GetKernelMatrixOrDefault($default),
        );
    }
}
