<?php

namespace ImagickDemo\ControlElement;

class LayerMethodType extends OptionKeyElement
{
    protected function getDefault()
    {
        return \Imagick::LAYERMETHOD_MERGE;
    }

    protected function getVariableName()
    {
        return 'layerMethodType';
    }

    protected function getDisplayName()
    {
        return "Layer method type";
    }

    public function getOptions()
    {
        return [
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
            \Imagick::LAYERMETHOD_COMPOSITE => "Composite",
            \Imagick::LAYERMETHOD_MERGE => "Merge",
            \Imagick::LAYERMETHOD_FLATTEN => "Flatten",
            \Imagick::LAYERMETHOD_MOSAIC => "Mosaic",
            \Imagick::LAYERMETHOD_TRIMBOUNDS => "Trim bounds",
        ];
    }

    public function getLayerMethodType()
    {
        return $this->getKey();
    }
}
