<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\ExtractRule\GetStringOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\EnumMap;




#[\Attribute]
class PaintType implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
//            new GetIntOrDefault(\Imagick::PAINT_FILLTOBORDER),
            new GetStringOrDefault("Fill to border"),
            new EnumMap(getPaintTypeOptions())
        );
    }

//class PaintType extends OptionKeyElement
//{
//    protected function getDefault()
//    {
//        return \Imagick::PAINT_FILLTOBORDER;
//    }
//
//    protected function getVariableName()
//    {
//        return 'paintType';
//    }
//
//    protected function getDisplayName()
//    {
//        return "Paint type";
//    }
//
//    protected function getOptions()
//    {
//        return [
//            \Imagick::PAINT_POINT => "Point",
//            \Imagick::PAINT_REPLACE => "Replace",
//            \Imagick::PAINT_FLOODFILL => "Floodfill",
//            \Imagick::PAINT_FILLTOBORDER => "Fill to border",
//            \Imagick::PAINT_RESET => "Reset"
//        ];
//    }
//
//    public function getPaintType()
//    {
//        return $this->getKey();
//    }
}
