<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetKernelMatrixOrDefault;
use Params\InputParameter;
use Params\Param;

#[\Attribute]
class ColorMatrix implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        $default = [
            [1.5, 0.0, 0.0, 0.0, -0.157],
            [0.0, 1.0, 0.5, 0.0, -0.157],
            [0.0, 0.0, 0.5, 0.0, 0.5],
            [0.0, 0.0, 0.0, 1.0, 0.0],
            [0.0, 0.0, 0.0, 0.0, 1.0],
        ];

        return new InputParameter(
            $this->name,
            new GetKernelMatrixOrDefault($default),
        );
    }
}
