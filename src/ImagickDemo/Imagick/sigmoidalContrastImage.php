<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\SigmoidalContrastImageControl;

class sigmoidalContrastImage extends \ImagickDemo\Example
{
    public function renderDescription()
    {
        // Why didn't this doc get picked up?
        $html = <<< HTML
Adjusts the contrast of an image with a non-linear sigmoidal contrast algorithm. Increase the contrast of the image using a sigmoidal transfer function without saturating highlights or shadows. Contrast indicates how much to increase the contrast (0 is none; 3 is typical; 20 is pushing it); mid-point indicates where midtones fall in the resultant image (0 is white; 50 is middle-gray; 100 is black). Set sharpen to true to increase the image contrast otherwise the contrast is reduced.
HTML;


        return $html;
    }

    public function renderTitle(): string
    {
        return "Imagick::sigmoidalContrastImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }

    public function hasOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return SigmoidalContrastImageControl::class;
    }
}
