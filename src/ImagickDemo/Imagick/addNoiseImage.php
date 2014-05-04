<?php

namespace ImagickDemo\Imagick;


class addNoiseImage extends ImagickExample {

    function renderImageURL() {
        return "<img src='/image/Imagick/addNoiseImage'/>";
    }

    function renderDescription() {

        //const NOISE_UNIFORM = 1;
        //const NOISE_GAUSSIAN = 2;
        //const NOISE_MULTIPLICATIVEGAUSSIAN = 3;
        //const NOISE_IMPULSE = 4;
        //const NOISE_LAPLACIAN = 5;
        //const NOISE_POISSON = 6;
        //const NOISE_RANDOM = 7;
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));


//const NOISE_UNIFORM = 1;
//const NOISE_GAUSSIAN = 2;
//const NOISE_MULTIPLICATIVEGAUSSIAN = 3;
//const NOISE_IMPULSE = 4;
//const NOISE_LAPLACIAN = 5;
//const NOISE_POISSON = 6;
//const NOISE_RANDOM = 7;


        $imagick->addNoiseImage(\Imagick::NOISE_POISSON);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }
}