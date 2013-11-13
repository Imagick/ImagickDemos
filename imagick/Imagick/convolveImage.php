<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));



//setImageBias

$edgeFindingKernel = [
   -1, -1, -1,
    -1, 8,   -1,
    -1, -1, -1,
];

$imagick->convolveImage($edgeFindingKernel);


header("Content-Type: image/jpg");
echo $imagick->getImageBlob();