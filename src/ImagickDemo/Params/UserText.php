<?php

declare(strict_types=1);

namespace ImagickDemo\Params;

use Params\ExtractRule\GetStringOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxLength;

#[\Attribute]
class UserText implements Param
{
    public function __construct(
        private string $name,
        private int $max_length,
        private string $default
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault($this->default),
            new MaxLength($this->max_length)
        );
    }
}