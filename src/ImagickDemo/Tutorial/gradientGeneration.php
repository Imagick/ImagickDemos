<?php

namespace ImagickDemo\Tutorial;

use ImagickDemo\Image;

class gradientGeneration extends \ImagickDemo\Example
{

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        $output = $this->renderDescription();
        $output .= $this->renderCustomImageURL([]);

        return $output;
    }

    public function renderTitle(): string
    {
        return "Gradient generation";
    }

    public function getCustomImageParams()
    {
        return [];
    }
    
    /**
     *
     */
    public function renderCustomImage()
    {
        $imagick = new \Imagick();
        $imagick->setcolorspace(\Imagick::COLORSPACE_GRAY);
        $imagick->newPseudoImage(10, 256, 'gradient:black-white');
        $imagick->evaluateimage(\Imagick::EVALUATE_POW, 0.5);
        Image::analyzeImage($imagick);
    }


    /**
     *
     */
    public function renderCustomImage123()
    {
        $imagick = new \Imagick();
        $imagick->newPseudoImage(10, 256, 'gradient:black-white');
        $imagick->evaluateimage(\Imagick::EVALUATE_SINE, 0.5);
        $imagick->normalizeImage();
        $imagick->evaluateimage(\Imagick::EVALUATE_COSINE, 8);
        Image::analyzeImage($imagick);
    }
}
