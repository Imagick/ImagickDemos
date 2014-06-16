<?php

namespace ImagickDemo\Example {

    class functions {
        static function load() {
        }
    }

/**
 * Hack the header function to allow us to capture the image type,
 * while still having clean example code.
 *
 * @param $string
 * @param bool $replace
 * @param null $http_response_code
 */
function header($string, $replace = true, $http_response_code = null) {
    global $imageType;
    global $imageCache;

    if (stripos($string, "Content-Type: image/") === 0) {
        $imageType = substr($string, strlen("Content-Type: image/"));
    }

    if ($imageCache == false) {
        \header($string, $replace, $http_response_code);
    }
}
    

function fxAnalyzeImage() {

    $graphWidth = 256;
    $sampleHeight = 20;
    $graphHeight = 128;
    $border = 2;

    $imagick = new \Imagick();
    $imagick->newPseudoImage($graphWidth, 1, 'gradient:black-white');
    $arguments = array(9, -90);
    $imagick->functionImage(\Imagick::FUNCTION_SINUSOID, $arguments);

    $imageIterator = new \ImagickPixelIterator($imagick);

    $reds = [];

    foreach ($imageIterator as $pixels) { /* Loop trough pixel rows */
        foreach ($pixels as $pixel) { /* Loop through the pixels in the row (columns) */
            /** @var $pixel \ImagickPixel */
            $color = $pixel->getColor();
            $reds[] = $color['r'];
        }
        $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */
    }

    $draw = new \ImagickDraw();

    $strokeColor = new \ImagickPixel('red');
    $fillColor = new \ImagickPixel('red');
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(0);
    $draw->setFontSize(72);
    $draw->setStrokeAntiAlias(false);
    $previous = 0;
    $first = true;

    $x = 0;

    foreach ($reds as $red) {
        $pos = $graphHeight - ($red * $graphHeight / 256);

        if ($first !== true) {
            $draw->line($x-1, $previous, $x, $pos);
        }
        $x += 1;
        $previous = $pos;
        $first = false;
    }


    $plot = new \Imagick();
    $plot->newImage($graphWidth, $graphHeight, 'white');
    $plot->drawImage($draw);

    $outputImage = new \Imagick();
    $outputImage->newImage($graphWidth, $graphHeight + $sampleHeight, 'white');
    $outputImage->compositeimage($plot, \Imagick::COMPOSITE_ATOP, 0, 0);

    $imagick->resizeimage($imagick->getImageWidth(), $sampleHeight, \Imagick::FILTER_LANCZOS, 1);

    $outputImage->compositeimage($imagick, \Imagick::COMPOSITE_ATOP, 0, $graphHeight);
    $outputImage->borderimage('black', $border, $border);

    $outputImage->setImageFormat("png");
    header("Content-Type: image/png");
    echo $outputImage;
}




    function imagickComposite() {


    //Load the images
    $left = new \Imagick(realpath('../images/im/holocaust_tn.gif'));
    $right = new \Imagick(realpath('../images/im/spiral_stairs_tn.gif'));
    $gradient = new \Imagick(realpath('../images/im/overlap_mask.png'));

    //The right bit will be offset by a certain amount - avoid recalculating.
    $offsetX = $gradient->getImageWidth() - $right->getImageWidth();


    //Fade out the left part - need to negate the mask to
    //make math correct
    $gradient2 = clone $gradient;
    $gradient2->negateimage(false);
    $left->compositeimage($gradient2, \Imagick::COMPOSITE_COPYOPACITY, 0, 0);

    //Fade out the right part
    $right->compositeimage($gradient, \Imagick::COMPOSITE_COPYOPACITY, -$offsetX, 0);

    //Create a new canvas to render everything in to.
    $canvas = new \Imagick();
    $canvas->newImage($gradient->getImageWidth(), $gradient->getImageHeight(), new \ImagickPixel('black'));

    //Blend left half into final image
    $canvas->compositeimage($left, \Imagick::COMPOSITE_BLEND, 0, 0);

    //Blend Right half into final image
    $canvas->compositeimage($right, \Imagick::COMPOSITE_BLEND, $offsetX, 0);

    //Output the final image
    $canvas->setImageFormat('png');

    header("Content-Type: image/png");
    echo $canvas->getImageBlob();
}



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



    function imagickCompositeGen() {

        $size = 160;

        //Load the images 
        $output = mergeImages(
            [
                '../images/lories/6E6F9109_480.jpg',
                '../images/lories/IMG_1599_480.jpg',
                '../images/lories/IMG_2561_480.jpg',
                '../images/lories/IMG_2837_480.jpg',
                //'../images/lories/IMG_4023.jpg',
            ],
            $size,
            0.2 * $size, //overlap
            1,
            0.5,
            true);

        //$output = generateBlendImage(200, 200, 5, 0.5);
        $output->setImageFormat('png');

        header("Content-Type: image/png");
        echo $output->getImageBlob();
    }

    
    

    function edgeExtend($virtualPixelType, $imagePath) {
        $imagick = new \Imagick(realpath($imagePath));
        $imagick->setImageVirtualPixelMethod($virtualPixelType);

        $imagick->scaleimage(400, 300, true);

        $imagick->setbackgroundcolor('pink');
       
        $desiredWidth = 600;
        $originalWidth = $imagick->getImageWidth();

        //Make the image be the desired width.
        $imagick->sampleimage($desiredWidth, $imagick->getImageHeight());

        //Now scale, rotate, translate (aka affine project) it
        //to be how you want
        $points = array(//The x scaling factor is 0.5 when the desired width is double
            //the source width
            ($originalWidth / $desiredWidth), 0, //Don't scale vertically
            0, 1, //Offset the image so that it's in the centre
            ($desiredWidth - $originalWidth) / 2, 0);

        $imagick->distortImage(\Imagick::DISTORTION_AFFINEPROJECTION, $points, false);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

//Fyi it may be easier to think of the affine transform by 
//how it works for a rotation:
//$affineRotate = array(
//    "sx" => cos($angle),
//    "sy" => cos($angle),
//    "rx" => sin($angle),
//    "ry" => -sin($angle),
//    "tx" => 0,
//    "ty" => 0,
//);
    }


function gradientReflection() {

    $im = new \Imagick(realpath('../images/sample.png'));

    $reflection = clone $im;

    $reflection->flipImage();

    $reflection->cropImage($im->getImageWidth(), $im->getImageHeight() * 0.75, 0, 0);

    $gradient = new \Imagick();
    $gradient->newPseudoImage(
         $reflection->getImageWidth(),
         $reflection->getImageHeight(),
         //Putting spaces in the rgba string is bad
         'gradient:rgba(255,0,255,0.6)-rgba(255,255,0,0.99)'
    );

    $reflection->compositeimage(
       $gradient,
       \Imagick::COMPOSITE_DSTOUT,
       0, 0
    );

    $canvas = new \Imagick();
    $canvas->newImage($im->getImageWidth(), $im->getImageHeight() * 1.75, new \ImagickPixel('rgba(255, 255, 255, 0)'));
    $canvas->compositeImage($im, \Imagick::COMPOSITE_BLEND, 0, 0);
    $canvas->setImageFormat('png');
    $canvas->compositeImage($reflection, \Imagick::COMPOSITE_BLEND, 0, $im->getImageHeight());

    $canvas->stripImage();
    $canvas->setImageFormat('png');
    header('Content-Type: image/png');
    echo $canvas;

}


function psychedelicFont() {
    $draw = new \ImagickDraw();
    $name = 'Danack';

    if (array_key_exists('name', $_REQUEST) == true) {
        $name = $_REQUEST['name'];
    }

    $draw->setStrokeOpacity(1);

    $draw->setFillColor('black');
    $draw->setFont("../fonts/CANDY.TTF");

    $draw->setfontsize(150);

    for ($strokeWidth = 25; $strokeWidth > 0; $strokeWidth--) {
        $hue = intval(170 + $strokeWidth * 360 / 25);
        $draw->setStrokeColor("hsl($hue, 255, 128)");
        $draw->setStrokeWidth($strokeWidth * 3);
        $draw->annotation(60, 165, $name);
    }

    //Create an image object which the draw commands can be rendered into
    $imagick = new \Imagick();
    $imagick->newImage(650, 230, "#eee");
    $imagick->setImageFormat("png");

    //Render the draw commands in the ImagickDraw object
    //into the image.
    $imagick->drawImage($draw);

    //Send the image to the browser
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}





function psychedelicFontGif() {

    set_time_limit(3000);

    $aniGif = new \Imagick();
    $aniGif->setFormat("gif");

    $maxFrames = 11;
    $scale = 0.25;

    for ($frame = 0; $frame < $maxFrames; $frame++) {

        $draw = new \ImagickDraw();

        $name = 'Danack';

        if (array_key_exists('name', $_REQUEST) == true) {
            $name = $_REQUEST['name'];
        }

        $draw->setStrokeOpacity(1);


        $draw->setFont("../fonts/CANDY.TTF");

        $draw->setfontsize(150 * $scale);

        for ($strokeWidth = 25; $strokeWidth > 0; $strokeWidth--) {
            $hue = intval(fmod(($frame * 360 / $maxFrames) + 170 + $strokeWidth * 360 / 25, 360));
            $color = "hsl($hue, 255, 128)";
            $draw->setStrokeColor($color);
            $draw->setFillColor($color);
            $draw->setStrokeWidth($strokeWidth * 3 * $scale);
            $draw->annotation(60 * $scale, 165 * $scale, $name);
        }

        $draw->setStrokeColor('none');
        $draw->setFillColor('black');
        $draw->setStrokeWidth(0);
        $draw->annotation(60 * $scale, 165 * $scale, $name);



        //Create an image object which the draw commands can be rendered into
        $imagick = new \Imagick();
        $imagick->newImage(650 * $scale, 230 * $scale, "#eee");
        $imagick->setImageFormat("png");

        //Render the draw commands in the ImagickDraw object
        //into the image.
        $imagick->drawImage($draw);

        $imagick->setImageDelay(5);
        $aniGif->addImage($imagick);

        $imagick->destroy();
    }

    $aniGif->setImageIterations(0); //loop forever
    $aniGif->deconstructImages();

    header("Content-Type: image/gif");
    echo $aniGif->getimagesblob();
    //there more than one file, so must be using writeImages()
    //$aniGif->writeImages("../var/cache/imageCache/Danack.gif", true);
}


function svgExample() {

    $svg = '<?xml version="1.0"?>
    <svg width="120" height="120"
         viewPort="0 0 120 120" version="1.1"
         xmlns="http://www.w3.org/2000/svg">

        <defs>
            <clipPath id="myClip">
                <circle cx="30" cy="30" r="20"/>
                <circle cx="70" cy="70" r="20"/>
            </clipPath>
        </defs>

        <rect x="10" y="10" width="100" height="100"
              clip-path="url(#myClip)"/>

    </svg>';

        $image = new \Imagick();

        $image->readImageBlob($svg);
        $image->setImageFormat("jpg");
        header("Content-Type: image/jpg");
        echo $image;
    }


function screenEmbed() {
    $overlay = new \Imagick(realpath("../images/dickbutt.jpg"));
    $imagick = new \Imagick(realpath("../images/Screeny.png"));

    $overlay->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);

    $width = $overlay->getImageWidth();
    $height = $overlay->getImageHeight();

        $offset = 332.9;

    $points = array(    
        0, 0, 364 - $offset, 51, 
        $width, 0, 473.4 - $offset, 23, 
        0, $height, 433.5 - $offset, 182, 
        $width, $height, 523 - $offset, 119.4
    );

    $overlay->modulateImage(97, 100, 0);
    $overlay->distortImage(\Imagick::DISTORTION_PERSPECTIVE, $points, true);

    $imagick->compositeImage($overlay, \Imagick::COMPOSITE_OVER, 364.5 - $offset, 23.5);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();

}

    
}