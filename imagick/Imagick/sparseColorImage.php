<?php

try{

function createGradientImage($width, $height, $colorPoints) {
    //Create an image object which the draw commands can be rendered into
    $imagick = new Imagick();
    $imagick->newImage($width, $width, "white");
    $imagick->setImageFormat("png");



    $barycentricPoints = array();

    foreach ($colorPoints as $colorPoint) {


        $barycentricPoints[] = $colorPoint[0] * $width;
        $barycentricPoints[] = $colorPoint[1] * $height;
        $imagickPixel = new ImagickPixel($colorPoint[2]);
        $red = $imagickPixel->getColorValue(Imagick::COLOR_RED);
        $green = $imagickPixel->getColorValue(Imagick::COLOR_GREEN);
        $blue = $imagickPixel->getColorValue(Imagick::COLOR_BLUE);
        $alpha = $imagickPixel->getColorValue(Imagick::COLOR_ALPHA);

        $barycentricPoints[] = $red;
        $barycentricPoints[] = $green;
        $barycentricPoints[] = $blue;
        $barycentricPoints[] = $alpha;

        //$barycentricPoints += $barycentricPoint;
    }

//    var_dump($barycentricPoints);
//    exit(0);


    $imagick->sparseColorImage(Imagick::SPARSECOLORMETHOD_BARYCENTRIC, $barycentricPoints);

    return $imagick;
}


$points = [
    [0, 0, 'skyblue'],
    [-1, 1, 'skyblue'],
    [1, 1, 'black'],
];


$imagick = createGradientImage(500, 500, $points);

//    exit(0);


header("Content-Type: image/png");
echo $imagick->getImageBlob();


//    const SPARSECOLORMETHOD_UNDEFINED = 0;
//    const SPARSECOLORMETHOD_BARYCENTRIC = 1;
//    const SPARSECOLORMETHOD_BILINEAR = 7;
//    const SPARSECOLORMETHOD_POLYNOMIAL = 8;
//    const SPARSECOLORMETHOD_SPEPARDS = 16;
//    const SPARSECOLORMETHOD_VORONOI = 18;

}
catch(\Exception $e) {
    echo "Exception: ".$e->getMessage();
    echo "hmm";
}