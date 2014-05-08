<?php

namespace ImagickDemo\Example;


function generateBlendImage($height, $overlap, $contrast = 10, $midpoint = 0.5) {
    $imagick = new \Imagick();
    $imagick->newPseudoImage($height, $overlap, 'gradient:black-white');
    $quanta = $imagick->getQuantumRange();
    $imagick->sigmoidalContrastImage(true, $contrast, $midpoint * $quanta["quantumRangeLong"]);

    return $imagick;
}


function mergeImages(array $srcImages, $outputSize, $overlap, $contrast = 10, $midpoint = 0.5, $horizontal = true) {

    $images = array();
    $newImageWidth = 0;
    $newImageHeight = 0;

    if ($horizontal == true) {
        $resizeWidth = 0;
        $resizeHeight = $outputSize;
    }
    else {
        $resizeWidth = $outputSize;
        $resizeHeight = 0;
    }
    
    $blendWidth = 0;
    
    foreach ($srcImages as $srcImage) {
        $nextImage = new \Imagick(realpath($srcImage));
        $nextImage->resizeImage($resizeWidth, $resizeHeight, \Imagick::FILTER_LANCZOS, 0.5);

        if ($horizontal == true) {
            $newImageWidth += $nextImage->getImageWidth();
            $blendWidth = $nextImage->getImageHeight();
        }
        else {
            //$newImageWidth = $nextImage->getImageWidth();
            $blendWidth = $nextImage->getImageWidth();
            $newImageHeight += $nextImage->getImageHeight();
        }

        $images[] = $nextImage;
    }

    if ($horizontal == true) {
        $newImageWidth -= $overlap * (count($srcImages) - 1);
        $newImageHeight = $outputSize;
    }
    else {
        $newImageWidth = $outputSize;
        $newImageHeight -= $overlap * (count($srcImages) - 1);
    }

    if ($blendWidth == 0) {
        throw new \Exception("Failed to read source images");
    }

    $fadeLeftSide = generateBlendImage($blendWidth, $overlap, $contrast, $midpoint);

    if ($horizontal == true) {
        //We are placing the images horizontally.
        $fadeLeftSide->rotateImage('black', -90);
    }

    //Fade out the left part - need to negate the mask to
    //make math correct
    $fadeRightSide = clone $fadeLeftSide;
    $fadeRightSide->negateimage(false);

    //Create a new canvas to render everything in to.
    $canvas = new \Imagick();
    $canvas->newImage($newImageWidth, $newImageHeight, new \ImagickPixel('black'));

    $count = 0;

    $imagePositionX = 0;
    $imagePositionY = 0;

    /** @var $image \Imagick */
    foreach ($images as $image) {
        $finalBlending = new \Imagick();
        $finalBlending->newImage($image->getImageWidth(), $image->getImageHeight(), 'white');

        if ($count != 0) {
            $finalBlending->compositeImage($fadeLeftSide, \Imagick::COMPOSITE_ATOP, 0, 0);
        }

        $offsetX = 0;
        $offsetY = 0;
        
        if ($horizontal == true) {
            $offsetX = $image->getImageWidth() - $overlap;
        }
        else {
            $offsetY = $image->getImageHeight() - $overlap;
        }

        if ($count != count($images) - 1) {
            $finalBlending->compositeImage($fadeRightSide, \Imagick::COMPOSITE_ATOP, $offsetX, $offsetY);
        }

        $image->compositeImage($finalBlending, \Imagick::COMPOSITE_COPYOPACITY, 0, 0);
        $canvas->compositeimage($image, \Imagick::COMPOSITE_BLEND, $imagePositionX, $imagePositionY);

        if ($horizontal == true) {
            $imagePositionX = $imagePositionX + $image->getImageWidth() - $overlap;
        }
        else {
            $imagePositionY = $imagePositionY + $image->getImageHeight() - $overlap;
        }
        $count++;
    }

    return $canvas;
}


class imagickCompositeGen extends \ImagickDemo\ExampleWithoutControl {

    function renderTitle() {
        return "";
    }

    function renderDescription() {
        return "Composite a set of images into a row with a smooth transition between each image.";
    }

    function renderImage() {

        $size = 160;
        
        //Load the images 
        $output = mergeImages(
            [
                '../images/lories/6E6F9109.jpg',
                '../images/lories/IMG_1599.jpg', 
                '../images/lories/IMG_2561.jpg',
                '../images/lories/IMG_2837.jpg',
                //'../images/lories/IMG_4023.jpg',
            ],
            $size,
            0.10 * $size,
            2,
            0.5,
            true);

        //$output = generateBlendImage(200, 200, 5, 0.5);
        $output->setImageFormat('png');

        header("Content-Type: image/png");
        echo $output->getImageBlob();
    }
}