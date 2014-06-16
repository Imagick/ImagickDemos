<?php

namespace ImagickDemo\Imagick {
 
    class functions {
        static function load() {}
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

//Example Imagick::adaptiveBlurImage
function adaptiveBlurImage($imagePath, $radius, $sigma, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->adaptiveBlurImage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


function adaptiveResizeImage($imagePath, $width, $height, $bestFit) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->adaptiveResizeImage($width, $height, $bestFit);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::adaptiveSharpenImage
function adaptiveSharpenImage($imagePath, $radius, $sigma, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->adaptiveSharpenImage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::adaptiveThresholdImage
function adaptiveThresholdImage($imagePath, $width, $height, $adaptiveOffset) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->adaptiveThresholdImage($width, $height, $adaptiveOffset);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::addNoiseImage
function addNoiseImage($noiseType, $imagePath, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->addNoiseImage($noiseType, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//TODO - separate sx, sy etc controls.
//Example Imagick::affineTransformImage
function affineTransformImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $draw = new \ImagickDraw();

    $angle = 40 ;

    $affineRotate = array(
        "sx" => cos($angle), "sy" => cos($angle), 
        "rx" => sin($angle), "ry" => -sin($angle), 
        "tx" => 0, "ty" => 0,);

    $draw->affine($affineRotate);

    $imagick->affineTransformImage($draw);

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//TODO - add strokeWidth + fontSize control
//Example Imagick::annotateImage
function annotateImage($imagePath, $strokeColor, $fillColor) {
    $imagick = new \Imagick(realpath($imagePath));

    $draw = new \ImagickDraw();
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);

    $draw->setStrokeWidth(2);
    $draw->setFontSize(36);

    $draw->setFont("../fonts/Arial.ttf");
    $imagick->annotateimage($draw, 40, 40, 0, "Lorem Ipsum!");

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::autoLevelImage
function autoLevelImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->autoLevelImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::averageImages
function averageImages($imagePath) {

    $imagick = new \Imagick(realpath($imagePath));
    //$imagick2 = new \Imagick(realpath("../images/TestImage2.jpg"));
    //$imagick->addImage($imagick2);
    //This kills PHP  - but the function is deprecated, so let's just ignore it
    $averageImage = @$imagick->averageImages();

    $averageImage->setImageType('jpg');
    header("Content-Type: image/jpg");
    echo $averageImage->getImageBlob();
}

//Example Imagick::blackThresholdImage
function blackThresholdImage($imagePath, $thresholdColor) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->blackthresholdimage($thresholdColor);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::blueShiftImage
function blueShiftImage($imagePath, $blueShift) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->blueShiftImage($blueShift);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::blurImage
function blurImage($imagePath, $radius, $sigma, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->blurImage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::borderImage
function borderImage($imagePath, $color, $width, $height) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->borderImage($color, $width, $height);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::brightnessContrastImage
function brightnessContrastImage($imagePath, $brightness, $contrast, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->brightnessContrastImage($brightness, $contrast, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::charcoalImage
function charcoalImage($imagePath, $radius, $sigma) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->charcoalImage($radius, $sigma);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::chopImage
function chopImage($imagePath, $startX, $startY, $width, $height) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->chopImage($width, $height, $startX, $startY);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::clipImage
function clipImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->clipImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//TODO - this function appears to make no sense
//Example Imagick::clutImage
function clutImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    //$imagick->quantizeImage(16, \Imagick::COLORSPACE_YIQ, 8, true, false);
    $clutImagick = new \Imagick(realpath("../images/webSafe.png"));
    $imagick->clutImage($clutImagick);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::colorFloodfillImage
function colorFloodfillImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $border = new \ImagickPixel('red');
    $flood = new \ImagickPixel('rgb(128, 32, 128)');
    @$imagick->colorFloodfillImage(
             $flood,
                 0,
                 $border,
                 5, 5
    );
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::colorizeImage
function colorizeImage($imagePath, $color, $opacity) {
    $imagick = new \Imagick(realpath($imagePath));
    $opacity = $opacity / 255.0;
    $opacityColor = new \ImagickPixel("rgba(0, 0, 0, $opacity)");
    $imagick->colorizeImage($color, $opacityColor);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//TODO - allow a color matrix to be passed in.
//TODO - understand what a color matrix is...
//Example Imagick::colorMatrixImage
function colorMatrixImage($imagePath) {

    $imagick = new \Imagick(realpath($imagePath));

    $colorMatrix = [
        1.5, 0.0, 0.0, 0.0, 0.0, -0.157,
        0.0, 1.0, 0.5, 0.0, 0.0, -0.157,
        0.0, 0.0, 1.5, 0.0, 0.0, -0.157,
        0.0, 0.0, 0.0, 1.0, 0.0,  0.0,
        0.0, 0.0, 0.0, 0.0, 1.0,  0.0,
        0.0, 0.0, 0.0, 0.0, 0.0,  1.0
    ];


    $imagick->colorMatrixImage($colorMatrix);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::compositeImage
function compositeImage() {

    $img1 = new \Imagick();
    $img1->readImage(realpath("../images/Biter_500.jpg"));

    $img2 = new \Imagick();
    $img2->readImage(realpath("../images/Skyline_400.jpg"));

    $img1->resizeimage(
         $img2->getImageWidth(),
             $img2->getImageHeight(),
             \Imagick::FILTER_LANCZOS,
             1
    );

    $opacity = new \Imagick();

    $opacity->newPseudoImage($img1->getImageHeight(), $img1->getImageWidth(), "gradient:gray(10%)-gray(90%)");
    $opacity->rotateimage('black', 90);

    $img2->compositeImage($opacity, \Imagick::COMPOSITE_COPYOPACITY, 0, 0);
    $img1->compositeImage($img2, \Imagick::COMPOSITE_ATOP, 0, 0);

    header("Content-Type: image/jpg");
    echo $img1->getImageBlob();
}

//Example Imagick::contrastImage
function contrastImage($imagePath, $contrastType) {
    $imagick = new \Imagick(realpath($imagePath));
    if ($contrastType != 2) {
        $imagick->contrastImage($contrastType);
    }

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Todo - allow a convolve control :-P
//Example Imagick::convolveImage
function convolveImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $edgeFindingKernel = [-1, -1, -1, -1, 8, -1, -1, -1, -1,];

    //TODO - this does nothing.
    $imagick->setImageBias(0.5 * \Imagick::getQuantum());
    
    $imagick->convolveImage($edgeFindingKernel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::cropImage
function cropImage($imagePath, $startX, $startY, $width, $height) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->cropImage($width, $height, $startX, $startY);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::deskewImage
function deskewImage($threshold) {

    $imagick = new \Imagick(realpath("../images/NYTimes-Page1-11-11-1918.jpg"));

    $deskewImagick = clone $imagick;
    
    //This is the only thing required for deskewing.
    $deskewImagick->deskewImage($threshold);

    //The rest of this example is to make the result obvious - because
    //otherwise the result is not obvious.
    $trim = 9;

    $deskewImagick->cropImage($deskewImagick->getImageWidth() - $trim, $deskewImagick->getImageHeight(), $trim, 0);
    $imagick->cropImage($imagick->getImageWidth() - $trim, $imagick->getImageHeight(), $trim, 0);
    $deskewImagick->resizeimage($deskewImagick->getImageWidth() / 2, $deskewImagick->getImageHeight() / 2, \Imagick::FILTER_LANCZOS, 1);
    $imagick->resizeimage($imagick->getImageWidth() / 2, $imagick->getImageHeight() / 2, \Imagick::FILTER_LANCZOS, 1);
    $newCanvas = new \Imagick();
    $newCanvas->newimage($imagick->getImageWidth() + $deskewImagick->getImageWidth() + 20, $imagick->getImageHeight(), 'red', 'jpg');
    $newCanvas->compositeimage($imagick, \Imagick::COMPOSITE_COPY, 5, 0);
    $newCanvas->compositeimage($deskewImagick, \Imagick::COMPOSITE_COPY, $imagick->getImageWidth() + 10, 0);

    header("Content-Type: image/jpg");
    echo $newCanvas->getImageBlob();
}

//Example Imagick::despeckleImage
function despeckleImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->despeckleImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::enhanceImage
function enhanceImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->enhanceImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::equalizeImage
function equalizeImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->equalizeImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}




//Example Imagick::evaluateImage
function evaluateImage($evaluateType, $firstTerm, $gradientStartColor, $gradientEndColor) {
    $imagick = new \Imagick();
    $size = 400;
    $imagick->newPseudoImage(
        $size,
        $size,
        "gradient:$gradientStartColor-$gradientEndColor"
    );
    
    $quantumScaledTypes = [
        \Imagick::EVALUATE_ADD,
        \Imagick::EVALUATE_AND,
        \Imagick::EVALUATE_MAX,
        \Imagick::EVALUATE_MIN,
        \Imagick::EVALUATE_OR,
        \Imagick::EVALUATE_SET,
        \Imagick::EVALUATE_SUBTRACT,
        \Imagick::EVALUATE_XOR,
        \Imagick::EVALUATE_THRESHOLD,
        \Imagick::EVALUATE_THRESHOLDBLACK,
        \Imagick::EVALUATE_THRESHOLDWHITE,
        \Imagick::EVALUATE_ADDMODULUS,
    ];

    $unscaledTypes = [
        \Imagick::EVALUATE_DIVIDE,
        \Imagick::EVALUATE_MULTIPLY,
        \Imagick::EVALUATE_RIGHTSHIFT,
        \Imagick::EVALUATE_LEFTSHIFT,
        \Imagick::EVALUATE_POW,
        \Imagick::EVALUATE_LOG,
        \Imagick::EVALUATE_GAUSSIANNOISE,
        \Imagick::EVALUATE_IMPULSENOISE,
        \Imagick::EVALUATE_LAPLACIANNOISE,
        \Imagick::EVALUATE_MULTIPLICATIVENOISE,
        \Imagick::EVALUATE_POISSONNOISE,
        \Imagick::EVALUATE_UNIFORMNOISE,
        \Imagick::EVALUATE_COSINE,
        \Imagick::EVALUATE_SINE,
    ];

    if (in_array($evaluateType, $unscaledTypes)) {
        $imagick->evaluateimage($evaluateType, $firstTerm);
    }
    else if (in_array($evaluateType, $quantumScaledTypes)) {
        $imagick->evaluateimage($evaluateType, $firstTerm * \Imagick::getQuantum());
    }
    else {
        throw new \Exception("Evaluation type $evaluateType is not listed as either scaled or unscaled");
    }

    $imagick->setimageformat('png');
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}



//Example Imagick::flipImage
function flipImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->flipImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::floodFillPaintImage
function floodFillPaintImage() {
    $imagick = new \Imagick(realpath("../images/BlueScreen.jpg"));
    $imagick->floodFillPaintImage(
            'white',
                0.3 * \Imagick::getQuantum(),
                "#00ff00",
                20, 20,
                false
    );
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::flopImage
function flopImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->flopImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Utility function for forwardTransformImage
function createMask() {

    $draw = new \ImagickDraw();

    $draw->setStrokeOpacity(0);
    $draw->setStrokeColor('rgb(255, 255, 255)');
    $draw->setFillColor('rgb(255, 255, 255)');

    //Draw a circle on the y-axis, with it's centre
    //at x, y that touches the origin
    $draw->circle(250, 250, 220, 250);
    //$draw->point(256, 256);

    $imagick = new \Imagick();
    $imagick->newImage(512, 512, "black");
    $imagick->drawImage($draw);
    $imagick->gaussianBlurImage(20, 20);
    $imagick->autoLevelImage();

    //$imagick->negateImage(true);

    if (false) {
        $imagick->setImageFormat('png');
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
        exit(0);
    }

    return $imagick;
}

//Example Imagick::forwardFourierTransformImage
function forwardFourierTransformImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->resizeimage(512, 512, \Imagick::FILTER_LANCZOS, 1);

    if (false) {
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
        exit(0);
    }

    $mask = createMask();
    $imagick->forwardFourierTransformImage(true);

    @$imagick->setimageindex(0);
    $magnitude = $imagick->getimage();

    @$imagick->setimageindex(1);
    $imagickPhase = $imagick->getimage();

    if (true) {
        $imagickPhase->compositeImage($mask, \Imagick::COMPOSITE_MULTIPLY, 0, 0);
    }

    if (false) {
        $output = clone $imagickPhase;
        $output->setimageformat('png');
        header("Content-Type: image/png");
        echo $output->getImageBlob();
    }

    $magnitude->inverseFourierTransformImage($imagickPhase, true);

    $magnitude->setimageformat('png');
    header("Content-Type: image/png");
    echo $magnitude->getImageBlob();
}



//Example Imagick::
function frameImage($imagePath, $color, $width, $height, $innerBevel, $outerBevel) {
    $imagick = new \Imagick(realpath($imagePath));

    $width = $width + $innerBevel + $outerBevel;
    $height = $height + $innerBevel + $outerBevel;

    $imagick->frameimage(
        $color,
        $width,
        $height,
        $innerBevel,
        $outerBevel
    );
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::fxImage
function fxImage() {
    $imagick = new \Imagick();
    $imagick->newPseudoImage(200, 200, "xc:white");

    //convert -size 100x100 xc:  -channel G \
    //-fx  \
    //-separate  fx_radial_gradient.png

    $fx = 'xx=i-w/2; yy=j-h/2; rr=hypot(xx,yy); (.5-rr/140)*1.2+.5';
    $fxImage = $imagick->fxImage($fx);

    header("Content-Type: image/png");
    $fxImage->setimageformat('png');
    echo $fxImage->getImageBlob();
}

//Example Imagick::gammaImage
function gammaImage($imagePath, $gamma, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->gammaImage($gamma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::gaussianBlurImage
function gaussianBlurImage($imagePath, $radius, $sigma, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->gaussianBlurImage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::getPixelIterator
function getPixelIterator($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imageIterator = $imagick->getPixelIterator();

    /** @noinspection PhpUnusedLocalVariableInspection */
    foreach ($imageIterator as $row => $pixels) { /* Loop trough pixel rows */
        foreach ($pixels as $column => $pixel) { /* Loop through the pixels in the row (columns) */
            /** @var $pixel \ImagickPixel */
            if ($column % 2) {
                $pixel->setColor("rgba(0, 0, 0, 0)"); /* Paint every second pixel black*/
            }
        }
        $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */
    }

    header("Content-Type: image/jpg");
    echo $imagick;
}

//Example Imagick::getPixelRegionIterator
function getPixelRegionIterator($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imageIterator = $imagick->getPixelRegionIterator(100, 100, 200, 200);

    /** @noinspection PhpUnusedLocalVariableInspection */
    foreach ($imageIterator as $row => $pixels) { /* Loop trough pixel rows */
        foreach ($pixels as $column => $pixel) { /* Loop through the pixels in the row (columns) */
            /** @var $pixel \ImagickPixel */
            if ($column % 2) {
                $pixel->setColor("rgba(0, 0, 0, 0)"); /* Paint every second pixel black*/
            }
        }
        $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */
    }

    header("Content-Type: image/jpg");
    echo $imagick;
}

//Example Imagick::haldClutImage
function haldClutImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagickPalette = new \Imagick(realpath("../images/hald/hald_8.png"));
    $imagickPalette->sepiatoneImage(55);
    $imagick->haldClutImage($imagickPalette);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::magnifyImage
function magnifyImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->magnifyImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::medianFilterImage
function medianFilterImage($radius, $imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    @$imagick->medianFilterImage($radius);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::modulateImage
function modulateImage($imagePath, $hue, $brightness, $saturation) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->modulateImage($brightness, $saturation, $hue);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::mosaicImages
function mosaicImages() {
    $imagick = new \Imagick();
    $imagick->newimage(500, 500, 'white');

    $images = [
        "../images/Biter_500.jpg",
        "../images/SydneyPeople_400.jpg",
    ];

    foreach ($images as $image) {
        $nextImage = new \Imagick(realpath($image));
        //$nextImage->setPage(100, 100, 50, 50);
        $imagick->addImage($nextImage);
    }

    @$imagick->mosaicimages();

    $imagick->setimageformat('png');
    header("Content-Type: image/png");
}


//Example Imagick::motionBlurImage
function motionBlurImage($imagePath, $radius, $sigma, $angle, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->motionBlurImage($radius, $sigma, $angle, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::negateImage
function negateImage($imagePath, $grayOnly, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->negateImage($grayOnly, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::newPseudoImage
function newPseudoImage($canvasType) {
    $imagick = new \Imagick();
    $imagick->newPseudoImage(300, 300, $canvasType);
    $imagick->setImageFormat("png");
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}


//Example Imagick::normalizeImage
function normalizeImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $original = clone $imagick;
    $original->cropimage($original->getImageWidth() / 2, $original->getImageHeight(), 0, 0);
    $imagick->normalizeImage(\Imagick::CHANNEL_ALL);
    $imagick->compositeimage($original, \Imagick::COMPOSITE_ATOP, 0, 0);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::oilPaintImage
function oilPaintImage($imagePath, $radius) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->oilPaintImage($radius);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::quantizeImage
function quantizeImage($imagePath, $numberColors, $colorSpace, $treeDepth, $dither) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->quantizeImage($numberColors, $colorSpace, $treeDepth, $dither, false);
    $imagick->setImageFormat('png');
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}




//Example Imagick::radialBlurImage
function radialBlurImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->radialBlurImage(3);
    $imagick->radialBlurImage(5);
    $imagick->radialBlurImage(7);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::raiseImage
function raiseImage($imagePath, $width, $height, $x, $y, $raise) {
    $imagick = new \Imagick(realpath($imagePath));

    //x and y do nothing?
    $imagick->raiseImage($width, $height, $x, $y, $raise);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::randomThresholdimage
function randomThresholdimage($imagePath, $lowThreshold, $highThreshold, $channel) {
    $imagick = new \Imagick(realpath($imagePath));

    $imagick->randomThresholdimage(
        $lowThreshold * \Imagick::getQuantum(),
        $highThreshold * \Imagick::getQuantum(),
        $channel
    );
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::recolorImage
function recolorImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $remapColor = [ 1, 0, 0,
        0, 0, 1,
        0, 1, 0,];

//$remapColor = [
//    1.438, -0.122, -0.016,  0, 0, -0.03,
//    -0.062,  1.378, -0.016,  0, 0,  0.05,
//    -0.062, -0.122, 1.483,   0, 0, -0.02,
//];

    @$imagick->recolorImage($remapColor);

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::reduceNoiseImage
function reduceNoiseImage($imagePath, $reduceNoise) {
    $imagick = new \Imagick(realpath($imagePath));
    @$imagick->reduceNoiseImage($reduceNoise);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::remapImage
function remapImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick2 = new \Imagick(realpath("../images/TestImage2.jpg"));
    $imagick->remapImage($imagick2, true);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::resampleImage
function resampleImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->resampleImage(200, 200, \Imagick::FILTER_LANCZOS, 1);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::rollImage
function rollImage($imagePath, $rollX, $rollY) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->rollimage($rollX, $rollY);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::rotateImage
function rotateImage($imagePath, $angle, $color) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->rotateimage($color, $angle);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::rotationalBlurImage
function rotationalBlurImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->rotationalBlurImage(3);
    $imagick->rotationalBlurImage(5);
    $imagick->rotationalBlurImage(7);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::roundCorners
function roundCorners($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->setBackgroundColor('red');

    $imagick->setbackgroundcolor('pink');

    $x_rounding = 40;
    $y_rounding = 40;
    $stroke_width = 5;
    $displace = 0;
    $size_correction = 0;

    $imagick->roundCornersImage(
            $x_rounding,
                $y_rounding,
                $stroke_width,
                $displace,
                $size_correction
    );

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::scaleImage
function scaleImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->scaleImage(150, 150, true);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::segmentImage
function segmentImage($imagePath, $colorSpace, $clusterThreshold, $smoothThreshold) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->segmentImage($colorSpace, $clusterThreshold, $smoothThreshold);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}



//Example Imagick::selectiveBlurImage
function selectiveBlurImage($imagePath, $radius, $sigma, $threshold, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->selectiveBlurImage($radius, $sigma, $threshold, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::separateImageChannel
function separateImageChannel($imagePath, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->separateimagechannel($channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}



//Example Imagick::sepiaToneImage
function sepiaToneImage($imagePath, $sepia) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->sepiaToneImage($sepia);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::setImageArtifact
function setImageArtifact($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    
    //$imagick->setImageArtifact('jpeg:extent', '10kb');
    /* Don't write any ancillary chunks except for gAMA */
    //"png:include-chunk","none,gama"
    //SetImageArtifact(image,"png:include-chunk","none,trns,gama");

//        /* Only write PNG32 formatted PNG (32-bit RGBA), 8 bits per channel */
//        "png:format","png32"


//    Wand artifacts are like properties
//    except they are not exported.  They are needed for some method such
//    as setting compose:args for the composite DisplaceCompositeOp compose
//    operator.
    
    //SetImageArtifact(blend_image,"compose:args","20x80");

    $imagick->setImageFormat('jpg');
    header("Content-Type: image/jpg");
    echo $imagick->getImagesBlob();
}


function setImageBias() {

    $imagick = new \Imagick(realpath("../images/stack.jpg"));

    //@$imagick->medianFilterImage(2);
    $imagick->transformImageColorSpace(\Imagick::COLORSPACE_GRAY);
//    @$imagick->medianFilterImage(2);
//    
    $xKernel = array(
        -0.70, 0, 0.70,
        -0.70, 0, 0.70,
        -0.70, 0, 0.70
    );

//    $edgeFindingKernel = [-1, -1, -1, -1, 8, -1, -1, -1, -1,];

    //$imagick->setImageBias(0.5);
    $imagick->convolveImage($xKernel, \Imagick::CHANNEL_ALL);
    //$imagick->setImageBias(-0.5);

    header('Content-type: image/jpeg');
    echo $imagick->getImageBlob();
}


//Example Imagick::setImageDelay
function setImageDelay() {
    $imagick = new \Imagick(realpath("../images/coolGif.gif"));
    $imagick = $imagick->coalesceImages();

    $frameCount = 0;

    foreach ($imagick as $frame) {
        /** @var $frame \Imagick */
        $frame->setImageDelay((($frameCount % 11) * 5));
        $frameCount++;
    }

    $imagick = $imagick->deconstructImages();

    header("Content-Type: image/gif");
    echo $imagick->getImagesBlob();
}


//Example Imagick::setImageTicksPerSecond
function setImageTicksPerSecond() {

    $imagick = new \Imagick(realpath("../images/coolGif.gif"));
    $imagick = $imagick->coalesceImages();

    $totalFrames = $imagick->getNumberImages();

    $frameCount = 0;

    foreach ($imagick as $frame) {
        /** @var $frame \Imagick */
//        $frame->setImageTicksPerSecond(50);

        if ($frameCount < ($totalFrames / 2)) {
            //Modify the frame to be displayed for twice as long as it currently is.
            $frame->setImageTicksPerSecond(50);
        }
        else {
            //Modify the frame to be displayed for half as long as it currently is.
            $frame->setImageTicksPerSecond(200);
        }
        $frameCount++;
    }

    $imagick = $imagick->deconstructImages();
    header("Content-Type: image/gif");
    echo $imagick->getImagesBlob();
}



//Example Imagick::setIteratorIndex
function setIteratorIndex() {

    $imagick = new \Imagick(realpath("../images/LayerTest.psd"));

    $output = new \Imagick();
    $imagick->setIteratorIndex(1);
    $output->addImage($imagick->getimage());

    $imagick->setIteratorIndex(2);
    $output->addImage($imagick->getimage());

    $merged = @$output->flattenimages();
    $merged->setImageFormat('png');
    header("Content-Type: image/png");
    echo $merged->getImageBlob();
}



//Example Imagick::setOption
function setOption($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->setImageFormat('jpg');
    $imagick->setOption('jpeg:extent', '20kb');
    
    //"jpeg:perserve","yes"
    
    //"quantum:format","floating-point"
    //"quantum:polarity","min-is-white"
    //"jpeg:size","120x120"
    
    
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::shadeImage
function shadeImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->shadeImage(true, 45, 20);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::shadowImage
function shadowImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->shadowImage(0.4, 10, 50, 5);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::sharpenImage
function sharpenImage($imagePath, $radius, $sigma, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->sharpenimage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::shaveImage
function shaveImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->shaveImage(100, 50);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::shearimage
function shearImage($imagePath, $color, $shearX, $shearY) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->shearimage($color, $shearX, $shearY);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::sigmoidalContrastImage
function sigmoidalContrastImage($imagePath, $sharpening, $midpoint, $sigmoidalContrast) {
    $imagick = new \Imagick(realpath($imagePath));
    //Need some stereo image to work with.
    $imagick->sigmoidalcontrastimage(
        $sharpening, //sharpen 
        $midpoint,
        $sigmoidalContrast * \Imagick::getQuantum()
    );
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::sketchimage
function sketchImage($imagePath, $radius, $sigma, $angle) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->sketchimage($radius, $sigma, $angle);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::smushImages
function smushImages($imagePath) {

    $imagick = new \Imagick(realpath($imagePath));
    $imagick2 = new \Imagick(realpath("../images/coolGif.gif"));

    $imagick->addimage($imagick2);
    $smushed = $imagick->smushImages(false, 50);
    $smushed->setImageFormat('jpg');
    header("Content-Type: image/jpg");
    echo $smushed->getImageBlob();
}


//Example Imagick::solarizeImage
function solarizeImage($imagePath, $solarizeThreshold) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->solarizeImage($solarizeThreshold * \Imagick::getQuantum());
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::spliceImage
function spliceImage($imagePath, $startX, $startY, $width, $height) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->spliceImage($width, $height, $startX, $startY);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::spreadImage
function spreadImage($imagePath, $radius) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->spreadImage($radius);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::statisticImage
function statisticImage($imagePath, $statisticType, $w20, $h20, $channel) {

    $imagick = new \Imagick(realpath($imagePath));
    
    $imagick->statisticImage(
        $statisticType,
        $w20,
        $h20,
        $channel
    );

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::stereoImage
function stereoImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    //TODO - Need some stereo image to work with.
    $imagick->stereoImage(true, 45, 20);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::subImageMatch
function subImageMatch($imagePath) {

    //Similarity score is: 0
    //array(4) { ["x"]=> int(250) ["y"]=> int(110) ["width"]=> int(40) ["height"]=> int(40)

    $imagick = new \Imagick(realpath($imagePath));

    $imagick2 = clone $imagick;
    //$imagick2->blurImage(5, 1);
    $imagick2->cropimage(40, 40, 250, 110);

    $imagick2->setImagePage($imagick2->getimageWidth(), $imagick2->getimageheight(), 0, 0);
    $imagick2->vignetteimage(0, 1, 3, 3);

    $similarity = null;
    $bestMatch = null;
    $comparison = $imagick->subImageMatch($imagick2, $bestMatch, $similarity);

    //Do something with $comparison
    
    echo "Similarity score is: ".$similarity;
    foreach($bestMatch as $key => $value) {
        echo "$key : $value <br/>";
    }
    
    
}



//Example Imagick::swirlImage
function swirlImage($imagePath, $swirl) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->swirlImage($swirl);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::textureImage
function textureImage($imagePath) {
    $image = new \Imagick();
    $image->newImage(640, 480, new \ImagickPixel('pink'));
    $image->setImageFormat("jpg");
    $texture = new \Imagick(realpath($imagePath));
    $texture->scaleimage($image->getimagewidth() / 4, $image->getimageheight() / 4);
    $image = $image->textureImage($texture);
    header("Content-Type: image/jpg");
    echo $image;
}

//Example Imagick::thresholdimage
function thresholdimage($imagePath, $threshold, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->thresholdimage($threshold * \Imagick::getQuantum(), $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}



//Example Imagick::thumbnailImage
function thumbnailImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->setbackgroundcolor('rgb(64, 64, 64)');
    $imagick->thumbnailImage(100, 100, true, true);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::tintImage
function tintImage($r, $g, $b, $a) {
    $a = $a / 100;

    $imagick = new \Imagick();
    $imagick->newPseudoImage(400, 400, 'gradient:black-white');

    $tint = new \ImagickPixel("rgb($r, $g, $b)");
    $opacity = new \ImagickPixel("rgb(128, 128, 128, $a)");
    $imagick->tintImage($tint, $opacity);
    $imagick->setImageFormat('png');
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}



//Example Imagick::transformimage
function transformimage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $newImage = $imagick->transformimage("400x600", "200x300");
    header("Content-Type: image/jpg");
    echo $newImage->getImageBlob();
}


//Example Imagick::transformImageColorspace
function transformImageColorspace($imagePath, $colorSpace, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->transformimagecolorspace($colorSpace);
    $imagick->separateImageChannel($channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::transparentPaintImage
function transparentPaintImage($color, $alpha, $fuzz) {
    $imagick = new \Imagick(realpath("../images/BlueScreen.jpg"));

    //Need to be in a format that supports transparency
    $imagick->setimageformat('png');

    $imagick->transparentPaintImage(
        $color, $alpha, $fuzz * \Imagick::getQuantum(), false
    );

    //Not required, but helps tidy up left over pixels
    $imagick->despeckleimage();

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}


//Example Imagick::transposeImage
function transposeImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->transposeImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}




//Example Imagick::transverseImage
function transverseImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->transverseImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::trimImage
function trimImage($color, $fuzz) {
    $imagick = new \Imagick(realpath("../images/BlueScreen.jpg"));
    $imagick->borderImage($color, 10, 10);
    $imagick->trimImage($fuzz * \Imagick::getQuantum());

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::uniqueImageColors
function uniqueImageColors($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    //Reduce the image to 256 colours nicely.
    $imagick->quantizeImage(256, \Imagick::COLORSPACE_YIQ, 0, false, false);
    $imagick->uniqueImageColors();
    $imagick->scaleimage($imagick->getImageWidth(), $imagick->getImageHeight() * 20);
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}


//Example Imagick::unsharpMaskImage
function unsharpMaskImage($imagePath, $radius, $sigma, $amount, $unsharpThreshold) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->unsharpMaskImage($radius, $sigma, $amount, $unsharpThreshold);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}



//Example Imagick::vignetteImage
function vignetteImage($imagePath, $blackPoint, $whitePoint, $x, $y) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->vignetteImage($blackPoint, $whitePoint, $x, $y);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::waveImage
function waveImage($imagePath, $amplitude, $length) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->waveImage($amplitude, $length);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//Example Imagick::whiteThresholdImage
function whiteThresholdImage($imagePath, $color) {
    $imagick = new \Imagick(realpath($imagePath));
    //TODO needs a control
    $imagick->whiteThresholdImage($color);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}



}



 