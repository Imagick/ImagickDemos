<?php

namespace ImagickDemo\Imagick;


class distort extends ImagickExample {

    function renderDescription() {

    }

    function renderImage() {
//http://www.imagemagick.org/Usage/distorts/


//convert checks.png -virtual-pixel gray \
//-distort Barrel "0.2 0.0 0.0 1.0"   barrel_checks_A.png
//  convert checks.png -virtual-pixel gray \
//-distort Barrel "0.0 0.2 0.0 1.0"   barrel_checks_B.png
//  convert checks.png -virtual-pixel gray \
//-distort Barrel "0.0 0.0 0.2 1.0"   barrel_checks_C.png
//  convert checks.png -virtual-pixel gray \
//-distort Barrel "0.0 0.0 0.0 1.2"   barrel_checks_D.png


    }
}

 