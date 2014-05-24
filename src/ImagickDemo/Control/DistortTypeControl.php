<?php


namespace ImagickDemo\Control;


class DistortTypeControl extends OptionControl {

    function getName() {
        return 'distortion';
    }

    function getDefaultOption() {
        return \Imagick::DISTORTION_ARC;
    }

    function getOptions() {
        $distortions = [
            \Imagick::DISTORTION_AFFINE => "Affine",
            \Imagick::DISTORTION_AFFINEPROJECTION => "Affine projection",
            \Imagick::DISTORTION_ARC => "Arc",
            \Imagick::DISTORTION_BILINEAR => 'Bilinear',
            \Imagick::DISTORTION_PERSPECTIVE => 'Perspective',
            \Imagick::DISTORTION_PERSPECTIVEPROJECTION => 'Perspective projection',
            \Imagick::DISTORTION_SCALEROTATETRANSLATE => 'Scale rotate transform',
            \Imagick::DISTORTION_POLYNOMIAL => 'Polynomial',
            \Imagick::DISTORTION_POLAR => 'Polar',
            \Imagick::DISTORTION_DEPOLAR => 'Depolar',
            \Imagick::DISTORTION_BARREL => 'Barrel',
            \Imagick::DISTORTION_BARRELINVERSE => 'Barrel inverse',
            \Imagick::DISTORTION_SHEPARDS => 'Shepards',
            \Imagick::DISTORTION_SENTINEL => 'Sentinel',
        ];

        return $distortions;
    }

    function getDistortType() {
        return $this->getOption();
    }
}

 