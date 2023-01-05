<?php

declare(strict_types=1);

namespace ImagickDemo\Params;

use DataType\ExtractRule\GetStringOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\MaxLength;

#[\Attribute]
class UserText implements HasInputType
{
    public function __construct(
        private string $name,
        private int $max_length,
        private string $default
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
            new GetStringOrDefault($this->default),
            new MaxLength($this->max_length)
        );
    }
}