<?php

try{

$points = [
    1, 2, 1, 2, 1,
    1, 2, 3, 4, 5,
    1, 2, 3, 4, 5,
    400, 500, 3, 4, 5,
];

$imagick = new Imagick();
$imagick->newImage(500, 500, "white");
$imagick->setImageFormat("png");


$imagick->sparseColorImage(Imagick::SPARSECOLORMETHOD_POLYNOMIAL, $points);

header("Content-Type: image/png");
echo $imagick->getImageBlob();

}
catch(\Exception $e) {
    echo "Exception: ".$e->getMessage();
    echo "hmm";
}