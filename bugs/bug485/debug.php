<?php

declare(strict_types=1);

$canvas = new Imagick('top.png');
$im = new Imagick('bottom.png');
$im->compositeImage($canvas, Imagick::COMPOSITE_MULTIPLY, 0, 0);
$im->writeImage('dja_output_im6.png');


// magick composite -compose Multiply top.png bottom.png output_magick.png