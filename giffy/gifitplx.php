<?php

//$ffmpeg = './ffmpeg-git-20140419-64bit-static/ffmpeg -loglevel panic';
$ffmpeg = './ffmpeg-git-20140419-64bit-static/ffmpeg ';

$convertExe = '/usr/local/bin/convert';

$sourceVideo = 'spider.mp4';

$sourceVideo = "./tree/Cutting the magic tree.mp4";

//hh:mm:ss.ms

//echo "current user is ".get_current_user();
//exit(0);

$frameSkip = 3;

$startTime = '00:00:33.00';
$endTime = '00:00:37.00';
$resize = '-s 480x270';

$frameRate = 25;



//frames 58
$width = 337;
$height = 343;

$startTime = '00:00:08.00';
$endTime = '00:00:15.00';

//$width = 480;
//$height = 270;


$date = date("Y_m_d_H_i_s");
$animDir = 'anim'.$date;
$outputDir = 'output'.$date;

$format = "-f image2 ./frames/%04d.png";

$dirCreated = @mkdir("frames", true);

//if (!$dirCreated) {
//    echo "Failed to create directory '$animDir'.";
//    exit(-2);
//}

$extractCommand = "$ffmpeg -ss $startTime -i \"$sourceVideo\" -t $endTime $format";

echo $extractCommand.PHP_EOL;

if (false) {
    exec($extractCommand , $output, $returnValue);


if ($returnValue) {
    echo "Something went wrong running ffmpeg: \n";
    var_dump($output);
    exit(0);
}

}

$fileArray = glob ("./frames/*.png");


$startFrame = 3;
$endFrame = 58 * 3;//count($fileArray);


$getName = function ($stub, $index) {
    return sprintf($stub, $index);
};

$getFilename = function ($index) use ($getName, $animDir) {
    $stub = "./frames/%04g.png";
    return $getName($stub, $index);
};



$frames = array_map($getFilename, range($startFrame, $endFrame, $frameSkip));

echo "There are ".count($frames)." frames \n";

$frameDelay = $frameSkip * 100 / ($frameRate);


$animation = new Imagick();




foreach ($frames as $frame) {
    echo "Adding file $frame\n";
    $imagickFrame = new Imagick($frame);
    //$frame->readImage($frame);

    //reduceNoiseImage
    $imagickFrame->despeckleImage();
    //$imagickFrame->reduceNoiseImage(0);

    $imagickFrame->resizeImage(0, $height, \Imagick::FILTER_LANCZOS, 2, false);

    
    
    

    $geo = $imagickFrame->getImageGeometry();
    $imagickFrame->cropImage($width, $height, ($geo['width'] - $width) / 2, 0);
    $imagickFrame->setImagePage($imagickFrame->getimageWidth(), $imagickFrame->getimageheight(), 0, 0);

    
    
    //$imagickFrame->gaussianBlurImage(1, 0.5);

    //$imagickFrame->orderedPosterizeImage("o8x8");
    //"o8x8,8"
    //"o8x8,10"
    
//    $identifyInfo = $imagickFrame->identifyimage();
//    var_dump($identifyInfo);

    $imagickFrame->writeImage($frame."debug.gif");
    
    //if (false) {
        $paletteImage = clone $imagickFrame;
        $paletteImage->quantizeImage(256, Imagick::COLORSPACE_YIQ, 0, false, false);
        
        //$imagickFrame->setImageDepth(8);
        //$imagickFrame->quantizeImage(15,Imagick::COLORSPACE_TRANSPARENT,0,false,false);
        //Imagick::mapImage ( Imagick $map , bool $dither )
        $imagickFrame->remapImage($paletteImage, Imagick::DITHERMETHOD_FLOYDSTEINBERG);
    //}
    
    
    
    
    
    //Imagick::DITHERMETHOD_RIEMERSMA
    //Imagick::DITHERMETHOD_FLOYDSTEINBERG
    
    //6.9meg
    //$imagickFrame->quantizeImage(255, Imagick::COLORSPACE_RGB, 0, true, false );
    
    //orderedPosterizeImage ( string $threshold_map [, int $channel = Imagick::CHANNEL_ALL ] )

    //posterizeImage ( int $levels , bool $dither )
    //$imagickFrame->remapimage()
        
    
    
    
    $imagickFrame->setImageDelay($frameDelay);
    $animation->addImage($imagickFrame);
}






//Zero default - 8 biggest tree
//$animation->quantizeImages(255, Imagick::COLORSPACE_RGB, 0, false, false );
//$animation->quantizeImages(255, Imagick::COLORSPACE_RGB, 8, true, false );

//Imagick::clutImage ( Imagick $lookup_table [, float $channel = Imagick::CHANNEL_DEFAULT ] )


$animation->setFormat('gif');
$animation->setImageFormat('gif');
$outputGif = $animation->deconstructImages();


$outputFilename = $animDir.".gif";


$outputGif->writeImages($outputFilename, true);

$filesize = filesize($outputFilename);

echo "output is $outputFilename, filesize is $filesize \n";
