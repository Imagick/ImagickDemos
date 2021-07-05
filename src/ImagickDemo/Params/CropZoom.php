<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;

class CropZoom implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault('1'),
            new EnumMap([
                0 => 'Disabled',
                1 => 'Enabled',
            ])
        );
    }

//class CropZoom extends OptionKeyElement
//{
//    protected function getDefault()
//    {
//        return 1;
//    }
//
//    protected function getVariableName()
//    {
//        return 'cropZoom';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Crop + zoom';
//    }
//
//    protected function getOptions()
//    {
//        return [
//            0 => 'Disabled',
//            1 => 'Enabled',
//        ];
//    }
//
//    public function getCropZoom()
//    {
//        return $this->key;
//    }
}
