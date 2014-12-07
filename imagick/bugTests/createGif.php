<?php


$aniGif = new Imagick();
$aniGif->setFormat("gif");

$imageFrames = 2;
$imageSize = 50;

$distanceBetweenCircles = 30 * $imageSize / 400;

$root2 = 1.414213562373095;


$palette = new Imagick();

$palette->newpseudoimage(256, 256, 'gradient:black-white');
$palette->quantizeImage(253, \Imagick::COLORSPACE_GRAY, 8, false, false);

    
for($count=0 ; $count<1 * $imageFrames ; $count++){

    echo "$count \n";
    
    $frame = new Imagick();
    $drawing = new ImagickDraw();

    $drawing->setFillColor('none');
    $drawing->setStrokeColor('rgba(64, 64, 64, 0.8)');
    $drawing->setStrokeWidth(4);
    
    $drawing->translate($imageSize / 2, $imageSize / 2);
    
    for ($diameter=0 ; $diameter<200*$root2 ; $diameter += $distanceBetweenCircles) {
        $offset = $distanceBetweenCircles * ($count % $imageFrames) / $imageFrames;
        
        $drawing->push();
        $drawing->rotate(180 * $count / (3 * $imageFrames ));

        $size = $diameter + $offset;
        
        if ($size == 0) {
            $size = 1;
        }
        
        //$mong = $count * 5 / $imageFrames
        
        $drawing->ellipse(0, 0, $size, $size * 2, 0, 360);
        //$drawing->circle(0, 0, $diameter + $offset, $diameter + $offset);

        $drawing->pop();
    }

    $frame->newImage($imageSize, $imageSize, "rgb(255, 255, 255)");
    
    $frame->drawimage($drawing);

    $frame->clutimage($palette);
    

    $frame->setImageDelay(2);
    $aniGif->addImage($frame);
}


$result = $aniGif->deconstructImages();


//there more than one file, so must be using writeImages()
//$aniGif->writeImages("./aTestGif.gif", true);
$result->writeImages("./testTLS.gif", true);

//header('Content-type: image/gif');
//$aniGif->getimageblob();

//echo file_get_contents("aTestGif.gif");


//echo  "done?";