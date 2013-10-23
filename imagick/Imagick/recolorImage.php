<?php

$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$remapColor = [
    1, 0, 0,
    0, 0, 1,
    0, 1, 0,
];

//$remapColor = [
//    1.438, -0.122, -0.016,  0, 0, -0.03,
//    -0.062,  1.378, -0.016,  0, 0,  0.05,
//    -0.062, -0.122, 1.483,   0, 0, -0.02,
//];

$imagick->recolorImage($remapColor);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();