<?php

namespace ImagickDemo\Imagick;
 
use Imagick;
use ImagickDraw;

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


    
//function renderFile(CachingFileBodyFactory $fileResponseFactory, $filename, $downloadFilename)
//{
//    return $fileResponseFactory->create($filename, $downloadFilename, "image/jpg");
//}
//

//Example Imagick::adaptiveBlurImage
function adaptiveBlurImage($image_path, $radius, $sigma, $channel)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->adaptiveBlurImage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::adaptiveResizeImage
function adaptiveResizeImage($image_path, $width, $height, $bestFit)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->adaptiveResizeImage($width, $height, $bestFit);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::adaptiveSharpenImage
function adaptiveSharpenImage($image_path, $radius, $sigma, $channel)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->adaptiveSharpenImage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    
//Example Imagick::adaptiveThresholdImage
function adaptiveThresholdImage($image_path, $width, $height, $adaptiveOffset)
{
    $imagick = new \Imagick(realpath($image_path));
    $adaptiveOffsetQuantum = intval($adaptiveOffset * \Imagick::getQuantum());
    $imagick->adaptiveThresholdImage($width, $height, $adaptiveOffsetQuantum);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::addNoiseImage
function addNoiseImage($noiseType, $image_path, $channel)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->addNoiseImage($noiseType, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::affineTransformImage
function affineTransformImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
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
function annotateImage($image_path, $strokeColor, $fillColor)
{
    $imagick = new \Imagick(realpath($image_path));

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
            "../public/images/lories/IMG_1599_480.jpg",
            "../public/images/lories/IMG_2561_480.jpg"
        ],
        [
            "../public/images/lories/IMG_2837_480.jpg",
            "../public/images/lories/IMG_4023_480.jpg"
        ]
    ];
    
    $canvas = new Imagick();

    foreach ($images as $imageRow) {
        $rowImagick = new Imagick();
        $rowImagick->setBackgroundColor('gray');
        foreach ($imageRow as $image_path) {
            $imagick = new Imagick(realpath($image_path));
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
function autoLevelImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->autoLevelImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::averageImages
function averageImages($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
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
function blackThresholdImage($image_path, $thresholdColor)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->blackthresholdimage($thresholdColor);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::blueShiftImage
function blueShiftImage($image_path, $blueShift)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->blueShiftImage($blueShift);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::blurImage
function blurImage($image_path, $radius, $sigma, $channel)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->blurImage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::borderImage
function borderImage($image_path, $color, $width, $height)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->borderImage($color, $width, $height);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::brightnessContrastImage
function brightnessContrastImage($image_path, $brightness, $contrast, $channel)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->brightnessContrastImage($brightness, $contrast, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::charcoalImage
function charcoalImage($image_path, $radius, $sigma)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->charcoalImage($radius, $sigma);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::chopImage
function chopImage($image_path, $startX, $startY, $width, $height)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->chopImage($width, $height, $startX, $startY);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::clipImage
function clipImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->clipImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end



//Example Imagick::coalesceImages
function coalesceImages()
{
    $image_paths = [
        "../public/images/lories/IMG_1599_480.jpg",
        "../public/images/lories/IMG_2561_480.jpg",
        "../public/images/lories/IMG_2837_480.jpg",
        "../public/images/lories/IMG_4023_480.jpg",
    ];

    $canvas = new Imagick();
    foreach ($image_paths as $image_path) {
        $canvas->readImage(realpath($image_path));
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
function colorDecisionListImage($image_path)
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

    $imagick = new \Imagick(realpath($image_path));

    $imagick->colorDecisionListImage($imagick);
    
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end



//Example Imagick::colorFloodfillImage
function colorFloodfillImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
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
function colorizeImage($image_path, $color, $opacity_color)
{
    $imagick = new \Imagick(realpath($image_path));
//    $opacity = $opacity / 255.0;
    $imagick->colorizeImage($color, $opacity_color);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();

//    $imagick = new \Imagick();
//    $imagick->newPseudoImage(640, 480, "magick:logo");
//    $imagick->colorizeImage($color, $opacityColor);
//
//    $imagick->setImageFormat('png');
//    $imagick->writeImage(__DIR__ . "/colourize_new.png");



}
//Example end


//TODO - understand what a color matrix is...
//Example Imagick::colorMatrixImage
function colorMatrixImage($image_path, $color_matrix)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->setImageAlpha(1);

    // Imagick expects the values to be in a flat (single dimension)
    // array, but we have a 2d array, so flatten the values.
    $color_matrix_values = [];
    foreach ($color_matrix as $row => $values) {
        foreach ($values as $value) {
            $color_matrix_values[] = $value;
        }
    }

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
    $imagick->colorMatrixImage($color_matrix_values);
    
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
function constituteImage($image_path)
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
function contrastImage($image_path, $contrastType)
{
    $imagick = new \Imagick(realpath($image_path));
    if ($contrastType != 2) {
        $imagick->contrastImage($contrastType);
    }

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::convolveImage
function convolveImage($image_path, $bias, $convolve_matrix)
{
    $imagick = new \Imagick(realpath($image_path));
    //$edgeFindingKernel = [-1, -1, -1, -1, 8, -1, -1, -1, -1,];
    $imagick->setImageBias($bias * \Imagick::getQuantum());
    $imagick->convolveImage($convolve_matrix);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::cropImage
function cropImage($image_path, $startX, $startY, $width, $height)
{
    $imagick = new \Imagick(realpath($image_path));
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

//    $deskewImagick->cropImage($deskewImagick->getImageWidth() - $trim, $deskewImagick->getImageHeight(), $trim, 0);
//    $imagick->cropImage($imagick->getImageWidth() - $trim, $imagick->getImageHeight(), $trim, 0);
//    $deskewImagick->resizeimage($deskewImagick->getImageWidth() / 2, $deskewImagick->getImageHeight() / 2, \Imagick::FILTER_LANCZOS, 1);
//    $imagick->resizeimage($imagick->getImageWidth() / 2, $imagick->getImageHeight() / 2, \Imagick::FILTER_LANCZOS, 1);
//    $newCanvas = new \Imagick();
//    $newCanvas->newimage($imagick->getImageWidth() + $deskewImagick->getImageWidth() + 20, $imagick->getImageHeight(), 'red', 'jpg');
//    $newCanvas->compositeimage($imagick, \Imagick::COMPOSITE_COPY, 5, 0);
//    $newCanvas->compositeimage($deskewImagick, \Imagick::COMPOSITE_COPY, $imagick->getImageWidth() + 10, 0);

    header("Content-Type: image/jpg");
    echo $deskewImagick->getImageBlob();
}
//Example end

//Example Imagick::despeckleImage
function despeckleImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->despeckleImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::drawImage
function drawImage()
{
    $strokeColor = 'black';
    $fillColor = 'plum1';

    $draw = new \ImagickDraw();

    $draw->setStrokeOpacity(1);
    $draw->setStrokeColor($strokeColor);
    $draw->setStrokeWidth(1.2);
    $draw->setFont("../fonts/Arial.ttf");
    $draw->setFontSize(64);

    $draw->setFillColor($fillColor);

    $draw->rotate(-12);
    $draw->annotation(140, 380, "c'est ne pas \nune Lorikeet!");

    $imagick = new \Imagick(realpath("../public/images/lories/IMG_1599_480.jpg"));
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::edgeImage
function edgeImage($image_path, $radius)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->edgeImage($radius);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::enhanceImage
function enhanceImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->enhanceImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::embossImage
function embossImage($image_path, $radius, $sigma)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->embossImage($radius, $sigma);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    
//Example Imagick::equalizeImage
function equalizeImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->equalizeImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::evaluateImage
function evaluateImage($evaluate_type, $first_term, $gradient_start_color, $gradient_end_color)
{
    $imagick = new \Imagick();
    $size = 400;
    $imagick->newPseudoImage(
        $size,
        $size,
        "gradient:$gradient_start_color-$gradient_end_color"
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

    if (in_array($evaluate_type, $unscaledTypes)) {
        $imagick->evaluateimage($evaluate_type, $first_term);
    }
    else if (in_array($evaluate_type, $quantumScaledTypes)) {
        $imagick->evaluateimage($evaluate_type, $first_term * \Imagick::getQuantum());
    }
    else {
        throw new \Exception("Evaluation type $evaluate_type is not listed as either scaled or unscaled");
    }

    $imagick->setimageformat('png');
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
//Example end



//Example Imagick::extentImage
function extentImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
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
function exportImagePixels($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
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
function filter($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
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
function flipImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
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
function flopImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
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


function forwardFourierTransformImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
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
function frameImage(
    $image_path,
    $color,
    $width,
    $height,
    $inner_bevel,
    $outer_bevel
) {
    $imagick = new \Imagick(realpath($image_path));

    $width = $width + $inner_bevel + $outer_bevel;
    $height = $height + $inner_bevel + $outer_bevel;

    $imagick->frameimage(
        $color,
        $width,
        $height,
        $inner_bevel,
        $outer_bevel
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
function gammaImage($image_path, $gamma, $channel)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->gammaImage($gamma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::gaussianBlurImage
function gaussianBlurImage($image_path, $radius, $sigma, $channel)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->gaussianBlurImage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end



function getImageGeometry($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//Example Imagick::getPixelIterator
function getPixelIterator($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
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

function getImageHistogram($image_path)
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

    $imagick = new \Imagick(realpath($image_path));
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
function getPixelRegionIterator($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
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


function getImageChannelStatistics($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}

//function getImageCompression($image_path)
//{
//    $imagick = new \Imagick(realpath($image_path));
//    header("Content-Type: image/jpg");
//    echo $imagick->getImageBlob();
//}


//Example Imagick::haldClutImage
function haldClutImage($image_path, $hald_clut_type)
{
    $imagick = new \Imagick(realpath($image_path));
    $haldClutImage = new \Imagick(realpath($hald_clut_type));
    $imagick->haldClutImage($haldClutImage);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::implodeImage
function implodeImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
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
function labelImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
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
function linearStretchImage($image_path, $blackThreshold, $whiteThreshold)
{
    $imagick = new \Imagick(realpath($image_path));
    $pixels = $imagick->getImageWidth() * $imagick->getImageHeight();
    // TODO - I'm really not sure if the scaling is meant to be done
    // by number of pixels or by ::getQuantum()
    $imagick->linearStretchImage(
//        $blackThreshold * $pixels,
//        $whiteThreshold * $pixels
        $blackThreshold * Imagick::getQuantum(),
        $whiteThreshold * Imagick::getQuantum()
    );

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    

//Example Imagick::magnifyImage
function magnifyImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->magnifyImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    

//Example Imagick::medianFilterImage
function medianFilterImage($radius, $image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    @$imagick->medianFilterImage($radius);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::mergeImageLayers
function mergeImageLayers($layerMethodType)
{
    //$imagick = new \Imagick(realpath("images/LayerTest.psd"));
    //$imagick = new \Imagick(realpath("../public/images/Biter_500.jpg"));
    $imagick = new \Imagick(realpath("../public/images/redDiscAlpha.png"));
    
    
//    
//    $imagick = new \Imagick();
    $blueDisc = new \Imagick(realpath("../public/images/blueDiscAlpha.png"));
    $imagick->addImage($blueDisc);
//    

//    $imagick->addImage($whiteDisc);
    
    $greenDisc = new \Imagick(realpath("../public/images/greenDiscAlpha.png"));
    $imagick->addImage($greenDisc);
    $imagick->setImageFormat('png');

    $result = $imagick->mergeImageLayers($layerMethodType);
    header("Content-Type: image/png");

    echo $result->getImageBlob();
}
//Example end
    
    
//Example Imagick::modulateImage
function modulateImage($image_path, $hue, $brightness, $saturation)
{
    $imagick = new \Imagick(realpath($image_path));
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
        "../public/images/Biter_500.jpg",
        "../public/images/SydneyPeople_400.jpg",
        "../public/images/Skyline_400.jpg",
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
        "../public/images/lories/IMG_1599_480.jpg",
        "../public/images/lories/6E6F9109_480.jpg",
        "../public/images/lories/IMG_2561_480.jpg",
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
        "../public/images/Biter_500.jpg",
        "../public/images/SydneyPeople_400.jpg",
        "../public/images/Skyline_400.jpg",
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
function motionBlurImage($image_path, $radius, $sigma, $angle, $channel)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->motionBlurImage($radius, $sigma, $angle, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::negateImage
function negateImage($image_path, $grayOnly, $channel)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->negateImage($grayOnly, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::newPseudoImage
function newPseudoImage($canvasType)
{
    $imagick = new \Imagick();
    // Some canvas types (e.g. hald, magick:rose) ignore
    // the size as they have predefined size.
    $imagick->newPseudoImage(300, 300, $canvasType);
    $imagick->setImageFormat("png");
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::normalizeImage
function normalizeImage($image_path, $channel)
{
    $imagick = new \Imagick(realpath($image_path));
    $original = clone $imagick;
    $original->cropimage($original->getImageWidth() / 2, $original->getImageHeight(), 0, 0);
    $imagick->normalizeImage($channel);
    $imagick->compositeimage($original, \Imagick::COMPOSITE_ATOP, 0, 0);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::oilPaintImage
function oilPaintImage($image_path, $radius)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->oilPaintImage($radius);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::orderedPosterizeImage
function orderedPosterizeImage($image_path, $orderedPosterizeType)
{
    $imagick = new \Imagick(realpath($image_path));
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
function polaroidImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagickDraw = new \ImagickDraw();
    $imagick->polaroidImage($imagickDraw, 15);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    


//Example Imagick::posterizeImage
function posterizeImage($image_path, $dither, $numberLevels)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->posterizeImage($numberLevels, $dither);
    $imagick->setImageFormat('png');
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::quantizeImage
function quantizeImage($image_path, $numberColors, $colorSpace, $treeDepth, $dither)
{
    $imagick = new \Imagick(realpath($image_path));
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
    
    $image_pathPattern = "../public/images/spiderGif";
    $fileIterator = new \GlobIterator(realpath($image_pathPattern).'/*.png');

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
function radialBlurImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->radialBlurImage(3);
    $imagick->radialBlurImage(5);
    $imagick->radialBlurImage(7);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::raiseImage
function raiseImage($image_path, $width, $height, $x, $y, $raise)
{
    $imagick = new \Imagick(realpath($image_path));

    //x and y do nothing?
    $imagick->raiseImage($width, $height, $x, $y, $raise);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    

//Example Imagick::randomThresholdimage
function randomThresholdimage($image_path, $lowThreshold, $highThreshold, $channel)
{
    $imagick = new \Imagick(realpath($image_path));

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
function recolorImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
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
function reduceNoiseImage($image_path, $reduceNoise)
{
    $imagick = new \Imagick(realpath($image_path));
    @$imagick->reduceNoiseImage($reduceNoise);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    
//Example Imagick::remapImage
function remapImage($image_path, $ditherMethod)
{
    $imagick = new \Imagick(realpath($image_path));
    $palette = new \Imagick(realpath("images/NetscapeWebSafeColours.gif"));
    $imagick->remapImage($palette, $ditherMethod);
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::resampleImage
function resampleImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));

    $imagick->resampleImage(200, 200, \Imagick::FILTER_LANCZOS, 1);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


    
//Example Imagick::resizeImage
function resizeImage($image_path, $width, $height, $filterType, $blur, $bestFit, $cropZoom)
{
    //The blur factor where &gt; 1 is blurry, &lt; 1 is sharp.
    $imagick = new \Imagick(realpath($image_path));

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
function rollImage($image_path, $rollX, $rollY)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->rollimage($rollX, $rollY);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::rotateImage
function rotateImage($image_path, $angle, $color, $crop)
{
    $imagick = new \Imagick(realpath($image_path));
    
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
function rotationalBlurImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->rotationalBlurImage(3);
    $imagick->rotationalBlurImage(5);
    $imagick->rotationalBlurImage(7);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::roundCorners
function roundCorners($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
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
function scaleImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->scaleImage(150, 150, true);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::segmentImage
function segmentImage($image_path, $colorSpace, $clusterThreshold, $smoothThreshold)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->segmentImage($colorSpace, $clusterThreshold, $smoothThreshold);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::selectiveBlurImage
function selectiveBlurImage($image_path, $radius, $sigma, $threshold, $channel)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->selectiveBlurImage($radius, $sigma, $threshold, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::separateImageChannel
function separateImageChannel($image_path, $channel)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->separateimagechannel($channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end



//Example Imagick::sepiaToneImage
function sepiaToneImage($image_path, $sepia)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->sepiaToneImage($sepia);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::setCompressionQuality
function setCompressionQuality($image_path, $quality)
{
    $backgroundImagick = new \Imagick(realpath($image_path));
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
function setImageCompressionQuality($image_path, $quality)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->setImageCompressionQuality($quality);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    

//Example Imagick::setImageOrientation
//Doesn't appear to do anything
function setImageOrientation($image_path, $orientationType)
{
    $imagick = new \Imagick(realpath($image_path));
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
function setImageClipMask($image_path)
{
    $imagick = new \Imagick();
    $imagick->readImage(realpath($image_path));

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


//Example Imagick::setImageMask
function setImageMask()
{
    $canvas = new Imagick(__DIR__ . '/../../../public/images/trapezoid_image.png');

    $mask = new Imagick();
    $mask->newPseudoImage(
        $canvas->getImageWidth(),
        $canvas->getImageHeight(),
        'xc:black'
    );

    $drawing = new ImagickDraw();
    $drawing->setBorderColor('black');
    $drawing->setFillColor('black');
    $drawing->rectangle(0, 0, $mask->getImageWidth(), $mask->getImageHeight());

    $drawing->setBorderColor('white');
    $drawing->setFillColor('white');
    $drawing->circle(
        $mask->getImageWidth() / 2,
        $mask->getImageHeight() / 2,
        2 * $mask->getImageWidth() / 3,
        $mask->getImageHeight() / 2,
    );

    $mask->drawImage($drawing);


    // This would probably be more useful for users
    // but shows the issue with PIXELMASK_COMPOSITE
    // $mask->blurImage(10, 2);

    $mask_types = array(
        \Imagick::PIXELMASK_READ =>        "PIXELMASK_READ",
        \Imagick::PIXELMASK_WRITE =>       "PIXELMASK_WRITE",
        \Imagick::PIXELMASK_COMPOSITE =>   "PIXELMASK_COMPOSITE",
    );

    $channel_types = array(
        \Imagick::CHANNEL_ALL => "CHANNEL_ALL",
        \Imagick::CHANNEL_RED => "CHANNEL_RED",
        \Imagick::CHANNEL_ALPHA => "CHANNEL_ALPHA",
        \Imagick::CHANNEL_RGBA => "CHANNEL_RGBA",
        \Imagick::CHANNEL_BLACK => "CHANNEL_BLACK",
        \Imagick::CHANNEL_DEFAULT => "CHANNEL_DEFAULT",
    );

//    foreach ($channel_types as $channel_type => $channel_name) {
//        foreach ($mask_types as $type => $type_name) {
            $output = clone $canvas;
            $output->setImageMask($mask, \Imagick::PIXELMASK_WRITE);
            $output->blurImage(15, 4, \Imagick::CHANNEL_ALL);
//        }
//    }

    header("Content-Type: image/jpg");
    echo $output->getImageBlob();
}

//Example end


//Example Imagick::setImageResolution
function setImageResolution($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
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
//function setOption($image_path) {
//    $imagick = new \Imagick(realpath($image_path));
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
function setSamplingFactors($image_path)
{
    $image_path = "../public/images/FineDetail.png";
    $imagick = new \Imagick(realpath($image_path));
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
function shadeImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->shadeImage(true, 45, 20);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::shadowImage
function shadowImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->shadowImage(0.4, 10, 50, 5);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

    
//Example Imagick::sharpenImage
function sharpenImage($image_path, $radius, $sigma, $channel)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->sharpenimage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::shaveImage
function shaveImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->shaveImage(100, 50);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::shearimage
function shearImage($image_path, $color, $shearX, $shearY)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->shearimage($color, $shearX, $shearY);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::sigmoidalContrastImage
function sigmoidalContrastImage($image_path, $sharpening, $midpoint, $sigmoidalContrast)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->sigmoidalcontrastimage(
        $sharpening,
        $midpoint,
        $sigmoidalContrast * \Imagick::getQuantum()
    );
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::sketchimage
function sketchImage($image_path, $radius, $sigma, $angle)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->sketchimage($radius, $sigma, $angle);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end
    
//Example Imagick::smushImages
function smushImages($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick2 = new \Imagick(realpath("images/coolGif.gif"));

    $imagick->addimage($imagick2);
    $smushed = $imagick->smushImages(false, 50);
    $smushed->setImageFormat('jpg');
    header("Content-Type: image/jpg");
    echo $smushed->getImageBlob();
}
//Example end


//Example Imagick::solarizeImage
function solarizeImage($image_path, $solarizeThreshold)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->solarizeImage($solarizeThreshold * \Imagick::getQuantum());
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::spliceImage
function spliceImage($image_path, $startX, $startY, $width, $height)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->spliceImage($width, $height, $startX, $startY);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::spreadImage
function spreadImage($image_path, $radius)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->spreadImage($radius);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::statisticImage
function statisticImage($image_path, $statisticType, $width, $height, $channel)
{
    $imagick = new \Imagick(realpath($image_path));

    $imagick->statisticImage(
        $statisticType,
        $width,
        $height,
        $channel
    );

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::stereoImage
function stereoImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    //TODO - Need some stereo image to work with.
    $imagick->stereoImage(true, 45, 20);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::subImageMatch
function subImageMatch($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick2 = clone $imagick;
    $imagick2->cropimage(40, 40, 250, 110);
    $imagick2->vignetteimage(0, 1, 3, 3);

    $similarity = null;
    $bestMatch = null;
    $comparison = $imagick->subImageMatch($imagick2, $bestMatch, $similarity);

    $comparison->setImageFormat('png');
    header("Content-Type: image/png");
    echo $comparison->getImageBlob();
}
//Example end



//Example Imagick::swirlImage
function swirlImage($image_path, $swirl)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->swirlImage($swirl);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end

//Example Imagick::textureImage
function textureImage($image_path)
{
    $image = new \Imagick();
    $image->newImage(640, 480, new \ImagickPixel('pink'));
    $image->setImageFormat("jpg");
    $texture = new \Imagick(realpath($image_path));
    $texture->scaleimage($image->getimagewidth() / 4, $image->getimageheight() / 4);
    $image = $image->textureImage($texture);
    header("Content-Type: image/jpg");
    echo $image;
}
//Example end


//Example Imagick::thresholdimage
function thresholdimage($image_path, $threshold, $channel)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->thresholdimage($threshold * \Imagick::getQuantum(), $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::thumbnailImage
function thumbnailImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
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
function transformimage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    $newImage = $imagick->transformimage("400x600", "200x300");
    header("Content-Type: image/jpg");
    echo $newImage->getImageBlob();
}
//Example end


//Example Imagick::transformImageColorspace
function transformImageColorspace($image_path, $colorSpace, $channel_number)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->transformimagecolorspace($colorSpace);
    $imagick->separateImageChannel($channel_number);
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
function transposeImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->transposeImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::transverseImage
function transverseImage($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
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
function uniqueImageColors($image_path)
{
    $imagick = new \Imagick(realpath($image_path));
    //Reduce the image to 256 colours nicely.
    $imagick->quantizeImage(256, \Imagick::COLORSPACE_YIQ, 0, false, false);
    $imagick->uniqueImageColors();
    $imagick->scaleimage($imagick->getImageWidth(), $imagick->getImageHeight() * 20);
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::unsharpMaskImage
function unsharpMaskImage($image_path, $radius, $sigma, $amount, $unsharpThreshold)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->unsharpMaskImage($radius, $sigma, $amount, $unsharpThreshold);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::vignetteImage
function vignetteImage($image_path, $blackPoint, $whitePoint, $x, $y)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->vignetteImage($blackPoint, $whitePoint, $x, $y);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::waveImage WaveImage can be quite slow
function waveImage($image_path, $amplitude, $length)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->waveImage($amplitude, $length);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end


//Example Imagick::whiteThresholdImage
function whiteThresholdImage($image_path, $threshold_color)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->whiteThresholdImage($threshold_color);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
//Example end



function websafeColors()
{
    return [
    '000000', 
    '000033', 
    '000066', 
    '000099', 
    '0000CC', 
    '0000FF', 
    '003300', 
    '003333', 
    '003366', 
    '003399', 
    '0033CC', 
    '0033FF', 
    '006600', 
    '006633', 
    '006666', 
    '006699', 
    '0066CC', 
    '0066FF', 
    '009900', 
    '009933', 
    '009966', 
    '009999', 
    '0099CC', 
    '0099FF', 
    '00CC00', 
    '00CC33', 
    '00CC66', 
    '00CC99', 
    '00CCCC', 
    '00CCFF', 
    '00FF00', 
    '00FF33', 
    '00FF66', 
    '00FF99', 
    '00FFCC', 
    '00FFFF', 
    '330000', 
    '330033', 
    '330066', 
    '330099', 
    '3300CC', 
    '3300FF', 
    '333300', 
    '333333', 
    '333366', 
    '333399', 
    '3333CC', 
    '3333FF', 
    '336600', 
    '336633', 
    '336666', 
    '336699', 
    '3366CC', 
    '3366FF', 
    '339900', 
    '339933', 
    '339966', 
    '339999', 
    '3399CC', 
    '3399FF', 
    '33CC00', 
    '33CC33', 
    '33CC66', 
    '33CC99', 
    '33CCCC', 
    '33CCFF', 
    '33FF00', 
    '33FF33', 
    '33FF66', 
    '33FF99', 
    '33FFCC', 
    '33FFFF', 
    '660000', 
    '660033', 
    '660066', 
    '660099', 
    '6600CC', 
    '6600FF', 
    '663300', 
    '663333', 
    '663366', 
    '663399', 
    '6633CC', 
    '6633FF', 
    '666600', 
    '666633', 
    '666666', 
    '666699', 
    '6666CC', 
    '6666FF', 
    '669900', 
    '669933', 
    '669966', 
    '669999', 
    '6699CC', 
    '6699FF', 
    '66CC00', 
    '66CC33', 
    '66CC66', 
    '66CC99', 
    '66CCCC', 
    '66CCFF', 
    '66FF00', 
    '66FF33', 
    '66FF66', 
    '66FF99', 
    '66FFCC', 
    '66FFFF', 
    '990000', 
    '990033', 
    '990066', 
    '990099', 
    '9900CC', 
    '9900FF', 
    '993300', 
    '993333', 
    '993366', 
    '993399', 
    '9933CC', 
    '9933FF', 
    '996600', 
    '996633', 
    '996666', 
    '996699', 
    '9966CC', 
    '9966FF', 
    '999900', 
    '999933', 
    '999966', 
    '999999', 
    '9999CC', 
    '9999FF', 
    '99CC00', 
    '99CC33', 
    '99CC66', 
    '99CC99', 
    '99CCCC', 
    '99CCFF', 
    '99FF00', 
    '99FF33', 
    '99FF66', 
    '99FF99', 
    '99FFCC', 
    '99FFFF', 
    'CC0000', 
    'CC0033', 
    'CC0066', 
    'CC0099', 
    'CC00CC', 
    'CC00FF', 
    'CC3300', 
    'CC3333', 
    'CC3366', 
    'CC3399', 
    'CC33CC', 
    'CC33FF', 
    'CC6600', 
    'CC6633', 
    'CC6666', 
    'CC6699', 
    'CC66CC', 
    'CC66FF', 
    'CC9900', 
    'CC9933', 
    'CC9966', 
    'CC9999', 
    'CC99CC', 
    'CC99FF', 
    'CCCC00', 
    'CCCC33', 
    'CCCC66', 
    'CCCC99', 
    'CCCCCC', 
    'CCCCFF', 
    'CCFF00', 
    'CCFF33', 
    'CCFF66', 
    'CCFF99', 
    'CCFFCC', 
    'CCFFFF', 
    'FF0000', 
    'FF0033', 
    'FF0066', 
    'FF0099', 
    'FF00CC', 
    'FF00FF', 
    'FF3300', 
    'FF3333', 
    'FF3366', 
    'FF3399', 
    'FF33CC', 
    'FF33FF', 
    'FF6600', 
    'FF6633', 
    'FF6666', 
    'FF6699', 
    'FF66CC', 
    'FF66FF', 
    'FF9900', 
    'FF9933', 
    'FF9966', 
    'FF9999', 
    'FF99CC', 
    'FF99FF', 
    'FFCC00', 
    'FFCC33', 
    'FFCC66', 
    'FFCC99', 
    'FFCCCC', 
    'FFCCFF', 
    'FFFF00', 
    'FFFF33', 
    'FFFF66', 
    'FFFF99', 
    'FFFFCC', 
    'FFFFFF', 
    ];

}
