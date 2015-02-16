<?php

namespace ImagickDemo\ImagickKernel {
    
use ImagickKernel;

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

function renderKernelTable($matrix) {
    $output = "<table>";

    foreach ($matrix as $row) {
        $output .= "<tr>";
        foreach ($row as $cell) {
            $output .= "<td>";
            if ($cell === false) {
                $output .= "false";
            }
            else {
                $output .= round($cell, 3);
            }
            $output .= "</td>";
        }
        $output .= "</tr>";
    }

    $output .= "</table>";

    return $output;
}
    
    
    
function renderKernel(ImagickKernel $imagickKernel) {
    $matrix = $imagickKernel->getValues();
    
    $imageMargin = 20;
    
    $tileSize = 20;
    $tileSpace = 4;
    $shadowSigma = 4;
    $shadowDropX = 20;
    $shadowDropY = 0;

    $radius = ($tileSize / 2) * 0.9;

    $rows = count($matrix);
    $columns = count($matrix[1]);
 
    $imagickDraw = new \ImagickDraw();

    $imagickDraw->setFillColor('#afafaf');
    $imagickDraw->setStrokeColor('none');
    
    $imagickDraw->translate($imageMargin, $imageMargin);
    $imagickDraw->push();
    foreach ($matrix as $row) {
        $imagickDraw->push();
        foreach ($row as $cell) {
            if ($cell !== false) {
                $color = intval(255 * $cell);
                $colorString = sprintf("rgb(%f, %f, %f)", $color, $color, $color);
                $imagickDraw->setFillColor($colorString);
                $imagickDraw->rectangle(0, 0, $tileSize, $tileSize);
            }
            $imagickDraw->translate(($tileSize + $tileSpace), 0);
        }
        $imagickDraw->pop();
        $imagickDraw->translate(0, ($tileSize + $tileSpace));
    }

    $imagickDraw->pop();

    $width = ($columns * $tileSize) + (($columns - 1) * $tileSpace);
    $height = ($rows * $tileSize) + (($rows - 1) * $tileSpace);

    $imagickDraw->push();
    $imagickDraw->translate($width/2 , $height/2);
    $imagickDraw->setFillColor('rgba(0, 0, 0, 0)');
    //$imagickDraw->setFillAlpha(0.5);
    $imagickDraw->setStrokeColor('white');
    $imagickDraw->circle(0, 0, $radius - 1, 0);
    $imagickDraw->setStrokeColor('black');
    $imagickDraw->circle(0, 0, $radius, 0);
    $imagickDraw->pop();

    $canvasWidth = $width + (2 * $imageMargin); 
    $canvasHeight = $height + (2 * $imageMargin);

    $kernel = new \Imagick();
    $kernel->newPseudoImage(
        $canvasWidth,
        $canvasHeight,
        'canvas:none'
    );

    $kernel->setImageFormat('png');
    $kernel->drawImage($imagickDraw);

    $kernel->writeImage("./testKernel.png");
    
    /* create drop shadow on it's own layer */
    $shadow = $kernel->clone();
    $shadow->setImageBackgroundColor(new \ImagickPixel('rgb(0, 0, 0)'));
    $shadow->shadowImage(100, $shadowSigma, $shadowDropX, $shadowDropY);

    $shadow->setImagePage($canvasWidth, $canvasHeight, -5, -5);
    //$shadow->resetImagePage("91x91+0+0");
    $shadow->cropImage($canvasWidth, $canvasHeight, 0, 0);
    
    /* composite original text_layer onto shadow_layer */
    $shadow->compositeImage($kernel, \Imagick::COMPOSITE_OVER, 0, 0);

    $shadow->setImageFormat('png');
    header("Content-Type: image/png");
    echo $shadow->getImageBlob();

}

//Example ImagickKernel::
function construct() {

  
}
//Example end


//Example ImagickKernel::addKernel
function addKernel($imagePath) {

    $matrix1 = [
        [-1, -1, -1],
        [ 0,  0,  0],
        [ 1,  1,  1],
    ];

    $matrix2 = [
        [-1,  0,  1],
        [-1,  0,  1],
        [-1,  0,  1],
    ];

    $kernel1 = ImagickKernel::fromArray($matrix1);
    $kernel2 = ImagickKernel::fromArray($matrix2);

    $combinedKernel = $kernel1->addKernel($kernel2);

    $imagick = new \Imagick(realpath($imagePath));
    $imagick->filter($combinedKernel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();

}
//Example end
    

//Example ImagickKernel::addUnityKernel
function addUnityKernel($imagePath) {

    $matrix = [
        [-1, 0, -1],
        [ 0, 4,  0],
        [-1, 0, -1],
    ];

    $kernel = ImagickKernel::fromArray($matrix);

    $kernel->scale(4, \Imagick::NORMALIZE_KERNEL_VALUE);
    $kernel->addUnityKernel(0.5);


    $imagick = new \Imagick(realpath($imagePath));
    $imagick->filter($kernel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();

}
//Example end

//Example ImagickKernel::fromArray
function fromArray() {
    
    $matrix = [
        [-1, 0, -1],
        [0, 4, 0],
        [-1, 0, -1],
    ];

    $kernel = \ImagickKernel::fromArray($matrix);

    renderKernel($kernel);
}
//Example end
    
function fromBuiltin() {


    $diamondKernel = ImagickKernel::fromBuiltIn(
        \Imagick::KERNEL_DIAMOND,
        "3,2"
    );

    renderKernel($diamondKernel);
}

    
    
    
//'getValues'
//'scale'
//'separate'
    
    
    
    
    
    
    
    
    
    
    
    
    
//
//    class ImagickKernel {
//
//        // Create a kernel from an 2d matrix of values. Each value should either
//        // be a float (if the element should be used) or 'false' if the element
//        // should be skipped.
//        public static function fromArray(array $values) {}
//
//        // Create a kernel from a builtin in kernel.
//        // See http://www.imagemagick.org/Usage/morphology/#kernel for examples.
//        // Currently the 'rotation' symbol are not supported.
//        // $diamondKernel = ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DIAMOND, "2");
//        public static function fromBuiltIn($kernelType, $string){}
//
//        // Get the 2d matrix of values used in this kernel. The elements are either
//        // float for elements that are used or 'false' if the element should be skipped.
//        public function getValues(){}
//
//        // Attach another kernel to this kernel to allow them to both be applied 
//        // in a single morphology or filter function.
//        public function addKernel(ImagickKernel $kernel){}
//
//        // Separates a linked set of kernels and returns an array of ImagickKernels.
//        public function separate();
//
//        // Adds a given amount of the 'Unity' Convolution Kernel to the given pre-scaled
//        // and normalized Kernel. This in effect adds that amount of the original image 
//        // into the resulting convolution kernel. The resulting effect is to convert the
//        // defined kernels into blended soft-blurs, unsharp kernels or into sharpening
//        // kernels.
//        function addUnityKernel(float scale) {}
//
//    // Adds a given amount of the 'Unity' Convolution Kernel to the given pre-scaled
//    // and normalized Kernel. This in effect adds that amount of the original image 
//    // into the resulting convolution kernel. The resulting effect is to convert the
//    // defined kernels into blended soft-blurs, unsharp kernels or into sharpening kernels.
//    // Flag should be one of NORMALIZE_KERNEL_VALUE, NORMALIZE_KERNEL_CORRELATE, 
//    // NORMALIZE_KERNEL_PERCENT or not set.
//    function scale(float $scaling_factor, $normalizeFlag = 0){}
//}
//
//
//    


}




 