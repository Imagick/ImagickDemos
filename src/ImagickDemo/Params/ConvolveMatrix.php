<?php

namespace ImagickDemo\Params;

use Params\InputParameter;
use Params\Param;

//use ImagickDemo\ExtractRule\GetKernelMatrixOrDefault;
use Params\ExtractRule\GetKernelMatrixOrDefault;


#[\Attribute]
class ConvolveMatrix implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        $default = [
            [-1, -1, -1],
            [-1, 8, -1],
            [-1, -1, -1],
        ];

        return new InputParameter(
            $this->name,
            new GetKernelMatrixOrDefault($default),
        );
    }
}
