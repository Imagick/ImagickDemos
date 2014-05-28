<?php


$aniGif = new Imagick();
$aniGif->setFormat("gif");

$imageFrames = 80;
$imageSize = 200;

$distanceBetweenCircles = 30 * $imageSize / 400;

$root2 = 1.414213562373095;


//optimizeImageLayers needs to use result


//$palette = new Imagick();

//$palette->newpseudoimage(256, 256, 'gradient:black-white');
//$palette->quantizeImage(253, \Imagick::COLORSPACE_GRAY, 8, false, false);


$background = new Imagick();
$background->newpseudoimage($imageSize, $imageSize, "plasma:tomato-steelblue");

$blackWhite = new Imagick();
$blackWhite->newpseudoimage($imageSize, $imageSize, "gradient:black-white");


$backgroundPalette = clone $background;
$backgroundPalette->quantizeImage(240, \Imagick::COLORSPACE_RGB, 8, false, false);

$blackWhitePalette = clone $blackWhite;
$blackWhitePalette->quantizeImage(16, \Imagick::COLORSPACE_RGB, 8, false, false);

$backgroundPalette->addimage($blackWhitePalette);

for($count=0 ; $count<$imageFrames ; $count++){

    echo "$count \n";
    
    
    $drawing = new ImagickDraw();

    $drawing->setFillColor('white');
    $drawing->setStrokeColor('rgba(64, 64, 64, 0.8)');
    $strokeWidth = 4;
    $drawing->setStrokeWidth($strokeWidth);

    $circleRadius = 20;
    
    $distanceToMove = $imageSize + (($circleRadius + $strokeWidth) * 2);
    $offset = ($distanceToMove * $count / ($imageFrames -1)) - ($circleRadius + $strokeWidth);
    
    $drawing->translate($offset, $imageSize / 2);
    
    $drawing->circle(0, 0, $circleRadius, 0);
    
    //$frame->newImage($imageSize, $imageSize, "rgb(255, 255, 255)");

    $frame = clone $background;
    
    $frame->drawimage($drawing);
    $frame->clutimage($backgroundPalette);

    $frame->setImageDelay(10);
    $aniGif->addImage($frame);
}


$result = $aniGif->deconstructImages();


//there more than one file, so must be using writeImages()
$aniGif->writeImages("./aTestGif.gif", true);
$result->writeImages("./aTestGif_deconstructed.gif", true);

//header('Content-type: image/gif');
//$aniGif->getimageblob();

//echo file_get_contents("aTestGif.gif");


//echo  "done?";