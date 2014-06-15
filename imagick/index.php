<?php

use \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor;


if (defined('LOW_MEM_CLASS_LOADER') && LOW_MEM_CLASS_LOADER == true) {
    require_once('../vendor/intahwebz/lowmemoryclassloader/LowMemoryClassloader.php');
}
else {
    require_once('../vendor/autoload.php');
}


function myBad( Exception $ex ) {
    
    if (headers_sent() == false) {
        header("HTTP/1.0 500 Internal Server Error", true, 500);
    }
    else {
        //echo "sup<br/>";
        //Exception after headers sent
    }
    echo "Exception ".get_class($ex).': '.$ex->getMessage();

    foreach ($ex->getTrace() as $tracePart) {
        
        if (isset($tracePart['file']) && isset($tracePart['line'])) {
            echo $tracePart['file']." ".$tracePart['line']."<br/>";   
        }
        else if(isset($tracePart["function"])) {
            echo $tracePart["function"]."<br/>";   
        }
        else {
            var_dump($tracePart);
        }
    }

    //TODO - format this
    //var_dump($ex->getTrace());
}


function errorHandler($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting
        return true;
    }

    switch ($errno) {
        case E_CORE_ERROR:
        case E_ERROR: {
            echo "<b>Fatality</b> [$errno] $errstr on line $errline in file $errfile <br />\n";
            break;
        }

        default: {
            echo "<b>errorHandler</b> [$errno] $errstr<br />\n";
            return false;
        }
    }

    /* Don't execute PHP internal error handler */
    return true;
}


function fatalErrorShutdownHandler() {
    $last_error = error_get_last();
    
    if (!$last_error) {
        return false;
    }
    
    switch ($last_error['type']) {
        case (E_ERROR):
        case (E_PARSE): {
            // fatal error
            header("HTTP/1.0 500 Bugger bugger bugger", true, 500);
            var_dump($last_error['type'], $last_error['message'], $last_error['file'], $last_error['line']);
            exit(0);
        }

        case(E_CORE_WARNING): {
            //TODO - report errors properly.
            errorHandler($last_error['type'], $last_error['message'], $last_error['file'], $last_error['line']);
            break;
        }
            
        default: {
            header("HTTP/1.0 500 Unknown fatal error", true, 500);
            var_dump($last_error);
            break;
        }
    }

    return false;
}

register_shutdown_function('fatalErrorShutdownHandler');
set_error_handler('errorHandler');
set_exception_handler('myBad');



function analyzeImage(\Imagick $imagick, $graphWidth = 255, $graphHeight = 127) {

    $sampleHeight = 20;
    $border = 2;

    $imagick->transposeImage();
    $imagick->scaleImage($graphWidth, $sampleHeight);

    $imageIterator = new \ImagickPixelIterator($imagick);

    $luminosityArray = [];

    foreach ($imageIterator as $row => $pixels) { /* Loop trough pixel rows */
        foreach ($pixels as $column => $pixel) { /* Loop through the pixels in the row (columns) */
            /** @var $pixel \ImagickPixel */

            if (false) {
                $color = $pixel->getColor();
                $luminosityArray[] = $color['r'];
            }
            else {
                $hsl = $pixel->getHSL() ;
                $luminosityArray[] = ($hsl['luminosity']);
            }
        }
        $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */
        break;
    }

    $draw = new \ImagickDraw();

    $strokeColor = new \ImagickPixel('red');
    $fillColor = new \ImagickPixel('red');
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(0);
    $draw->setFontSize(72);
    $draw->setStrokeAntiAlias(true);
    $previous = false;

    $x = 0;

    foreach ($luminosityArray as $luminosity) {
        $pos = ($graphHeight - 1) - ($luminosity * ($graphHeight - 1) );

        if ($previous !== false) {
            //printf ( "%d, %d, %d, %d <br/>\n" , $x - 1, $previous, $x, $pos);
            $draw->line($x - 1, $previous, $x, $pos);
        }
        $x += 1;
        $previous = $pos;
    }

    $plot = new \Imagick();
    $plot->newImage($graphWidth, $graphHeight, 'white');
    $plot->drawImage($draw);

    $outputImage = new \Imagick();
    $outputImage->newImage($graphWidth, $graphHeight + $sampleHeight, 'white');
    $outputImage->compositeimage($plot, \Imagick::COMPOSITE_ATOP, 0, 0);

    $outputImage->compositeimage($imagick, \Imagick::COMPOSITE_ATOP, 0, $graphHeight);
    $outputImage->borderimage('black', $border, $border);

    $outputImage->setImageFormat("png");
    header("Content-Type: image/png");
    echo $outputImage;
}

require_once "process.php";


//TODO - add preview function

//RotatePreview,
//  ShearPreview,
//  RollPreview,
//  HuePreview,
//  SaturationPreview,
//  BrightnessPreview,
//  GammaPreview,
//  SpiffPreview,
//  DullPreview,
//  GrayscalePreview,
//  QuantizePreview,
//  DespecklePreview,
//  ReduceNoisePreview,
//  AddNoisePreview,
//  SharpenPreview,
//  BlurPreview,
//  ThresholdPreview,
//  EdgeDetectPreview,
//  SpreadPreview,
//  SolarizePreview,
//  ShadePreview,
//  RaisePreview,
//  SegmentPreview,
//  SwirlPreview,
//  ImplodePreview,
//  WavePreview,
//  OilPaintPreview,
//  CharcoalDrawingPreview,
//  JPEGPreview
