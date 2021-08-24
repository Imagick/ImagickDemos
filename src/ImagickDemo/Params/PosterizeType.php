<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\EnumMap;

#[\Attribute]
class PosterizeType implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(\Imagick::DITHERMETHOD_RIEMERSMA),
            new EnumMap([
                \Imagick::DITHERMETHOD_NO => 'None',
                \Imagick::DITHERMETHOD_RIEMERSMA => 'Riemersma',
                \Imagick::DITHERMETHOD_FLOYDSTEINBERG => 'Floydsteinberg',
            ])
        );
    }
}
