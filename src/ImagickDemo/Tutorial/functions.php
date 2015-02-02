<?php

namespace ImagickDemo\Tutorial {

use Imagick;
    
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
    global $cacheImages;

    if (stripos($string, "Content-Type: image/") === 0) {
        $imageType = substr($string, strlen("Content-Type: image/"));
    }

    if ($cacheImages == false) {
        \header($string, $replace, $http_response_code);
    }
}


    
    
//Example Tutorial::fxAnalyzeImage
// Analyzes a one pixel wide image to make it easy to see what the
// gradient is doing
function fxAnalyzeImage(\Imagick $imagick) {
    
    $graphWidth = $imagick->getImageWidth();
    $sampleHeight = 20;
    $graphHeight = 128;
    $border = 2;

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
    $fillColor = new \ImagickPixel('none');
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(1);
    $draw->setFontSize(72);
    $draw->setStrokeAntiAlias(true);

    $x = 0;
    $points = [];
    
    foreach ($reds as $red) {
        $pos = $graphHeight - ($red * $graphHeight / 256);
        $points[] = ['x' => $x, 'y' => $pos];
        $x += 1;
    }

    $draw->polyline($points);

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
//Example end


//Example Tutorial::imagickComposite
function imagickComposite() {
    //Load the images
    $left = new \Imagick(realpath('images/im/holocaust_tn.gif'));
    $right = new \Imagick(realpath('images/im/spiral_stairs_tn.gif'));
    $gradient = new \Imagick(realpath('images/im/overlap_mask.png'));

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
//Example end


//Example Tutorial::imagickCompositeGen
function generateBlendImage($height, $overlap, $contrast = 10, $midpoint = 0.5) {
    $imagick = new \Imagick();
    $imagick->newPseudoImage($height, $overlap, 'gradient:black-white');
    $quantum = $imagick->getQuantum();
    $imagick->sigmoidalContrastImage(true, $contrast, $midpoint * $quantum);

    return $imagick;
}


function mergeImages(array $srcImages, $outputSize, $overlap, $contrast = 10, $blendMidpoint = 0.5, $horizontal = true) {

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

    $fadeLeftSide = generateBlendImage($blendWidth, $overlap, $contrast, $blendMidpoint);

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

function imagickCompositeGen($contrast = 10, $blendMidpoint = 0.5) {

    $size = 160;

    //Load the images 
    $output = mergeImages(
        [
            'images/lories/6E6F9109_480.jpg',
            'images/lories/IMG_1599_480.jpg',
            'images/lories/IMG_2561_480.jpg',
            'images/lories/IMG_2837_480.jpg',
            //'images/lories/IMG_4023.jpg',
        ],
        $size,
        0.2 * $size, //overlap
        $contrast,
        $blendMidpoint,
        true);

    //$output = generateBlendImage(200, 200, 5, 0.5);
    $output->setImageFormat('png');

    header("Content-Type: image/png");
    echo $output->getImageBlob();
}
//Example end


//Example Tutorial::edgeExtend
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
//Example end


//Example Tutorial::gradientReflection
function gradientReflection() {

    $im = new \Imagick(realpath('images/sample.png'));
    
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
//Example end


//Example Tutorial::psychedelicFont
function psychedelicFont() {
    $draw = new \ImagickDraw();
    $name = 'Danack';

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
//Example end


//Example Tutorial::psychedelicFontGif
function psychedelicFontGif($name = 'Danack') {

    set_time_limit(3000);

    $aniGif = new \Imagick();
    $aniGif->setFormat("gif");

    $maxFrames = 11;
    $scale = 0.25;

    for ($frame = 0; $frame < $maxFrames; $frame++) {

        $draw = new \ImagickDraw();

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
    echo $aniGif->getImagesBlob();
}
//Example end

    
//Example Tutorial::whirlyGif

function lerp($t, $a, $b) {
    return $a + ($t * ($b - $a));
}

class Dot {
    
    function __construct($color, $sequence, $numberDots) {
        $this->color = $color;
        $this->sequence = $sequence;
        $this->numberDots = $numberDots;
    }

    function calculateFraction($frame, $maxFrames, $timeOffset, $phaseMultiplier, $phaseDivider) {

        $frame = -$frame;
        
        $totalAngle = 2 * $phaseMultiplier;

        $fraction = ($frame / $maxFrames * 2);
        $fraction += $totalAngle * ($this->sequence / $this->numberDots);
        $fraction += (($this->sequence)) / ($phaseDivider);
        $fraction += $timeOffset;

        while ($fraction < 0) {
            //fmod does not work 'correctly' on negative numbers
            $fraction += 64;
        }

        $fraction = fmod($fraction, 2);
        
        if ($fraction > 1) {
            $unitFraction =  2 - $fraction;
        }
        else {
            $unitFraction = $fraction;
        }

        return $unitFraction * $unitFraction * (3 - 2 * $unitFraction);
    }
    
  
    
    function render(\ImagickDraw $draw, $frame, $maxFrames, $phaseMultiplier, $phaseDivider) {
        $innerDistance = 40;
        $outerDistance = 230;

        $sequenceFraction = $this->sequence / $this->numberDots;
        $angle = 2 * M_PI * $sequenceFraction;
        
        $trailSteps = 5;
        $trailLength = 0.1;
        
        $offsets = [
            100 => 0,
        ];
        
        for($i=0 ; $i<=$trailSteps ; $i++) {
            $key = intval(50 * $i / $trailSteps);
            $offsets[$key] = $trailLength * ($trailSteps - $i) / $trailSteps;
        }

        //TODO - using a pattern would make the circles look more natural
        //$draw->setFillPatternURL();

        foreach ($offsets as $alpha => $offset) {
            $distanceFraction = $this->calculateFraction($frame, $maxFrames, $offset, $phaseMultiplier, $phaseDivider);
            $distance = lerp($distanceFraction, $innerDistance, $outerDistance);
            $xOffset = $distance * sin($angle);
            $yOffset = $distance * cos($angle);
            $draw->setFillColor($this->color);
            $draw->setFillAlpha($alpha / 100);
            
            $draw->circle(
                $xOffset, $yOffset,
                $xOffset + 4, $yOffset + 4
            );
        }
    }
}


function whirlyGif($numberDots, $numberFrames, $loopTime, $backgroundColor, $phaseMultiplier, $phaseDivider) {
    $aniGif = new \Imagick();
    $aniGif->setFormat("gif");
    
    
    $maxFrames = $numberFrames;
    $frameDelay = ceil($loopTime / $maxFrames);

    $scale = 1;
    $startColor = new \ImagickPixel('red');
    $dots = [];

    $width = 500;
    $height = $width;
    
    for ($i=0 ; $i<$numberDots ; $i++) {
        $colorInfo = $startColor->getHSL();

        //Rotate the hue by 180 degrees
        $newHue = $colorInfo['hue'] + ($i / $numberDots);
        if ($newHue > 1) {
            $newHue = $newHue - 1;
        }

        //Set the ImagickPixel to the new color
        $color = new \ImagickPixel('#ffffff');
        $colorInfo['saturation'] *= 0.95;
        $color->setHSL($newHue, $colorInfo['saturation'], $colorInfo['luminosity']);

        $dots[] = new Dot($color, $i, $numberDots);
    }

    

    for ($frame = 0; $frame < $maxFrames; $frame++) {
        $draw = new \ImagickDraw();
        $draw->setStrokeColor('none');
        $draw->setFillColor('none');
        $draw->rectangle(0, 0, 500, 500);
        
        $draw->translate($width / 2, $height / 2);

        foreach($dots as $dot) {
            /** @var $dot Dot */
            $dot->render($draw, $frame, $maxFrames, $phaseMultiplier, $phaseDivider);
        }

        //Create an image object which the draw commands can be rendered into
        $imagick = new \Imagick();
        $imagick->newImage(500 * $scale, 500 * $scale, $backgroundColor);
        $imagick->setImageFormat("png");

        $imagick->setImageDispose(\Imagick::DISPOSE_PREVIOUS);

        //Render the draw commands in the ImagickDraw object
        //into the image.
        $imagick->drawImage($draw);
                
        $imagick->setImageDelay($frameDelay);
        $aniGif->addImage($imagick);
        $imagick->destroy();
    }

    //echo "Got here here and level is ".ob_get_level()."<br/>";
    $aniGif->setImageFormat('gif');
    
    $aniGif->setImageIterations(0); //loop forever
    $aniGif->mergeImageLayers(\Imagick::LAYERMETHOD_OPTIMIZEPLUS);


    header("Content-Type: image/gif");
    echo $aniGif->getImagesBlob();

//    $aniGif->writeImages("./smoothOut.gif", true);
}
//Example end

//Example Tutorial::svgExample
function svgExample() {

    $svg = <<< END
<?xml version="1.0"?>
<svg version='1.0' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='746' height='742' viewBox='-362 -388 746 742' encoding='UTF-8' standalone='no'>
    <defs>
        <ellipse id='ellipse' cx='36' cy='-56' rx='160' ry='320' />
        <g id='ellipses'>
            <use xlink:href='#ellipse' fill='#0000ff' />
            <use xlink:href='#ellipse' fill='#0099ff' transform='rotate(72)' />
        </g>
    </defs>
</svg>
END;

    
    
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
//Example end


//Example Tutorial::screenEmbed
function screenEmbed() {
    $overlay = new \Imagick(realpath("images/dickbutt.jpg"));
    $imagick = new \Imagick(realpath("images/Screeny.png"));

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
//Example end


//Example Tutorial::levelizeImage
function levelizeImage($blackPoint, $gamma,  $whitePoint) {
    $imagick = new \Imagick();
    $imagick->newPseudoimage(300, 300, 'gradient:black-white');
    $maxQuantum = $imagick->getQuantum();
    $imagick->evaluateimage(\Imagick::EVALUATE_POW, 1 / $gamma);
    
    //Adjust the scale from black to white to the new 'distance' between black and white
    $imagick->evaluateimage(\Imagick::EVALUATE_MULTIPLY, ($whitePoint - $blackPoint) / 100 );

    //Add move the black point to it's new value
    $imagick->evaluateimage(\Imagick::EVALUATE_ADD, ($blackPoint / 100) * $maxQuantum);
    $imagick->setFormat("png");

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
//Example end

//Example Tutorial::imageGeometryReset
function imageGeometryReset() {

    $draw = new \ImagickDraw();

    $draw->setFont("../fonts/Arial.ttf");
    $draw->setFontSize(48);
    $draw->setStrokeAntialias(true);
    $draw->setTextAntialias(true);
    $draw->setFillColor('#ff0000');

    $textOnly = new \Imagick();
    $textOnly->newImage(600, 300, "rgb(230, 230, 230)");
    $textOnly->setImageFormat('png');
    $textOnly->annotateImage($draw, 30, 40, 0, 'Your Text Here');
    $textOnly->trimImage(0);
    $textOnly->setImagePage($textOnly->getimageWidth(), $textOnly->getimageheight(), 0, 0);

    $distort = array(180);
    $textOnly->setImageVirtualPixelMethod(Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);

    $textOnly->setImageMatte( TRUE );
    $textOnly->distortImage(Imagick::DISTORTION_ARC, $distort, FALSE);

    $textOnly->setformat('png');

    header("Content-Type: image/png");
    echo $textOnly->getimageblob();
}
//Example end

    
}