<?php

require_once "../functions.php";

//Load the images 
$output = mergeImages(10);

//Output the final image
$output->setImageFormat('png');

header("Content-Type: image/png");
echo $output->getImageBlob();

exit(0);


function generateBlendImage($width, $height, $overlap) {

    $offsetX = ($width - $overlap) / 2;
    
    $points = [
        [$offsetX, 0,  "black"],
        [$offsetX, $height, "black"],
        [$offsetX + $overlap, 0, "white"],
        [$offsetX + $overlap, $height, "white"],
    ];

    $imagick = createGradientImage($width, $height, $points, Imagick::SPARSECOLORMETHOD_BILINEAR, true);

    return $imagick;
}


function mergeImages($overlap, $blendWidth = 0.2) {

    $left = new Imagick(realpath('../images/composite1.jpg'));
    $right = new Imagick(realpath('../images/composite2.jpg'));

    $newImageWidth = $left->getImageWidth() + $right->getImageWidth() - $overlap;

    $gradient = generateBlendImage($newImageWidth, $left->getImageHeight(), $overlap);
    
    //The right bit will be offset by a certain amount - avoid recalculating.
    $offsetX = $gradient->getImageWidth() - $right->getImageWidth();

    //Fade out the left part - need to negate the mask to
    //make math correct
    $gradient2 = clone $gradient;
    $gradient2->negateimage(false);
    $left->compositeimage(
        $gradient2,
        Imagick::COMPOSITE_COPYOPACITY,
        0, 0
    );

    //Fade out the right part
    $right->compositeimage(
        $gradient,
        Imagick::COMPOSITE_COPYOPACITY,
        -$offsetX, 0
    );
    
    //Create a new canvas to render everything in to.
    $canvas = new Imagick();
    $canvas->newImage($gradient->getImageWidth(), $gradient->getImageHeight(), new ImagickPixel('black'));
    
    //Blend left half into final image
    $canvas->compositeimage(
        $left,
        Imagick::COMPOSITE_ATOP,
        0, 0
    );
    
//    //Blend Right half into final image
    $canvas->compositeimage(
        $right,
        Imagick::COMPOSITE_BLEND,
        $offsetX, 0
    );

    return $canvas;
}

