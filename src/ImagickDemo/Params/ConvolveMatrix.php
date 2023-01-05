<?php

namespace ImagickDemo\Params;

use DataType\HasInputType;
use DataType\InputType;

//use ImagickDemo\ExtractRule\GetKernelMatrixOrDefault;
use DataType\ExtractRule\GetKernelMatrixOrDefault;


#[\Attribute]
class ConvolveMatrix implements HasInputType
{
    public function __construct(
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
        $default = [
            [-1, -1, -1],
            [-1, 8, -1],
            [-1, -1, -1],
        ];

         return new InputType(
            $this->name,
            new GetKernelMatrixOrDefault($default),
        );
    }
}
