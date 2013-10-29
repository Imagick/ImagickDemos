<?php

require_once "../functions.php";



$points = [
    [0.30, 0.10, 'red'],
    [0.10, 0.80, 'blue'],
    [0.70, 0.60, 'lime'],
    [0.80, 0.20, 'yellow'],
];

$imagick = createGradientImage(500, 500, $points, Imagick::SPARSECOLORMETHOD_BILINEAR);

header("Content-Type: image/png");
echo $imagick->getImageBlob();