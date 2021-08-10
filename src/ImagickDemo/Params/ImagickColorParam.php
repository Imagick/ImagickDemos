<?php

declare(strict_types=1);

namespace ImagickDemo\Params;

use Params\ExtractRule\GetStringOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\ImagickIsRgbColor;

#[\Attribute]
class ImagickColorParam implements Param
{
    public function __construct(
        private string $default,
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault($this->default),
            new ImagickIsRgbColor()
        );
    }
}
