<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\EnumMap;

#[\Attribute]
class VirtualPixel implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(\Imagick::VIRTUALPIXELMETHOD_MIRROR),
            new EnumMap([
                \Imagick::VIRTUALPIXELMETHOD_BACKGROUND => 'Background color',
                \Imagick::VIRTUALPIXELMETHOD_CONSTANT => 'Constant',
                \Imagick::VIRTUALPIXELMETHOD_EDGE => 'Edge',
                \Imagick::VIRTUALPIXELMETHOD_MIRROR => 'Mirror',
                \Imagick::VIRTUALPIXELMETHOD_TILE => 'Tile',
                \Imagick::VIRTUALPIXELMETHOD_TRANSPARENT => 'Transparent',
                \Imagick::VIRTUALPIXELMETHOD_MASK => 'Mask',
                \Imagick::VIRTUALPIXELMETHOD_BLACK => 'Black',
                \Imagick::VIRTUALPIXELMETHOD_GRAY => 'Gray',
                \Imagick::VIRTUALPIXELMETHOD_WHITE => 'White',
                \Imagick::VIRTUALPIXELMETHOD_HORIZONTALTILE => 'Horizontal tile',
                \Imagick::VIRTUALPIXELMETHOD_VERTICALTILE => 'Vertical tile',
            ])
        );
    }

//class VirtualPixel extends OptionKeyElement
//{
//    /**
//     * @return array
//     */
//    public function getInjectionParams()
//    {
//        return ['virtualPixelType' => $this->key];
//    }
//
//    protected function getDefault()
//    {
//        return \Imagick::VIRTUALPIXELMETHOD_MIRROR;
//    }
//
//    protected function getVariableName()
//    {
//        return 'virtualPixel';
//    }
//
//    protected function getDisplayName()
//    {
//        return "Virtual pixel type";
//    }
//
//    protected function getOptions()
//    {
//        return [
//            \Imagick::VIRTUALPIXELMETHOD_BACKGROUND => 'Background color',
//            \Imagick::VIRTUALPIXELMETHOD_CONSTANT => 'Constant',
//            \Imagick::VIRTUALPIXELMETHOD_EDGE => 'Edge',
//            \Imagick::VIRTUALPIXELMETHOD_MIRROR => 'Mirror',
//            \Imagick::VIRTUALPIXELMETHOD_TILE => 'Tile',
//            \Imagick::VIRTUALPIXELMETHOD_TRANSPARENT => 'Transparent',
//            \Imagick::VIRTUALPIXELMETHOD_MASK => 'Mask',
//            \Imagick::VIRTUALPIXELMETHOD_BLACK => 'Black',
//            \Imagick::VIRTUALPIXELMETHOD_GRAY => 'Gray',
//            \Imagick::VIRTUALPIXELMETHOD_WHITE => 'White',
//            \Imagick::VIRTUALPIXELMETHOD_HORIZONTALTILE => 'Horizontal tile',
//            \Imagick::VIRTUALPIXELMETHOD_VERTICALTILE => 'Vertical tile',
//        ];
//    }
//
//    public function getVirtualPixelType()
//    {
//        return $this->getKey();
//    }
}
