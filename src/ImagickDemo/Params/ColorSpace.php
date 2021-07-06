<?php


namespace ImagickDemo\Params;

use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;

#[\Attribute]
class ColorSpace implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault(\Imagick::COLORSPACE_RGB),
            new EnumMap([
                \Imagick::COLORSPACE_RGB => 'RGB',
                \Imagick::COLORSPACE_GRAY => 'Gray',
                \Imagick::COLORSPACE_TRANSPARENT => 'Transparent',
                \Imagick::COLORSPACE_OHTA => 'OHTA',
                \Imagick::COLORSPACE_LAB => 'LAB',
                \Imagick::COLORSPACE_XYZ => 'XYZ',
                \Imagick::COLORSPACE_YCBCR => 'YCBCR',
                \Imagick::COLORSPACE_YCC => 'YCC',
                \Imagick::COLORSPACE_YIQ => 'YIC',
                \Imagick::COLORSPACE_YPBPR => 'YPBPR',
                \Imagick::COLORSPACE_YUV => 'YUV',
                \Imagick::COLORSPACE_CMYK => 'CMYK',
                \Imagick::COLORSPACE_SRGB => 'SRGB',
                \Imagick::COLORSPACE_HSB => 'HSB',
                \Imagick::COLORSPACE_HSL => 'HSL',
                \Imagick::COLORSPACE_HWB => 'HWB',
                \Imagick::COLORSPACE_REC601LUMA => 'REC601LUMA',
                \Imagick::COLORSPACE_REC709LUMA => 'REC709LUMA',
                \Imagick::COLORSPACE_LOG => 'LOG',
                \Imagick::COLORSPACE_CMY => 'CMY',
            ])
        );
    }

//class ColorSpace extends OptionKeyElement
//{
//    protected function getDefault()
//    {
//        return \Imagick::COLORSPACE_RGB;
//    }
//
//    protected function getVariableName()
//    {
//        return 'colorSpace';
//    }
//
//    protected function getDisplayName()
//    {
//        return "Color space";
//    }
//
//    protected function getOptions()
//    {
//        $colorSpaceTypes = [
//            \Imagick::COLORSPACE_RGB => 'RGB',
//            \Imagick::COLORSPACE_GRAY => 'Gray',
//            \Imagick::COLORSPACE_TRANSPARENT => 'Transparent',
//            \Imagick::COLORSPACE_OHTA => 'OHTA',
//            \Imagick::COLORSPACE_LAB => 'LAB',
//            \Imagick::COLORSPACE_XYZ => 'XYZ',
//            \Imagick::COLORSPACE_YCBCR => 'YCBCR',
//            \Imagick::COLORSPACE_YCC => 'YCC',
//            \Imagick::COLORSPACE_YIQ => 'YIC',
//            \Imagick::COLORSPACE_YPBPR => 'YPBPR',
//            \Imagick::COLORSPACE_YUV => 'YUV',
//            \Imagick::COLORSPACE_CMYK => 'CMYK',
//            \Imagick::COLORSPACE_SRGB => 'SRGB',
//            \Imagick::COLORSPACE_HSB => 'HSB',
//            \Imagick::COLORSPACE_HSL => 'HSL',
//            \Imagick::COLORSPACE_HWB => 'HWB',
//            \Imagick::COLORSPACE_REC601LUMA => 'REC601LUMA',
//            \Imagick::COLORSPACE_REC709LUMA => 'REC709LUMA',
//            \Imagick::COLORSPACE_LOG => 'LOG',
//            \Imagick::COLORSPACE_CMY => 'CMY',
//        ];
//
//        return $colorSpaceTypes;
//    }
//
//    public function getColorSpace()
//    {
//        return $this->getKey();
//    }
}
