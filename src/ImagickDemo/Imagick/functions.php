<?php

namespace ImagickDemo\Imagick;
 
use Imagick;
use Tier\ResponseBody\CachingFileResponseFactory;

class functions
{
    public static function load()
    {
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
function header($string, $replace = true, $http_response_code = null)
{
    global $imageType;
    global $cacheImages;

    if (stripos($string, "Content-Type: image/") === 0) {
        $imageType = substr($string, strlen("Content-Type: image/"));
    }
    
//    if ($cacheImages == false) {
//        if (php_sapi_name() !== 'cli') {
//            \header($string, $replace, $http_response_code);
//        }
//    }
    
    
}
    
function renderFile(CachingFileResponseFactory $fileResponseFactory, $filename)
{
    return $fileResponseFactory->create($filename, "image/jpg");
}
    

//Example Imagick::adaptiveBlurImage
function adaptiveBlurImage($imagePath, $radius, $sigma, $channel)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->adaptiveBlurImage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::adaptiveResizeImage
function adaptiveResizeImage($imagePath, $width, $height, $bestFit)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->adaptiveResizeImage($width, $height, $bestFit);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::adaptiveSharpenImage
function adaptiveSharpenImage($imagePath, $radius, $sigma, $channel)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->adaptiveSharpenImage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    
//Example Imagick::adaptiveThresholdImage
function adaptiveThresholdImage($imagePath, $width, $height, $adaptiveOffset)
{
    $imagick = new \Imagick(realpath($imagePath));
    $adaptiveOffsetQuantum = intval($adaptiveOffset * \Imagick::getQuantum());
    $imagick->adaptiveThresholdImage($width, $height, $adaptiveOffsetQuantum);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::addNoiseImage
function addNoiseImage($noiseType, $imagePath, $channel)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->addNoiseImage($noiseType, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::affineTransformImage
function affineTransformImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $draw = new \ImagickDraw();

    $angle = 40 ;

    $affineRotate = array(
        "sx" => cos($angle), "sy" => cos($angle),
        "rx" => sin($angle), "ry" => -sin($angle),
        "tx" => 0, "ty" => 0,
    );

    $draw->affine($affineRotate);

    $imagick->affineTransformImage($draw);

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//TODO - add strokeWidth + fontSize control
//Example Imagick::annotateImage
function annotateImage($imagePath, $strokeColor, $fillColor)
{
    $imagick = new \Imagick(realpath($imagePath));

    $draw = new \ImagickDraw();
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);

    $draw->setStrokeWidth(1);
    $draw->setFontSize(36);
    
    $text = "Imagick is a native php \nextension to create and \nmodify images using the\nImageMagick API.";

    $draw->setFont("../fonts/Arial.ttf");
    $imagick->annotateimage($draw, 40, 40, 0, $text);

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::appendImages
function appendImages()
{
    $images = [
        [
            "../imagick/images/lories/IMG_1599_480.jpg",
            "../imagick/images/lories/IMG_2561_480.jpg"
        ],
        [
            "../imagick/images/lories/IMG_2837_480.jpg",
            "../imagick/images/lories/IMG_4023_480.jpg"
        ]
    ];
    
    $canvas = new Imagick();

    foreach ($images as $imageRow) {
        $rowImagick = new Imagick();
        $rowImagick->setBackgroundColor('gray');
        foreach ($imageRow as $imagePath) {
            $imagick = new Imagick(realpath($imagePath));
            $imagick->setImageBackgroundColor("gray");
            $imagick->resizeimage(200, 200, \Imagick::FILTER_LANCZOS, 1.0, true);
            $rowImagick->addImage($imagick);
        }
        $rowImagick->resetIterator();
        //Add the images horizontally.
        $combinedRow = $rowImagick->appendImages(false);
        $canvas->addImage($combinedRow);
    }

    $canvas->resetIterator();
    
    //Add the images vertically.
    $finalimage = $canvas->appendImages(true);
    $finalimage->setImageFormat('jpg');

    header("Content-Type: image/jpg");
    echo $finalimage->getImageBlob();
}
//Example end

//Example Imagick::autoLevelImage
function autoLevelImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->autoLevelImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::averageImages
function averageImages($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    //$imagick2 = new \Imagick(realpath("../images/TestImage2.jpg"));
    //$imagick->addImage($imagick2);
    //This kills PHP  - but the function is deprecated, so let's just ignore it
    $averageImage = @$imagick->averageImages();

    $averageImage->setImageType('jpg');
    header("Content-Type: image/jpg");
    echo $averageImage->getImageBlob();
}
//Example end

//Example Imagick::blackThresholdImage
function blackThresholdImage($imagePath, $thresholdColor)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->blackthresholdimage($thresholdColor);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::blueShiftImage
function blueShiftImage($imagePath, $blueShift)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->blueShiftImage($blueShift);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::blurImage
function blurImage($imagePath, $radius, $sigma, $channel)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->blurImage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::borderImage
function borderImage($imagePath, $color, $width, $height)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->borderImage($color, $width, $height);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::brightnessContrastImage
function brightnessContrastImage($imagePath, $brightness, $contrast, $channel)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->brightnessContrastImage($brightness, $contrast, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::charcoalImage
function charcoalImage($imagePath, $radius, $sigma)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->charcoalImage($radius, $sigma);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::chopImage
function chopImage($imagePath, $startX, $startY, $width, $height)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->chopImage($width, $height, $startX, $startY);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::clipImage
function clipImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->clipImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end



//Example Imagick::coalesceImages
function coalesceImages()
{
    $imagePaths = [
        "../imagick/images/lories/IMG_1599_480.jpg",
        "../imagick/images/lories/IMG_2561_480.jpg",
        "../imagick/images/lories/IMG_2837_480.jpg",
        "../imagick/images/lories/IMG_4023_480.jpg",
    ];

    $canvas = new Imagick();
    foreach ($imagePaths as $imagePath) {
        $canvas->readImage(realpath($imagePath));
        $canvas->setImageDelay(100);
    }
    $canvas->setImageFormat('gif');
    
    $finalImage = $canvas->coalesceImages();
    $finalImage->setImageFormat('gif');
    $finalImage->setImageIterations(0); //loop forever
    $finalImage->mergeImageLayers(\Imagick::LAYERMETHOD_OPTIMIZEPLUS);

    header("Content-Type: image/gif");
    echo $finalImage->getImagesBlob();
}
//Example end





//Example Imagick::colorDecisionListImage
function colorDecisionListImage($imagePath)
{
//    $colorList = '<ColorCorrectionCollection xmlns="urn:ASC:CDL:v1.2">
//    <ColorCorrection id="cc03345">
//          <SOPNode>
//               <Slope> 0.9 1.2 0.5 </Slope>
//               <Offset> 0.4 -0.5 0.6 </Offset>
//               <Power> 1.0 0.8 1.5 </Power>
//          </SOPNode>
//          <SATNode>
//               <Saturation> 0.85 </Saturation>
//          </SATNode>
//    </ColorCorrection>
//    </ColorCorrectionCollection>';

    $imagick = new \Imagick(realpath($imagePath));

    $imagick->colorDecisionListImage($imagick);
    
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end



//Example Imagick::colorFloodfillImage
function colorFloodfillImage($imagePath)
{
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
//Example end

//Example Imagick::colorizeImage
function colorizeImage($imagePath, $color, $opacity)
{
    $imagick = new \Imagick(realpath($imagePath));
    $opacity = $opacity / 255.0;
    $opacityColor = new \ImagickPixel("rgba(0, 0, 0, $opacity)");
    $imagick->colorizeImage($color, $opacityColor);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//TODO - understand what a color matrix is...
//Example Imagick::colorMatrixImage
function colorMatrixImage($imagePath, $colorMatrix)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->setImageOpacity(1);

    //A color matrix should look like:
    //    $colorMatrix = [
    //        1.5, 0.0, 0.0, 0.0, 0.0, -0.157,
    //        0.0, 1.0, 0.5, 0.0, 0.0, -0.157,
    //        0.0, 0.0, 1.5, 0.0, 0.0, -0.157,
    //        0.0, 0.0, 0.0, 1.0, 0.0,  0.0,
    //        0.0, 0.0, 0.0, 0.0, 1.0,  0.0,
    //        0.0, 0.0, 0.0, 0.0, 0.0,  1.0
    //    ];

    $background = new \Imagick();
    $background->newPseudoImage(
        $imagick->getImageWidth(),
        $imagick->getImageHeight(),
        "pattern:checkerboard"
    );

    $background->setImageFormat('png');

    $imagick->setImageFormat('png');
    $imagick->colorMatrixImage($colorMatrix);
    
    $background->compositeImage($imagick, \Imagick::COMPOSITE_ATOP, 0, 0);

    header("Content-Type: image/png");
    echo $background->getImageBlob();
}
//Example end

//Example Imagick::compositeImage
function compositeImage()
{
    $img1 = new \Imagick();
    $img1->readImage(realpath("images/Biter_500.jpg"));

    $img2 = new \Imagick();
    $img2->readImage(realpath("images/Skyline_400.jpg"));

    $img1->resizeimage(
        $img2->getImageWidth(),
        $img2->getImageHeight(),
        \Imagick::FILTER_LANCZOS,
        1
    );

    $opacity = new \Imagick();
    $opacity->newPseudoImage(
        $img1->getImageHeight(),
        $img1->getImageWidth(),
        "gradient:gray(10%)-gray(90%)"
    );
    $opacity->rotateimage('black', 90);

    $img2->compositeImage($opacity, \Imagick::COMPOSITE_COPYOPACITY, 0, 0);
    $img1->compositeImage($img2, \Imagick::COMPOSITE_ATOP, 0, 0);

    header("Content-Type: image/jpg");
    echo $img1->getImageBlob();
}
//Example end



//Example Imagick::constituteImage
function constituteImage($imagePath)
{
    $imagick = new \Imagick();

    /*
    CharPixel
    DoublePixel
    FloatPixel
    IntegerPixel
    LongPixel
    QuantumPixel
    ShortPixel 
    */
//    R = red, G = green, B = blue, A = alpha (0 is transparent), O = opacity (0 is opaque), C = cyan, Y = yellow, M = magenta, K = black, I = intensity (for grayscale), P = pad.
    
    //$imagick->constituteImage(100, 100, "RGB", CharPixel, $pixels);

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    
//Example Imagick::contrastImage
function contrastImage($imagePath, $contrastType)
{
    $imagick = new \Imagick(realpath($imagePath));
    if ($contrastType != 2) {
        $imagick->contrastImage($contrastType);
    }

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::convolveImage
function convolveImage($imagePath, $bias, $kernelMatrix)
{
    $imagick = new \Imagick(realpath($imagePath));
    //$edgeFindingKernel = [-1, -1, -1, -1, 8, -1, -1, -1, -1,];
    $imagick->setImageBias($bias * \Imagick::getQuantum());
    $imagick->convolveImage($kernelMatrix);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::cropImage
function cropImage($imagePath, $startX, $startY, $width, $height)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->cropImage($width, $height, $startX, $startY);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::deskewImage
function deskewImage($threshold)
{
    $imagick = new \Imagick(realpath("images/NYTimes-Page1-11-11-1918.jpg"));
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
//Example end

//Example Imagick::despeckleImage
function despeckleImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->despeckleImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::drawImage
function drawImage()
{
    $strokeColor = 'black';
    $fillColor = 'salmon';
    $backgroundColor = 'lightblue';
    
    $draw = new \ImagickDraw();

    $draw->setStrokeOpacity(1);
    $draw->setStrokeColor($strokeColor);
    $draw->setStrokeWidth(4);

    $draw->setFillColor($fillColor);

    $points = [
        ['x' => 40 * 5, 'y' => 10 * 5],
        ['x' => 20 * 5, 'y' => 20 * 5],
        ['x' => 70 * 5, 'y' => 50 * 5],
        ['x' => 60 * 5, 'y' => 15 * 5],
    ];

    $draw->polygon($points);

    $image = new \Imagick();
    $image->newImage(500, 300, $backgroundColor);
    $image->setImageFormat("png");
    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
//Example end

//Example Imagick::edgeImage
function edgeImage($imagePath, $radius)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->edgeImage($radius);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::enhanceImage
function enhanceImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->enhanceImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::embossImage
function embossImage($imagePath, $radius, $sigma)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->embossImage($radius, $sigma);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    
//Example Imagick::equalizeImage
function equalizeImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->equalizeImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::evaluateImage
function evaluateImage($evaluateType, $firstTerm, $gradientStartColor, $gradientEndColor)
{
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
//Example end



//Example Imagick::extentImage
function extentImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->setImageBackgroundColor('orange');
    $imagick->extentImage(
        $imagick->getImageWidth(),
        $imagick->getImageHeight(),
        -100,
        -100
    );

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::exportImagePixels
function exportImagePixels($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    for ($y=0; $y< $imagick->getImageHeight(); $y++) {
        $redPixels = $imagick->exportImagePixels(0, $y, $imagick->getImageWidth(), 1, "R", \Imagick::PIXEL_CHAR);
        
        $average = array_sum($redPixels) / count($redPixels);

        
        //Make the pixels that are redder than average be 100% red.
        foreach ($redPixels as &$redPixel) {
            if ($redPixel > $average) {
                $redPixel = 255;
            }
        }
        
        $imagick->importImagePixels(0, $y, $imagick->getImageWidth(), 1, "R", \Imagick::PIXEL_CHAR, $redPixels);
    }
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::flattenImages
function flattenImages()
{
    $imagick = new \Imagick(realpath("images/LayerTest.psd"));
    $imagick->flattenimages();
    $imagick->setImageFormat('png');
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::filter
function filter($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $matrix = [
        [-1, 0, -1],
        [0,  5,  0],
        [-1, 0, -1],
    ];
    
    $kernel = \ImagickKernel::fromMatrix($matrix);
    $strength = 0.5;
    $kernel->scale($strength, \Imagick::NORMALIZE_KERNEL_VALUE);
    $kernel->addUnityKernel(1 - $strength);

    $imagick->filter($kernel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    
    

//Example Imagick::flipImage
function flipImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->flipImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::floodFillPaintImage
function floodFillPaintImage($fillColor, $fuzz, $targetColor, $x, $y, $inverse, $channel)
{
    $imagick = new \Imagick(realpath("images/BlueScreen.jpg"));
    $imagick->floodFillPaintImage(
        $fillColor,
        $fuzz * \Imagick::getQuantum(),
        $targetColor,
        $x, $y,
        $inverse,
        $channel
    );
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::flopImage
function flopImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->flopImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::forwardFourierTransformImage
//Utility function for forwardTransformImage
function createMask()
{
    $draw = new \ImagickDraw();

    $draw->setStrokeOpacity(0);
    $draw->setStrokeColor('rgb(255, 255, 255)');
    $draw->setFillColor('rgb(255, 255, 255)');

    //Draw a circle on the y-axis, with it's centre
    //at x, y that touches the origin
    $draw->circle(250, 250, 220, 250);

    $imagick = new \Imagick();
    $imagick->newImage(512, 512, "black");
    $imagick->drawImage($draw);
    $imagick->gaussianBlurImage(20, 20);
    $imagick->autoLevelImage();

    return $imagick;
}


function forwardFourierTransformImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->resizeimage(512, 512, \Imagick::FILTER_LANCZOS, 1);

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
//Example end


//Example Imagick::frameImage
function frameImage($imagePath, $color, $width, $height, $innerBevel, $outerBevel)
{
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
//Example end



//Example Imagick::fxImage
function fxImage()
{
    $imagick = new \Imagick();
    $imagick->newPseudoImage(200, 200, "xc:white");

    $fx = 'xx=i-w/2; yy=j-h/2; rr=hypot(xx,yy); (.5-rr/140)*1.2+.5';
    $fxImage = $imagick->fxImage($fx);

    header("Content-Type: image/png");
    $fxImage->setimageformat('png');
    echo $fxImage->getImageBlob();
}
//Example end


//Example Imagick::gammaImage
function gammaImage($imagePath, $gamma, $channel)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->gammaImage($gamma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::gaussianBlurImage
function gaussianBlurImage($imagePath, $radius, $sigma, $channel)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->gaussianBlurImage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::getImageGeometry
function getImageGeometry($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::getPixelIterator
function getPixelIterator($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imageIterator = $imagick->getPixelIterator();

    /** @noinspection PhpUnusedLocalVariableInspection */
    foreach ($imageIterator as $row => $pixels) { /* Loop through pixel rows */
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
//Example end



//Example Imagick::getImageHistogram
function getColorStatistics($histogramElements, $colorChannel)
{
    $colorStatistics = [];

    foreach ($histogramElements as $histogramElement) {
        $color = $histogramElement->getColorValue($colorChannel);
        $color = intval($color * 255);
        $count = $histogramElement->getColorCount();

        if (array_key_exists($color, $colorStatistics)) {
            $colorStatistics[$color] += $count;
        }
        else {
            $colorStatistics[$color] = $count;
        }
    }

    ksort($colorStatistics);
    
    return $colorStatistics;
}

function getImageHistogram($imagePath)
{
    $backgroundColor = 'black';

    $draw = new \ImagickDraw();
    $draw->setStrokeWidth(0); //make the lines be as thin as possible

    $imagick = new \Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    $histogramWidth = 256;
    $histogramHeight = 100; // the height for each RGB segment

    $imagick = new \Imagick(realpath($imagePath));
    //Resize the image to be small, otherwise PHP tends to run out of memory
    //This might lead to bad results for images that are pathologically 'pixelly'
    $imagick->adaptiveResizeImage(200, 200, true);
    $histogramElements = $imagick->getImageHistogram();

    $histogram = new \Imagick();
    $histogram->newpseudoimage($histogramWidth, $histogramHeight * 3, 'xc:black');
    $histogram->setImageFormat('png');

    $getMax = function ($carry, $item) {
        if ($item > $carry) {
            return $item;
        }
        return $carry;
    };

    $colorValues = [
        'red' => getColorStatistics($histogramElements, \Imagick::COLOR_RED),
        'lime' => getColorStatistics($histogramElements, \Imagick::COLOR_GREEN),
        'blue' => getColorStatistics($histogramElements, \Imagick::COLOR_BLUE),
    ];

    $max = array_reduce($colorValues['red'], $getMax, 0);
    $max = array_reduce($colorValues['lime'], $getMax, $max);
    $max = array_reduce($colorValues['blue'], $getMax, $max);

    $scale =  $histogramHeight / $max;

    $count = 0;
    foreach ($colorValues as $color => $values) {
        $draw->setstrokecolor($color);

        $offset = ($count + 1) * $histogramHeight;

        foreach ($values as $index => $value) {
            $draw->line($index, $offset, $index, $offset - ($value * $scale));
        }
        $count++;
    }

    $histogram->drawImage($draw);

    header("Content-Type: image/png");
    echo $histogram;
}
//Example end


//Example Imagick::getPixelRegionIterator
function getPixelRegionIterator($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imageIterator = $imagick->getPixelRegionIterator(100, 100, 200, 200);

    /** @noinspection PhpUnusedLocalVariableInspection */
    foreach ($imageIterator as $row => $pixels) { /* Loop through pixel rows */
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
//Example end

//Example Imagick::haldClutImage
function haldClutImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagickPalette = new \Imagick(realpath("images/hald/hald_8.png"));
    $imagickPalette->sepiatoneImage(55);
    $imagick->haldClutImage($imagickPalette);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::implodeImage
function implodeImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->implodeImage(0.0001);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();

}
//Example end

//Example Imagick::importImagePixels

function shadePixel($value, $r, $g, $b)
{
    $result = [];
    $result[] = intval($r * $value / 64);
    $result[] = intval($g * $value / 64);
    $result[] = intval($b * $value / 64);

    return $result;
}


function importImagePixels()
{
    $width = 320;
    $height = 200;
    //$imagick = new \Imagick();

    $imagick = new \Imagick();//;"magick:logo");


    for ($loop = 0; $loop<=255; $loop += 8) {
        $frame = new \Imagick();
        $frame->newPseudoImage($width, $height, "xc:black");
        //$frame->setImageFormat('gif');

        for ($y=0; $y<$height; $y++) {
            $pixels = [];
    
            for ($x = 0; $x < $width; $x++) {
                $pos = sqrt(($x * $x) + ($y * $y));
                $pos = (256 + $pos - $loop) % 256;
    
                if ($pos < 64) {
                    $rgbColor = shadePixel($pos, 255, 0, 0);
                }
                else if ($pos < 128) {
                    $rgbColor = shadePixel($pos - 64, 0, 255, 0);
                }
                else if ($pos < 192) {
                    $rgbColor = shadePixel($pos - 128, 0, 0, 255);
                }
                else {
                    $rgbColor = shadePixel($pos - 192, 255, 0, 255);
                }
    
                list($r, $g, $b) = $rgbColor;
                $pixels[] = $r;
                $pixels[] = $g;
                $pixels[] = $b;
            }
    
            $frame->importImagePixels(
                0, $y,
                320, 1,
                "RGB",
                \Imagick::PIXEL_CHAR,
                $pixels
            );
        }

        $imagick->addImage($frame);
        $imagick->setImageFormat('gif');
        $imagick->setImageDelay(3);
    }

    $imagick->setImageFormat('gif');
    $imagick->mergeImageLayers(\Imagick::LAYERMETHOD_OPTIMIZEIMAGE);
    header("Content-Type: image/gif");
    $imagick->setImageIterations(0);
    
    echo $imagick->getImagesBlob();

}
//Example end

//Example Imagick::labelImage
function labelImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->labelImage("This is some text");
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::levelImage
function levelImage($blackPoint, $gamma, $whitePoint)
{
    $imagick = new \Imagick();
    $imagick->newPseudoimage(500, 500, 'gradient:black-white');

    $imagick->setFormat('png');
    $quantum = $imagick->getQuantum();
    $imagick->levelImage($blackPoint / 100, $gamma, $quantum * $whitePoint / 100);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::linearStretchImage
function linearStretchImage($imagePath, $blackThreshold, $whiteThreshold)
{
    $imagick = new \Imagick(realpath($imagePath));
    $pixels = $imagick->getImageWidth() * $imagick->getImageHeight();
    $imagick->linearStretchImage($blackThreshold * $pixels, $whiteThreshold * $pixels);

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    

//Example Imagick::magnifyImage
function magnifyImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->magnifyImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    

//Example Imagick::medianFilterImage
function medianFilterImage($radius, $imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    @$imagick->medianFilterImage($radius);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::mergeImageLayers
function mergeImageLayers($layerMethodType)
{
    //$imagick = new \Imagick(realpath("images/LayerTest.psd"));
    //$imagick = new \Imagick(realpath("../imagick/images/Biter_500.jpg"));
    $imagick = new \Imagick(realpath("../imagick/images/redDiscAlpha.png"));
    
    
//    
//    $imagick = new \Imagick();
    $blueDisc = new \Imagick(realpath("../imagick/images/blueDiscAlpha.png"));
    $imagick->addImage($blueDisc);
//    

//    $imagick->addImage($whiteDisc);
    
    $greenDisc = new \Imagick(realpath("../imagick/images/greenDiscAlpha.png"));
    $imagick->addImage($greenDisc);
    $imagick->setImageFormat('png');

    $result = $imagick->mergeImageLayers($layerMethodType);
    header("Content-Type: image/png");

    echo $result->getImageBlob();
}
//Example end
    
    
//Example Imagick::modulateImage
function modulateImage($imagePath, $hue, $brightness, $saturation)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->modulateImage($brightness, $saturation, $hue);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end 


//Example Imagick::montageImage
function montageImage($montageType)
{
    $draw = new \ImagickDraw();
    $draw->setStrokeColor('black');
    $draw->setFillColor('white');
 
    $draw->setStrokeWidth(1);
    $draw->setFontSize(24);

    $imagick = new \Imagick();

    $mosaicWidth = 500;
    $mosaicHeight = 500;
    
    $imagick->newimage($mosaicWidth, $mosaicHeight, 'red');

    $images = [
        "../imagick/images/Biter_500.jpg",
        "../imagick/images/SydneyPeople_400.jpg",
        "../imagick/images/Skyline_400.jpg",
    ];

    $count = 0;
    
    foreach ($images as $image) {
        $nextImage = new \Imagick(realpath($image));
        
        $count++;
        
        $nextImage->labelImage("Label $count");
        $imagick->addImage($nextImage);
    }

    $montage = $imagick->montageImage(
        $draw,
        "3x2+0+0", //tile_geometry
        "200x160+3+3>", //thumbnail_geometry
        $montageType, //\Imagick::MONTAGEMODE_CONCATENATE,
        "10x10+2+2"
    );
    
    $montage->setImageFormat('png');
    
    header("Content-Type: image/png");
    echo $montage->getImageBlob();
}
//Example end 

//Example Imagick::morphImages
function morphImages()
{
    $images = [
        //"../imagick/images/lories/IMG_1599_480.jpg",
        //"../imagick/images/lories/IMG_2837_480.jpg",
        "../imagick/images/lories/IMG_1599_480.jpg",
        "../imagick/images/lories/6E6F9109_480.jpg",
        "../imagick/images/lories/IMG_2561_480.jpg",
    ];

    $imagick = new \Imagick(realpath($images[count($images) - 1]));

    foreach ($images as $image) {
        $nextImage = new \Imagick(realpath($image));
        $imagick->addImage($nextImage);
    }

    $imagick->resetIterator();
    $morphed = $imagick->morphImages(5);
    $morphed->setImageTicksPerSecond(10);

    header("Content-Type: image/gif");
    $morphed->setImageFormat('gif');
    echo $morphed->getImagesBlob();
}
//Example end 

//Example Imagick::mosaicImages
function mosaicImages()
{
    $imagick = new \Imagick();
    $mosaicWidth = 500;
    $mosaicHeight = 500;
    
    $imagick->newimage($mosaicWidth, $mosaicHeight, 'red');

    $images = [
        "../imagick/images/Biter_500.jpg",
        "../imagick/images/SydneyPeople_400.jpg",
        "../imagick/images/Skyline_400.jpg",
    ];

    $positions = [
        [50, 300],
        [200, 125],
        [25, 50],
    ];
    
    $count = 0;

    foreach ($images as $image) {
        $nextImage = new \Imagick(realpath($image));
        $nextImage->resizeimage(300, 300, \Imagick::FILTER_LANCZOS, 1.0, true);

        $nextImage->setImagePage(
            $nextImage->getImageWidth(),
            $nextImage->getImageHeight(),
            $positions[$count][0],
            $positions[$count][1]
        );
        
        $imagick->addImage($nextImage);
        $count++;
    }

    $result = $imagick->mosaicImages();
    $result->setImageFormat('png');

    $result->cropImage(
        $mosaicWidth,
        $mosaicHeight,
        0, 0
    );

    header("Content-Type: image/png");
    echo $result->getImageBlob();
}
//Example end


//Example Imagick::motionBlurImage
function motionBlurImage($imagePath, $radius, $sigma, $angle, $channel)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->motionBlurImage($radius, $sigma, $angle, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::negateImage
function negateImage($imagePath, $grayOnly, $channel)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->negateImage($grayOnly, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::newPseudoImage
function newPseudoImage($canvasType)
{
    $imagick = new \Imagick();
    $imagick->newPseudoImage(300, 300, $canvasType);
    $imagick->setImageFormat("png");
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::normalizeImage
function normalizeImage($imagePath, $channel)
{
    $imagick = new \Imagick(realpath($imagePath));
    $original = clone $imagick;
    $original->cropimage($original->getImageWidth() / 2, $original->getImageHeight(), 0, 0);
    $imagick->normalizeImage($channel);
    $imagick->compositeimage($original, \Imagick::COMPOSITE_ATOP, 0, 0);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::oilPaintImage
function oilPaintImage($imagePath, $radius)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->oilPaintImage($radius);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::orderedPosterizeImage
function orderedPosterizeImage($imagePath, $orderedPosterizeType)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->orderedPosterizeImage($orderedPosterizeType);
    $imagick->setImageFormat('png');
    
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
//Example end



//Example Imagick::opaquePaintImage
function opaquePaintImage($color, $replacementColor, $fuzz, $inverse)
{
    $imagick = new \Imagick(realpath("images/BlueScreen.jpg"));

    //Need to be in a format that supports transparency
    $imagick->setimageformat('png');

    $imagick->opaquePaintImage(
        $color, $replacementColor, $fuzz * \Imagick::getQuantum(), $inverse
    );
    //Not required, but helps tidy up left over pixels
    $imagick->despeckleimage();

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::labelImage
function polaroidImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagickDraw = new \ImagickDraw();
    $imagick->polaroidImage($imagickDraw, 15);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    


//Example Imagick::posterizeImage
function posterizeImage($imagePath, $posterizeType, $numberLevels)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->posterizeImage($numberLevels, $posterizeType);
    $imagick->setImageFormat('png');
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::quantizeImage
function quantizeImage($imagePath, $numberColors, $colorSpace, $treeDepth, $dither)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->quantizeImage($numberColors, $colorSpace, $treeDepth, $dither, false);
    $imagick->setImageFormat('png');
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::quantizeImages
function quantizeImages($numberColors, $colorSpace, $treeDepth, $dither)
{
    set_time_limit(120);        //This takes a long time
    ini_set('memory_limit', '128M'); //And uses a lot of memory
    
    $imagePathPattern = "../imagick/images/spiderGif";
    $fileIterator = new \GlobIterator(realpath($imagePathPattern).'/*.png');

    $imagick = new \Imagick();
    $imagick->setFormat("gif");
    $count = 0;
    foreach ($fileIterator as $fileEntry) {
        if ((($count++) % 3) != 0) {
            continue;
        }
        $nextImage = new \Imagick(realpath($fileEntry));
        $nextImage->setImageDelay(5);
        $imagick->addImage($nextImage);
        $nextImage->destroy();
    }

    $imagick->quantizeImages($numberColors, $colorSpace, $treeDepth, $dither, false);
  
    $imagick->setImageIterations(0); //loop forever
    $imagick->mergeImageLayers(\Imagick::LAYERMETHOD_OPTIMIZEPLUS);

    header("Content-Type: image/gif");
    echo $imagick->getImagesBlob();
}
//Example end

    
    

//Example Imagick::radialBlurImage
function radialBlurImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->radialBlurImage(3);
    $imagick->radialBlurImage(5);
    $imagick->radialBlurImage(7);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::raiseImage
function raiseImage($imagePath, $width, $height, $x, $y, $raise)
{
    $imagick = new \Imagick(realpath($imagePath));

    //x and y do nothing?
    $imagick->raiseImage($width, $height, $x, $y, $raise);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    

//Example Imagick::randomThresholdimage
function randomThresholdimage($imagePath, $lowThreshold, $highThreshold, $channel)
{
    $imagick = new \Imagick(realpath($imagePath));

    $imagick->randomThresholdimage(
        $lowThreshold * \Imagick::getQuantum(),
        $highThreshold * \Imagick::getQuantum(),
        $channel
    );
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::readImageBlob
function readImageBlob()
{
    // Image blob borrowed from:
    // http://www.techerator.com/2011/12/how-to-embed-images-directly-into-your-html/
    $base64 = "iVBORw0KGgoAAAANSUhEUgAAAM0AAAD
 NCAMAAAAsYgRbAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5c
 cllPAAAABJQTFRF3NSmzMewPxIG//ncJEJsldTou1jHgAAAARBJREFUeNrs2EEK
 gCAQBVDLuv+V20dENbMY831wKz4Y/VHb/5RGQ0NDQ0NDQ0NDQ0NDQ0NDQ
 0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0PzMWtyaGhoaGhoaGhoaGhoaGhoxtb0QGho
 aGhoaGhoaGhoaGhoaMbRLEvv50VTQ9OTQ5OpyZ01GpM2g0bfmDQaL7S+ofFC6x
 v3ZpxJiywakzbvd9r3RWPS9I2+MWk0+kbf0Hih9Y17U0nTHibrDDQ0NDQ0NDQ0
 NDQ0NDQ0NTXbRSL/AK72o6GhoaGhoRlL8951vwsNDQ0NDQ1NDc0WyHtDTEhD
 Q0NDQ0NTS5MdGhoaGhoaGhoaGhoaGhoaGhoaGhoaGposzSHAAErMwwQ2HwRQ
 AAAAAElFTkSuQmCC";

    $imageBlob = base64_decode($base64);

    $imagick = new Imagick();
    $imagick->readImageBlob($imageBlob);

    header("Content-Type: image/png");
    echo $imageBlob;
}
//Example end

//Example Imagick::recolorImage
function recolorImage($imagePath)
{
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
//Example end

//Example Imagick::reduceNoiseImage
function reduceNoiseImage($imagePath, $reduceNoise)
{
    $imagick = new \Imagick(realpath($imagePath));
    @$imagick->reduceNoiseImage($reduceNoise);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    
//Example Imagick::remapImage
function remapImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick2 = new \Imagick(realpath("images/Biter_500.jpg"));
    $imagick->remapImage($imagick2, true);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::resampleImage
function resampleImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));

    $imagick->resampleImage(200, 200, \Imagick::FILTER_LANCZOS, 1);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


    
//Example Imagick::resizeImage
function resizeImage($imagePath, $width, $height, $filterType, $blur, $bestFit, $cropZoom)
{
    //The blur factor where &gt; 1 is blurry, &lt; 1 is sharp.
    $imagick = new \Imagick(realpath($imagePath));

    $imagick->resizeImage($width, $height, $filterType, $blur, $bestFit);

    $cropWidth = $imagick->getImageWidth();
    $cropHeight = $imagick->getImageHeight();

    if ($cropZoom) {
        $newWidth = $cropWidth / 2;
        $newHeight = $cropHeight / 2;

        $imagick->cropimage(
            $newWidth,
            $newHeight,
            ($cropWidth - $newWidth) / 2,
            ($cropHeight - $newHeight) / 2
        );

        $imagick->scaleimage(
            $imagick->getImageWidth() * 4,
            $imagick->getImageHeight() * 4
        );
    }


    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    
    
//Example Imagick::rollImage
function rollImage($imagePath, $rollX, $rollY)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->rollimage($rollX, $rollY);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::rotateImage
function rotateImage($imagePath, $angle, $color, $crop)
{
    $imagick = new \Imagick(realpath($imagePath));
    
    $originalWidth = $imagick->getImageWidth();
    $originalHeight = $imagick->getImageHeight();
    
    $imagick->rotateImage($color, $angle);
    
    if ($crop) {
        $imagick->setImagePage(
            $imagick->getimageWidth(),
            $imagick->getimageheight(),
            0,
            0
        );

        $imagick->cropImage(
            $originalWidth,
            $originalHeight,
            ($imagick->getimageWidth() - $originalWidth) / 2,
            ($imagick->getimageHeight() - $originalHeight) / 2
        );
    }

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::rotationalBlurImage
function rotationalBlurImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->rotationalBlurImage(3);
    $imagick->rotationalBlurImage(5);
    $imagick->rotationalBlurImage(7);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::roundCorners
function roundCorners($imagePath)
{
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
//Example end

//Example Imagick::scaleImage
function scaleImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->scaleImage(150, 150, true);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::segmentImage
function segmentImage($imagePath, $colorSpace, $clusterThreshold, $smoothThreshold)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->segmentImage($colorSpace, $clusterThreshold, $smoothThreshold);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::selectiveBlurImage
function selectiveBlurImage($imagePath, $radius, $sigma, $threshold, $channel)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->selectiveBlurImage($radius, $sigma, $threshold, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::separateImageChannel
function separateImageChannel($imagePath, $channel)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->separateimagechannel($channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end



//Example Imagick::sepiaToneImage
function sepiaToneImage($imagePath, $sepia)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->sepiaToneImage($sepia);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::setCompressionQuality
function setCompressionQuality($imagePath, $quality)
{
    $backgroundImagick = new \Imagick(realpath($imagePath));
    $imagick = new \Imagick();
    $imagick->setCompressionQuality($quality);
    $imagick->newPseudoImage(
        $backgroundImagick->getImageWidth(),
        $backgroundImagick->getImageHeight(),
        'canvas:white'
    );
    
    $imagick->setFormat("jpg");
    header("Content-Type: image/jpg");
    echo $backgroundImagick->getImageBlob();
}
//Example end

    

//Example Imagick::setImageArtifact
function setImageArtifact()
{
    $src1 = new \Imagick(realpath("./images/artifact/source1.png"));
    $src2 = new \Imagick(realpath("./images/artifact/source2.png"));

    $src2->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
    $src2->setImageArtifact('compose:args', "1,0,-0.5,0.5");
    $src1->compositeImage($src2, Imagick::COMPOSITE_MATHEMATICS, 0, 0);
    
    $src1->setImageFormat('png');
    header("Content-Type: image/png");
    echo $src1->getImagesBlob();
}
//Example end


//Example Imagick::setImageCompressionQuality
function setImageCompressionQuality($imagePath, $quality)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->setImageCompressionQuality($quality);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    

//Example Imagick::setImageOrientation
//Doesn't appear to do anything
function setImageOrientation($imagePath, $orientationType)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->setImageOrientation($orientationType);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::setImageBias
//requires ImageMagick version 6.9.0-1 to have an effect on convolveImage
function setImageBias($bias)
{
    $imagick = new \Imagick(realpath("images/stack.jpg"));

    $xKernel = array(
        -0.70, 0, 0.70,
        -0.70, 0, 0.70,
        -0.70, 0, 0.70
    );

    $imagick->setImageBias($bias * \Imagick::getQuantum());
    $imagick->convolveImage($xKernel, \Imagick::CHANNEL_ALL);

    $imagick->setImageFormat('png');
    
    header('Content-type: image/png');
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::setImageClipMask
function setImageClipMask($imagePath)
{
    $imagick = new \Imagick();
    $imagick->readImage(realpath($imagePath));

    $width = $imagick->getImageWidth();
    $height = $imagick->getImageHeight();

    $clipMask = new \Imagick();
    $clipMask->newPseudoImage(
        $width,
        $height,
        "canvas:transparent"
    );

    $draw = new \ImagickDraw();
    $draw->setFillColor('white');
    $draw->circle(
        $width / 2,
        $height / 2,
        ($width / 2) + ($width / 4),
        $height / 2
    );
    $clipMask->drawImage($draw);
    $imagick->setImageClipMask($clipMask);

    $imagick->negateImage(false);
    $imagick->setFormat("png");

    header("Content-Type: image/png");
    echo $imagick->getImagesBlob();
    
}
//Example end


//Example Imagick::setImageDelay
function setImageDelay()
{
    $imagick = new \Imagick(realpath("images/coolGif.gif"));

    $frameCount = 0;

    foreach ($imagick as $frame) {
        /** @var $frame \Imagick */
        $frame->setImageDelay((($frameCount % 11) * 5));
        $frameCount++;
    }

    $imagick2 = $imagick->deconstructImages();

    header("Content-Type: image/gif");
    echo $imagick2->getImagesBlob();
}
//Example end


//Example Imagick::setImageResolution
function setImageResolution($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->setImageResolution(50, 50);
    
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::setImageTicksPerSecond
function setImageTicksPerSecond()
{
    $imagick = new \Imagick(realpath("images/coolGif.gif"));
    $totalFrames = $imagick->getNumberImages();
    $frameCount = 0;

    foreach ($imagick as $frame) {
        /** @var $frame \Imagick */

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

    $imagick2 = $imagick->deconstructImages();
    header("Content-Type: image/gif");
    echo $imagick2->getImagesBlob();
}
//Example end


//Example Imagick::setIteratorIndex
function setIteratorIndex($firstLayer)
{
    $imagick = new \Imagick(realpath("images/LayerTest.psd"));
    $output = new \Imagick();
    $imagick->setIteratorIndex($firstLayer);

    do {
        $output->addImage($imagick->getimage());
    } while ($imagick->nextImage());

    $merged = $output->mergeImageLayers(\Imagick::LAYERMETHOD_MERGE);

    $merged->setImageFormat('png');
    header("Content-Type: image/png");
    echo $merged->getImageBlob();
}
//Example end


////
//function setOption($imagePath) {
//    $imagick = new \Imagick(realpath($imagePath));
//    $imagick->setImageFormat('jpg');
//    $imagick->setOption('jpeg:extent', '20kb');
//    
//    //"jpeg:perserve","yes"
//    
//    //"quantum:format","floating-point"
//    //"quantum:polarity","min-is-white"
//    //"jpeg:size","120x120"
//    
//    header("Content-Type: image/jpg");
//    echo $imagick->getImageBlob();
//}
////Example end
//

    
    
//Example Imagick::setSamplingFactors
function setSamplingFactors($imagePath)
{
    $imagePath = "../imagick/images/FineDetail.png";
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->setImageFormat('jpg');
    $imagick->setSamplingFactors(array('2x2', '1x1', '1x1'));

    $compressed = $imagick->getImageBlob();

    
    $reopen = new \Imagick();
    $reopen->readImageBlob($compressed);

    $reopen->resizeImage(
        $reopen->getImageWidth() * 4,
        $reopen->getImageHeight() * 4,
        \Imagick::FILTER_POINT,
        1
    );
    
    header("Content-Type: image/jpg");
    echo $reopen->getImageBlob();
}
//Example end
    
//Example Imagick::shadeImage
function shadeImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->shadeImage(true, 45, 20);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::shadowImage
function shadowImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->shadowImage(0.4, 10, 50, 5);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

    
//Example Imagick::sharpenImage
function sharpenImage($imagePath, $radius, $sigma, $channel)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->sharpenimage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::shaveImage
function shaveImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->shaveImage(100, 50);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::shearimage
function shearImage($imagePath, $color, $shearX, $shearY)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->shearimage($color, $shearX, $shearY);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::sigmoidalContrastImage
function sigmoidalContrastImage($imagePath, $sharpening, $midpoint, $sigmoidalContrast)
{
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
//Example end


//Example Imagick::sketchimage
function sketchImage($imagePath, $radius, $sigma, $angle)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->sketchimage($radius, $sigma, $angle);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    
//Example Imagick::smushImages
function smushImages($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick2 = new \Imagick(realpath("images/coolGif.gif"));

    $imagick->addimage($imagick2);
    $smushed = $imagick->smushImages(false, 50);
    $smushed->setImageFormat('jpg');
    header("Content-Type: image/jpg");
    echo $smushed->getImageBlob();
}
//Example end


//Example Imagick::solarizeImage
function solarizeImage($imagePath, $solarizeThreshold)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->solarizeImage($solarizeThreshold * \Imagick::getQuantum());
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::spliceImage
function spliceImage($imagePath, $startX, $startY, $width, $height)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->spliceImage($width, $height, $startX, $startY);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::spreadImage
function spreadImage($imagePath, $radius)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->spreadImage($radius);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::statisticImage
function statisticImage($imagePath, $statisticType, $w20, $h20, $channel)
{
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
//Example end


//Example Imagick::stereoImage
function stereoImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    //TODO - Need some stereo image to work with.
    $imagick->stereoImage(true, 45, 20);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::subImageMatch
function subImageMatch($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick2 = clone $imagick;
    $imagick2->cropimage(40, 40, 250, 110);
    $imagick2->vignetteimage(0, 1, 3, 3);

    $similarity = null;
    $bestMatch = null;
    $comparison = $imagick->subImageMatch($imagick2, $bestMatch, $similarity);

    $comparison->setImageFormat('png');
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
//Example end



//Example Imagick::swirlImage
function swirlImage($imagePath, $swirl)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->swirlImage($swirl);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::textureImage
function textureImage($imagePath)
{
    $image = new \Imagick();
    $image->newImage(640, 480, new \ImagickPixel('pink'));
    $image->setImageFormat("jpg");
    $texture = new \Imagick(realpath($imagePath));
    $texture->scaleimage($image->getimagewidth() / 4, $image->getimageheight() / 4);
    $image = $image->textureImage($texture);
    header("Content-Type: image/jpg");
    echo $image;
}
//Example end


//Example Imagick::thresholdimage
function thresholdimage($imagePath, $threshold, $channel)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->thresholdimage($threshold * \Imagick::getQuantum(), $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::thumbnailImage
function thumbnailImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->setbackgroundcolor('rgb(64, 64, 64)');
    $imagick->thumbnailImage(100, 100, true, true);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::tintImage
function tintImage($r, $g, $b, $a)
{
    $a = $a / 100;

    $imagick = new \Imagick();
    $imagick->newPseudoImage(400, 400, 'gradient:black-white');

    $tint = new \ImagickPixel("rgb($r, $g, $b)");
    $opacity = new \ImagickPixel("rgba(".(255 *$a*100).", $g, $b, $a)");
    
    
    $imagick->tintImage($tint, $opacity);
    $imagick->setImageFormat('png');
    
    $draw = new \ImagickDraw();
    $draw->setStrokeColor('black');
    $draw->setFillColor('white');
 
    $draw->setStrokeWidth(1);
    $draw->setFontSize(36);
    
    $imagick->annotateImage($draw, 50, 50, 0, "Alpha is $a");
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::transformimage
function transformimage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $newImage = $imagick->transformimage("400x600", "200x300");
    header("Content-Type: image/jpg");
    echo $newImage->getImageBlob();
}
//Example end


//Example Imagick::transformImageColorspace
function transformImageColorspace($imagePath, $colorSpace, $channel)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->transformimagecolorspace($colorSpace);
    $imagick->separateImageChannel($channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::transparentPaintImage
function transparentPaintImage($color, $alpha, $fuzz, $inverse)
{
    $imagick = new \Imagick(realpath("images/BlueScreen.jpg"));

    //Need to be in a format that supports transparency
    $imagick->setimageformat('png');

    $imagick->transparentPaintImage(
        $color, $alpha, $fuzz * \Imagick::getQuantum(), $inverse
    );

    //Not required, but helps tidy up left over pixels
    $imagick->despeckleimage();
    
    $canvas = new Imagick();
    $canvas->newPseudoImage(
        $imagick->getImageWidth(),
        $imagick->getImageHeight(),
        "pattern:checkerboard"
    );
    
    $canvas->compositeimage($imagick, \Imagick::COMPOSITE_ATOP, 0, 0);
    $canvas->setImageFormat('png');

    header("Content-Type: image/png");
    echo $canvas->getImageBlob();
}
//Example end


//Example Imagick::transposeImage
function transposeImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->transposeImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::transverseImage
function transverseImage($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->transverseImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::trimImage
function trimImage($color, $fuzz)
{
    $imagick = new \Imagick(realpath("images/BlueScreen.jpg"));
    $imagick->borderImage($color, 10, 10);
    $imagick->trimImage($fuzz * \Imagick::getQuantum());

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::uniqueImageColors
function uniqueImageColors($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    //Reduce the image to 256 colours nicely.
    $imagick->quantizeImage(256, \Imagick::COLORSPACE_YIQ, 0, false, false);
    $imagick->uniqueImageColors();
    $imagick->scaleimage($imagick->getImageWidth(), $imagick->getImageHeight() * 20);
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::unsharpMaskImage
function unsharpMaskImage($imagePath, $radius, $sigma, $amount, $unsharpThreshold)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->unsharpMaskImage($radius, $sigma, $amount, $unsharpThreshold);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::vignetteImage
function vignetteImage($imagePath, $blackPoint, $whitePoint, $x, $y)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->vignetteImage($blackPoint, $whitePoint, $x, $y);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::waveImage WaveImage can be quite slow
function waveImage($imagePath, $amplitude, $length)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->waveImage($amplitude, $length);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::whiteThresholdImage
function whiteThresholdImage($imagePath, $color)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->whiteThresholdImage($color);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
