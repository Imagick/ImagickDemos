<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetStringOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\EnumMap;

#[\Attribute]
class LayerMethodType implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault("Merge"),
            new EnumMap([
                \Imagick::LAYERMETHOD_COALESCE => "Coalesce",
                \Imagick::LAYERMETHOD_COMPAREANY => "Compare any",
                \Imagick::LAYERMETHOD_COMPARECLEAR => "Compare clear",
                \Imagick::LAYERMETHOD_COMPAREOVERLAY => "Compare overlay",
                \Imagick::LAYERMETHOD_DISPOSE => "Dispose",
                \Imagick::LAYERMETHOD_OPTIMIZE => "Optimize",
                \Imagick::LAYERMETHOD_OPTIMIZEPLUS => "Optimize plus",
                \Imagick::LAYERMETHOD_OPTIMIZETRANS => "Optimize transparency",
                \Imagick::LAYERMETHOD_COMPOSITE => "Composite",
                \Imagick::LAYERMETHOD_OPTIMIZEIMAGE => "Optimize image",
                \Imagick::LAYERMETHOD_REMOVEDUPS => "Remove dups",
                \Imagick::LAYERMETHOD_REMOVEZERO => "Remove zero",
//                \Imagick::LAYERMETHOD_COMPOSITE => "Composite",
                \Imagick::LAYERMETHOD_MERGE => "Merge",
                \Imagick::LAYERMETHOD_FLATTEN => "Flatten",
                \Imagick::LAYERMETHOD_MOSAIC => "Mosaic",
                //\Imagick::LAYERMETHOD_TRIMBOUNDS => "Trim bounds",
            ])
        );
    }
}
