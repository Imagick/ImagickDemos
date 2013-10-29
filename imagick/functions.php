<?php

/**
 * @param $width
 * @param $height
 * @param $colorPoints
 * @param $sparseMethod
 * @return \Imagick
 * @throws InvalidArgumentException
 */
function createGradientImage($width, $height, $colorPoints, $sparseMethod) {

    $imagick = new Imagick();
    $imagick->newImage($width, $height, "white");
    $imagick->setImageFormat("png");

    $barycentricPoints = array();

    foreach ($colorPoints as $colorPoint) {
        $barycentricPoints[] = $colorPoint[0] * $width;
        $barycentricPoints[] = $colorPoint[1] * $height;

        if (is_string($colorPoint[2])) {
            $imagickPixel = new ImagickPixel($colorPoint[2]);
        }
        else if ($colorPoint[2] instanceof ImagickPixel) {
            $imagickPixel = $colorPoint[2];
        }
        else{
            throw new \InvalidArgumentException("Value ".$colorPoint[2]." is neither a string nor an ImagickPixel class. Cannot use as a color.");
        }

        $red = $imagickPixel->getColorValue(Imagick::COLOR_RED);
        $green = $imagickPixel->getColorValue(Imagick::COLOR_GREEN);
        $blue = $imagickPixel->getColorValue(Imagick::COLOR_BLUE);
        $alpha = $imagickPixel->getColorValue(Imagick::COLOR_ALPHA);

        $barycentricPoints[] = $red;
        $barycentricPoints[] = $green;
        $barycentricPoints[] = $blue;
        $barycentricPoints[] = $alpha;
    }

    $imagick->sparseColorImage($sparseMethod, $barycentricPoints);

    return $imagick;
}