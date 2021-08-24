<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;

#[\Attribute]
class CanvasType implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault("gradient:"),
            new EnumMap([
                "GRANITE:" => "Granite",
                "LOGO:" => "Logo",
                "NETSCAPE:" => "Netscape web safe colors",
                "WIZARD:" => "Wizard",
                "canvas:khaki" => "Canvas constant",
                "xc:wheat" => "Canvas constant shorthand",
                "rose:" => "Rose",
                "gradient:" => "Gradient",
                "gradient:black-fuchsia" => "Gradient with color",
                "radial-gradient:" => "Radial gradient",
                "radial-gradient:red-blue" => "Radial gradient with color",
                "plasma:" => "Plasma",
                "plasma:tomato-steelblue" => "Plasma with color",
                "plasma:fractal" => "Plasma fractal",
                "pattern:hexagons" => "Hexagons",
                "pattern:checkerboard" => "Checkerboard",
                "pattern:leftshingle" => "Left shingle",
            ])
        );
    }
}
