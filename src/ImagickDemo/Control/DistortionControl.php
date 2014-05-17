<?php


namespace ImagickDemo\Control;


class DistortionControl extends OptionControl {

    function getName() {
        return \Imagick::DISTORTION_AFFINE;
    }

    function getDefaultOption() {
        return 'Affine';
    }

    function getOptions() {
        $images = [

            \Imagick::DISTORTION_AFFINE => 'Affine',
            \Imagick::DISTORTION_AFFINEPROJECTION => 'AFFINEPROJECTION',
            \Imagick::DISTORTION_ARC => 'Arc',
            \Imagick::DISTORTION_BILINEAR => 'Bilinear',
            \Imagick::DISTORTION_PERSPECTIVE => 'Perspective',
            \Imagick::DISTORTION_PERSPECTIVEPROJECTION => 'Perspective Projection',
            \Imagick::DISTORTION_SCALEROTATETRANSLATE => 'Scale rotate translate',
            \Imagick::DISTORTION_POLYNOMIAL => 'Polynomial',
            \Imagick::DISTORTION_POLAR => 'Polar',
            \Imagick::DISTORTION_DEPOLAR => 'Depolar',
            \Imagick::DISTORTION_BARREL => 'Barrel',
            \Imagick::DISTORTION_BARRELINVERSE => 'Barrel inverse',
            \Imagick::DISTORTION_SHEPARDS => 'Shepards',
            \Imagick::DISTORTION_SENTINEL => 'Sentinel',
            
            
        ];

        return $images;
    }
}

 