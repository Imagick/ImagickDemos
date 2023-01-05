<?php

declare(strict_types=1);

namespace ImagickDemo\Params;

use DataType\ExtractRule\GetStringOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\ImagickIsRgbColor;

#[\Attribute]
class ImagickColorParam implements HasInputType
{
    public function __construct(
        private string $default,
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
            new GetStringOrDefault($this->default),
            new ImagickIsRgbColor()
        );
    }
}
