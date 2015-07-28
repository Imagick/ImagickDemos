<?php

namespace ImagickDemo\Tutorial;

class colorspaceLinearity extends \ImagickDemo\Example
{
    public function render()
    {
        $output = $this->renderDescription();
        $output .= $this->renderCustomImageURL();

        return $output;
    }

    public function renderDescription()
    {
        return "Colorspaces are weird: http://www.imagemagick.org/script/color-management.php";
    }

    public function renderCustomImage()
    {
        $size = 400;
        $imagick1 = new \Imagick();
        //$imagick1->newPseudoImage($size, $size, 'gradient:black-white');

        $imagick1->setColorspace(\Imagick::COLORSPACE_GRAY);
        //$imagick1->setColorspace(\Imagick::COLORSPACE_RGB);
        //$imagick1->setColorspace(\Imagick::COLORSPACE_SRGB);
        $imagick1->setColorspace(\Imagick::COLORSPACE_CMYK);
        
        $imagick1->newPseudoImage($size, $size, 'gradient:gray(100%)-gray(0%)');
        $imagick1->setFormat('png');
        //analyzeImage($imagick1);
        header("Content-Type: image/png");
        echo $imagick1->getImageBlob();
    }
}
