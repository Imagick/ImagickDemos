<?php

namespace ImagickDemo\Params;


use DataType\ExtractRule\GetIntOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\EnumMap;

#[\Attribute]
class PosterizeType implements HasInputType
{
    public function __construct(
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
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
