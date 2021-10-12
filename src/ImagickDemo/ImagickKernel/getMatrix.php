<?php

namespace ImagickDemo\ImagickKernel;

use ImagickDemo\Display;
use ImagickDemo\ImagickKernel\Controls\NullControl;

class getMatrix extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "get matrix";
    }


    public function renderDescription()
    {
        return "";
    }

    public function hasBespokeRender()
    {
        return true;
    }

    public function bespokeRender()
    {
//Example ImagickKernel::getMatrix
        $output = "The built-in kernel name 'ring' with parameters of '2,3.5':<br/>";
        $kernel = \ImagickKernel::fromBuiltIn(
            \Imagick::KERNEL_RING,
            "2,3.5"
        );
        $matrix = $kernel->getMatrix();
        $output .= Display::renderKernelTable($matrix);
//        $output .= "Or as an image: " . $this->renderCustomImageURL();
        $output .= "Or as an image: <img src='/customImage/ImagickKernel/getMatrix'/>";

        return $output;
//Example end
    }

    public function renderCustomImage()
    {
        $kernel = \ImagickKernel::fromBuiltIn(
            \Imagick::KERNEL_RING,
            "2,3.5"
        );

        $imagick = renderKernel($kernel);

        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }


    public static function getParamType(): string
    {
        return NullControl::class;
    }
}
