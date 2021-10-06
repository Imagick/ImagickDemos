<?php

namespace ImagickDemo\Tutorial;

class functionImage extends \ImagickDemo\Example
{
    private $control;
    
    public function __construct($control)
    {
        $this->control = $control;
    }

    public function renderTitle(): string
    {
        return "Function image";
    }

    public function render()
    {
        $output = $this->renderDescription();
        $output .= $this->renderCustomImageURL();

        return $output;
    }

    public function renderDescription()
    {
        return "";
    }

    public function renderCustomImage()
    {
        $size = 200;
        $imagick1 = new \Imagick();
        $imagick1->newPseudoImage($size, $size, 'gradient:black-white');
        $arguments = array(9, -90);
        $imagick1->functionImage(\Imagick::FUNCTION_SINUSOID, $arguments);

        $imagick2 = new \Imagick();
        $imagick2->newPseudoImage($size, $size, 'gradient:black-white');
        $arguments = array(0.5, 0);
        $imagick2->functionImage(\Imagick::FUNCTION_SINUSOID, $arguments);
        $imagick1->compositeimage($imagick2, \Imagick::COMPOSITE_MULTIPLY, 0, 0);

        $imagick1->setimageformat('png');

        header("Content-Type: image/png");
        echo $imagick1->getImageBlob();
    }
}
