<?php

namespace ImagickDemo\ImagickKernel;

use ImagickDemo\Display;
use ImagickDemo\ImagickKernel\Params\NullControl;

class getMatrix extends \ImagickDemo\Example
{
    public function renderDescription()
    {
        return "Get the 2d matrix of values used in this kernel. The elements are either float for elements that are used or 'false' if the element should be skipped.";
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

        $output .= "Or as an image: " . $this->renderCustomImageURL();

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

    public function hasReactControls(): bool
    {
        return true;
    }

    public static function getParamType(): string
    {
        return NullControl::class;
    }
}
