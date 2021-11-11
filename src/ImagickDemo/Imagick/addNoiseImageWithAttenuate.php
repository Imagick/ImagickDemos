<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\AddNoiseImageControl;
use ImagickDemo\Imagick\Controls\AddNoiseImageWithAttenuateControl;

class addNoiseImageWithAttenuate extends \ImagickDemo\Example
{
    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public function renderTitle(): string
    {
        return "Imagick::addNoiseImageWithAttenuate";
    }

    public function renderDescription()
    {
        $output = "NOISE_UNIFORM = 1;
        NOISE_GAUSSIAN = 2;
        NOISE_MULTIPLICATIVEGAUSSIAN = 3;
        NOISE_IMPULSE = 4;
        NOISE_LAPLACIAN = 5;
        NOISE_POISSON = 6;
        NOISE_RANDOM = 7;  <br/>";

        return nl2br($output);
    }

    public static function getParamType(): string
    {
        return AddNoiseImageWithAttenuateControl::class;
    }
}
