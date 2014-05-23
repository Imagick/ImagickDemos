<?php

namespace ImagickDemo\Imagick;


class addNoiseImage extends \ImagickDemo\Example {

    function render() {
        $output = "NOISE_UNIFORM = 1;
        NOISE_GAUSSIAN = 2;
        NOISE_MULTIPLICATIVEGAUSSIAN = 3;
        NOISE_IMPULSE = 4;
        NOISE_LAPLACIAN = 5;
        NOISE_POISSON = 6;
        NOISE_RANDOM = 7;  <br/>";

        $output .= $this->renderImageURL();
        
        return $output;
    }


}