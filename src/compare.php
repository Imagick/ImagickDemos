<?php

require __DIR__.'/../vendor/autoload.php';
//require __DIR__ . "../../imagick-demos.conf.php";
require __DIR__ . '/../src/bootstrap.php';


\ImagickDemo\Imagick\functions::load();
\ImagickDemo\ImagickDraw\functions::load();
\ImagickDemo\ImagickPixel\functions::load();
\ImagickDemo\ImagickPixelIterator\functions::load();
\ImagickDemo\Tutorial\functions::load();


function compareFile($injector, $functionFullname, $filename, $fileExtension) {

    $newFilename = $filename."new1";
    
    generateCompare($injector, $functionFullname, $newFilename);

    //echo "Comparing $filename to $newFilename \n";
    echo ".";
    
    $imagickSrc = new Imagick($filename.$fileExtension);
    $imagickNew = new Imagick($newFilename.$fileExtension);


//    const LAYERMETHOD_UNDEFINED = 0;
//    const LAYERMETHOD_COALESCE = 1;
//    const LAYERMETHOD_COMPAREANY = 2;
//    const LAYERMETHOD_COMPARECLEAR = 3;
//    const LAYERMETHOD_COMPAREOVERLAY = 4;
//    const LAYERMETHOD_DISPOSE = 5;
//    const LAYERMETHOD_OPTIMIZE = 6;
//    const LAYERMETHOD_OPTIMIZEPLUS = 8;
//    const LAYERMETHOD_OPTIMIZETRANS = 9;
//    const LAYERMETHOD_COMPOSITE = 12;
//    const LAYERMETHOD_OPTIMIZEIMAGE = 7;
//    const LAYERMETHOD_REMOVEDUPS = 10;
//    const LAYERMETHOD_REMOVEZERO = 11;
//    const LAYERMETHOD_TRIMBOUNDS = 12;
    
    $result = $imagickSrc->compareImages($imagickNew, \Imagick::LAYERMETHOD_COMPAREANY);
    
    list($imagickDifference, $distance) = $result;
    
    if ($distance > 0.01) {
        echo "Differrence detected in $functionFullname \n";
        /** @var $imagickDifference Imagick */
        $imagickDifference->writeimage($filename."diff".$fileExtension);
    }
}


function generateCompare(\Auryn\Injector $injector, $functionFullname, $filename) {
    
    global $imageType;

    echo "Function ".$functionFullname."\n";
    
    ob_start();
    $injector->execute($functionFullname);

    $image = ob_get_contents();
    ob_end_clean();

    $fullFilename = $filename . "." . strtolower($imageType);

    @mkdir(dirname($filename), 0755, true);
    
    file_put_contents($fullFilename, $image);
}



$allTests = [
    ['Imagick', 'adaptiveBlurImage', 'a:4:{s:6:"radius";s:1:"5";s:5:"sigma";s:1:"1";s:5:"image";s:8:"Lorikeet";s:7:"channel";i:134217727;}'],
    ['Imagick', 'adaptiveBlurImage', 'a:4:{s:6:"radius";s:1:"5";s:5:"sigma";s:1:"1";s:5:"image";s:8:"Lorikeet";s:7:"channel";i:134217727;}'],
    ['Imagick', 'adaptiveBlurImage', 'a:4:{s:6:"radius";i:5;s:5:"sigma";i:1;s:5:"image";s:8:"Lorikeet";s:7:"channel";i:134217727;}'],
    ['Imagick', 'adaptiveResizeImage', 'a:4:{s:11:"resizeWidth";i:200;s:12:"resizeHeight";i:200;s:5:"image";s:8:"Lorikeet";s:7:"bestFit";i:1;}'],
    ['Imagick', 'adaptiveSharpenImage', 'a:4:{s:6:"radius";i:5;s:5:"sigma";i:1;s:5:"image";s:8:"Lorikeet";s:7:"channel";i:134217727;}'],
    ['Imagick', 'adaptiveThresholdImage', 'a:4:{s:5:"width";i:50;s:6:"height";i:20;s:5:"image";s:8:"Lorikeet";s:14:"adaptiveOffset";d:0.125;}'],
    ['Imagick', 'addNoiseImage', 'a:3:{s:5:"image";s:8:"Lorikeet";s:5:"noise";s:9:"Laplacian";s:7:"channel";i:134217727;}'],
    ['Imagick', 'affineTransformImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'annotateImage', 'a:3:{s:5:"image";s:8:"Lorikeet";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['Imagick', 'autoLevelImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'blackThresholdImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:14:"thresholdColor";s:18:"rgb(127, 127, 127)";}'],
    ['Imagick', 'blueShiftImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:9:"blueshift";d:1.5;}'],
    ['Imagick', 'blurImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:6:"radius";i:5;s:5:"sigma";i:1;s:7:"channel";i:134217727;}'],
    ['Imagick', 'borderImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:5:"width";i:50;s:6:"height";i:20;s:5:"color";s:18:"rgb(127, 127, 127)";}'],
    ['Imagick', 'brightnessContrastImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:10:"brightness";i:-20;s:8:"contrast";i:-20;s:7:"channel";i:134217727;}'],
    ['Imagick', 'charcoalImage', 'a:3:{s:6:"radius";i:5;s:5:"sigma";i:1;s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'chopImage', 'a:5:{s:5:"image";s:8:"Lorikeet";s:6:"startX";i:100;s:6:"startY";i:100;s:5:"width";i:50;s:6:"height";i:50;}'],
    ['Imagick', 'clutImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'colorizeImage', 'a:3:{s:5:"image";s:8:"Lorikeet";s:5:"color";s:18:"rgb(127, 127, 127)";s:7:"opacity";i:100;}'],
    ['Imagick', 'colorMatrixImage', 'a:26:{s:5:"image";s:8:"Lorikeet";s:13:"colorMatrix_0";d:1.5;s:13:"colorMatrix_1";d:0;s:13:"colorMatrix_2";d:0;s:13:"colorMatrix_3";d:0;s:13:"colorMatrix_4";d:-0.157;s:13:"colorMatrix_5";d:0;s:13:"colorMatrix_6";d:1;s:13:"colorMatrix_7";d:0.5;s:13:"colorMatrix_8";d:0;s:13:"colorMatrix_9";d:-0.157;s:14:"colorMatrix_10";d:0;s:14:"colorMatrix_11";d:0;s:14:"colorMatrix_12";d:0.5;s:14:"colorMatrix_13";d:0;s:14:"colorMatrix_14";d:0.5;s:14:"colorMatrix_15";d:0;s:14:"colorMatrix_16";d:0;s:14:"colorMatrix_17";d:0;s:14:"colorMatrix_18";d:1;s:14:"colorMatrix_19";d:0;s:14:"colorMatrix_20";d:0;s:14:"colorMatrix_21";d:0;s:14:"colorMatrix_22";d:0;s:14:"colorMatrix_23";d:0;s:14:"colorMatrix_24";d:1;}'],
    ['Imagick', 'compositeImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'contrastImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:7:"bestFit";i:1;}'],
    ['Imagick', 'convolveImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'cropImage', 'a:5:{s:5:"image";s:8:"Lorikeet";s:6:"startX";i:100;s:6:"startY";i:100;s:5:"width";i:50;s:6:"height";i:50;}'],
    ['Imagick', 'deskewImage', 'a:1:{s:9:"threshold";d:0.5;}'],
    ['Imagick', 'despeckleImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'distortImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:10:"distortion";i:1;}'],
    ['Imagick', 'enhanceImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'equalizeImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'evaluateImage', 'a:4:{s:12:"evaluateType";i:1;s:9:"firstTerm";d:0.5;s:18:"gradientStartColor";s:5:"black";s:16:"gradientEndColor";s:5:"white";}'],
    ['Imagick', 'flipImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'floodFillPaintImage', 'a:7:{s:9:"fillColor";s:11:"DodgerBlue2";s:4:"fuzz";d:0.10000000000000001;s:11:"targetColor";s:16:"rgb(127, 0, 127)";s:1:"x";i:10;s:1:"y";i:10;s:7:"inverse";i:0;s:7:"channel";i:134217727;}'],
    ['Imagick', 'flopImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'forwardFourierTransformImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'frameImage', 'a:6:{s:5:"image";s:8:"Lorikeet";s:5:"color";s:18:"rgb(127, 127, 127)";s:5:"width";i:5;s:6:"height";i:5;s:10:"innerBevel";i:3;s:10:"outerBevel";i:3;}'],
    ['Imagick', 'functionImage', 'a:5:{s:15:"imagickFunction";s:19:"renderImageSinusoid";s:9:"firstTerm";d:0.5;s:10:"secondTerm";s:0:"";s:9:"thirdTerm";s:0:"";s:10:"fourthTerm";s:0:"";}'],
    ['Imagick', 'fxImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'gammaImage', 'a:3:{s:5:"image";s:8:"Lorikeet";s:5:"gamma";d:2.2000000000000002;s:7:"channel";i:134217727;}'],
    ['Imagick', 'gaussianBlurImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:6:"radius";i:5;s:5:"sigma";i:1;s:7:"channel";i:134217727;}'],
    ['Imagick', 'getCopyright', 'a:0:{}'],
    ['Imagick', 'getImageChannelStatistics', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'getImageHistogram', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'getPixelIterator', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'getPixelRegionIterator', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'haldClutImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'identifyImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'inverseFourierTransformImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'magnifyImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'medianFilterImage', 'a:2:{s:6:"radius";i:5;s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'mergeImageLayers', 'a:1:{s:10:"methodType";i:13;}'],
    ['Imagick', 'modulateImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:3:"hue";i:150;s:10:"saturation";i:100;s:10:"brightness";i:100;}'],
    ['Imagick', 'motionBlurImage', 'a:5:{s:5:"image";s:8:"Lorikeet";s:6:"radius";i:20;s:5:"sigma";i:20;s:5:"angle";i:45;s:7:"channel";i:134217727;}'],
    ['Imagick', 'negateImage', 'a:3:{s:5:"image";s:8:"Lorikeet";s:7:"bestFit";i:0;s:7:"channel";i:134217727;}'],
    ['Imagick', 'newPseudoImage', 'a:1:{s:10:"canvasType";s:9:"gradient:";}'],
    ['Imagick', 'normalizeImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'oilPaintImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:6:"radius";i:5;}'],
    ['Imagick', 'pingImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'Quantum', 'a:0:{}'],
    ['Imagick', 'quantizeImage', 'a:5:{s:5:"image";s:8:"Lorikeet";s:12:"numberColors";i:64;s:10:"colorSpace";i:1;s:9:"treeDepth";i:0;s:6:"dither";i:1;}'],
    ['Imagick', 'queryFormats', 'a:0:{}'],
    ['Imagick', 'radialBlurImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'raiseImage', 'a:6:{s:5:"image";s:8:"Lorikeet";s:5:"width";i:50;s:6:"height";i:20;s:1:"x";i:10;s:1:"y";i:10;s:5:"raise";i:1;}'],
    ['Imagick', 'randomThresholdImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:12:"lowThreshold";d:0.10000000000000001;s:13:"highThreshold";d:0.90000000000000002;s:7:"channel";i:134217727;}'],
    ['Imagick', 'recolorImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'reduceNoiseImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:11:"reduceNoise";i:5;}'],
    ['Imagick', 'resampleImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'resizeImage', 'a:7:{s:5:"image";s:8:"Lorikeet";s:10:"filterType";i:22;s:5:"width";i:50;s:6:"height";i:20;s:4:"blur";i:1;s:7:"bestFit";i:1;s:8:"cropZoom";i:1;}'],
    ['Imagick', 'rollImage', 'a:3:{s:5:"image";s:8:"Lorikeet";s:5:"rollX";i:100;s:5:"rollY";i:100;}'],
    ['Imagick', 'rotateImage', 'a:3:{s:5:"image";s:8:"Lorikeet";s:5:"angle";i:45;s:5:"color";s:18:"rgb(127, 127, 127)";}'],
    ['Imagick', 'rotationalBlurImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'roundCorners', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'scaleImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'segmentImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:16:"clusterThreshold";i:5;s:15:"smoothThreshold";i:5;s:10:"colorSpace";i:1;}'],
    ['Imagick', 'selectiveBlurImage', 'a:5:{s:5:"image";s:8:"Lorikeet";s:6:"radius";i:5;s:5:"sigma";i:1;s:9:"threshold";d:0.5;s:7:"channel";i:134217727;}'],
    ['Imagick', 'separateImageChannel', 'a:2:{s:5:"image";s:8:"Lorikeet";s:7:"channel";i:134217727;}'],
    ['Imagick', 'sepiaToneImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:5:"sepia";i:55;}'],
    ['Imagick', 'setImageArtifact', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'setImageBias', 'a:0:{}'],
    ['Imagick', 'setImageDelay', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'setImageOrientation', 'a:2:{s:5:"image";s:8:"Lorikeet";s:15:"orientationType";N;}'],
    ['Imagick', 'setImageTicksPerSecond', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'setIteratorIndex', 'a:0:{}'],
    ['Imagick', 'setOption', 'a:2:{s:5:"image";s:8:"Lorikeet";s:11:"imageOption";i:0;}'],
    ['Imagick', 'setProgressMonitor', 'a:0:{}'],
    ['Imagick', 'shadeImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'shadowImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'sharpenImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:6:"radius";i:5;s:5:"sigma";i:1;s:7:"channel";i:134217727;}'],
    ['Imagick', 'shaveImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'shearImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:6:"shearX";i:15;s:6:"shearY";i:5;s:5:"color";s:18:"rgb(127, 127, 127)";}'],
    ['Imagick', 'sigmoidalContrastImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:13:"sigmoidalMode";i:1;s:8:"midpoint";i:4;s:17:"sigmoidalContrast";d:0.5;}'],
    ['Imagick', 'sketchImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:6:"radius";i:5;s:5:"sigma";i:1;s:5:"angle";i:45;}'],
    ['Imagick', 'smushImages', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'solarizeImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:17:"solarizeThreshold";d:0.20000000000000001;}'],
    ['Imagick', 'sparseColorImage', 'a:1:{s:6:"sparse";s:18:"renderImageVoronoi";}'],
    ['Imagick', 'spliceImage', 'a:5:{s:5:"image";s:8:"Lorikeet";s:6:"startX";i:100;s:6:"startY";i:100;s:5:"width";i:50;s:6:"height";i:50;}'],
    ['Imagick', 'spreadImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:6:"radius";i:5;}'],
    ['Imagick', 'statisticImage', 'a:5:{s:5:"image";s:8:"Lorikeet";s:13:"statisticType";i:1;s:3:"w20";i:5;s:3:"h20";i:5;s:7:"channel";i:134217727;}'],
    ['Imagick', 'subImageMatch', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'swirlImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:5:"swirl";i:100;}'],
    ['Imagick', 'textureImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'thresholdImage', 'a:3:{s:5:"image";s:8:"Lorikeet";s:9:"threshold";d:0.5;s:7:"channel";i:134217727;}'],
    ['Imagick', 'thumbnailImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'tintImage', 'a:4:{s:1:"r";i:100;s:1:"g";i:100;s:1:"b";i:100;s:1:"a";i:100;}'],
    ['Imagick', 'transformImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'transparentPaintImage', 'a:3:{s:5:"color";s:18:"rgb(127, 127, 127)";s:5:"alpha";i:0;s:4:"fuzz";d:0.10000000000000001;}'],
    ['Imagick', 'transposeImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'transformImageColorspace', 'a:3:{s:5:"image";s:8:"Lorikeet";s:10:"colorSpace";i:1;s:10:"channelNum";i:134217727;}'],
    ['Imagick', 'transverseImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'trimImage', 'a:2:{s:5:"color";s:18:"rgb(127, 127, 127)";s:4:"fuzz";d:0.10000000000000001;}'],
    ['Imagick', 'uniqueImageColors', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'unsharpMaskImage', 'a:6:{s:5:"image";s:8:"Lorikeet";s:6:"radius";i:5;s:5:"sigma";i:1;s:6:"amount";i:5;s:16:"unsharpThreshold";i:0;s:7:"channel";i:134217727;}'],
    ['Imagick', 'vignetteImage', 'a:5:{s:5:"image";s:8:"Lorikeet";s:10:"blackPoint";i:10;s:10:"whitePoint";i:200;s:1:"x";i:10;s:1:"y";i:10;}'],
    ['Imagick', 'waveImage', 'a:3:{s:5:"image";s:8:"Lorikeet";s:9:"amplitude";i:5;s:6:"length";i:20;}'],
    ['Imagick', 'whiteThresholdImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:5:"color";s:18:"rgb(127, 127, 127)";}'],
    ['ImagickDraw', 'affine', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'arc', 'a:9:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:6:"startX";i:100;s:6:"startY";i:100;s:4:"endX";i:400;s:4:"endY";i:400;s:10:"startAngle";i:0;s:8:"endAngle";i:270;}'],
    ['ImagickDraw', 'bezier', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'circle', 'a:7:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:7:"originX";i:250;s:7:"originY";i:250;s:4:"endX";i:400;s:4:"endY";i:400;}'],
    ['ImagickDraw', 'composite', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'ellipse', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'line', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'matte', 'a:4:{s:9:"paintType";i:4;s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'pathStart', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'point', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'polygon', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'polyline', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'pop', 'a:4:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:17:"fillModifiedColor";s:10:"LightCoral";}'],
    ['ImagickDraw', 'popClipPath', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'popPattern', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'popDefs', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'push', 'a:4:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:17:"fillModifiedColor";s:10:"LightCoral";}'],
    ['ImagickDraw', 'pushClipPath', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'pushPattern', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'rectangle', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'rotate', 'a:4:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:17:"fillModifiedColor";s:10:"LightCoral";}'],
    ['ImagickDraw', 'roundRectangle', 'a:9:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:6:"startX";i:100;s:6:"startY";i:100;s:4:"endX";i:400;s:4:"endY";i:400;s:6:"roundX";i:100;s:6:"roundY";i:50;}'],
    ['ImagickDraw', 'scale', 'a:4:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:17:"fillModifiedColor";s:10:"LightCoral";}'],
    ['ImagickDraw', 'setClipPath', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setClipRule', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setClipUnits', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFillAlpha', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFillColor', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFillOpacity', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFillRule', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFont', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFontFamily', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFontSize', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFontStretch', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFontStyle', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFontWeight', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setGravity', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeAlpha', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeAntialias', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeColor', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeDashArray', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeDashOffset', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeLineCap', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeLineJoin', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeMiterLimit', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeOpacity', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeWidth', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setTextAlignment', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setTextAntialias', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setTextDecoration', 'a:4:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:14:"textDecoration";i:2;}'],
    ['ImagickDraw', 'setTextUnderColor', 'a:4:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:14:"textUnderColor";s:9:"DeepPink2";}'],
    ['ImagickDraw', 'setViewBox', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'skewX', 'a:9:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:17:"fillModifiedColor";s:10:"LightCoral";s:6:"startX";i:100;s:6:"startY";i:100;s:4:"endX";i:400;s:4:"endY";i:400;s:4:"skew";i:10;}'],
    ['ImagickDraw', 'skewY', 'a:9:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:17:"fillModifiedColor";s:10:"LightCoral";s:6:"startX";i:100;s:6:"startY";i:100;s:4:"endX";i:400;s:4:"endY";i:400;s:4:"skew";i:10;}'],
    ['ImagickDraw', 'translate', 'a:10:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:17:"fillModifiedColor";s:10:"LightCoral";s:6:"startX";i:100;s:6:"startY";i:100;s:4:"endX";i:400;s:4:"endY";i:400;s:10:"translateX";i:75;s:10:"translateY";i:75;}'],
    ['ImagickPixel', 'construct', 'a:0:{}'],
    ['ImagickPixel', 'getColor', 'a:0:{}'],
    ['ImagickPixel', 'getColorAsString', 'a:0:{}'],
    ['ImagickPixel', 'getColorCount', 'a:0:{}'],
    ['ImagickPixel', 'getColorValue', 'a:0:{}'],
    ['ImagickPixel', 'getColorValueQuantum', 'a:0:{}'],
    ['ImagickPixel', 'getHSL', 'a:0:{}'],
    ['ImagickPixel', 'isSimilar', 'a:0:{}'],
    ['ImagickPixel', 'setColor', 'a:0:{}'],
    ['ImagickPixel', 'setColorValue', 'a:0:{}'],
    ['ImagickPixel', 'setColorValueQuantum', 'a:0:{}'],
    ['ImagickPixel', 'setHSL', 'a:0:{}'],
    ['ImagickPixelIterator', 'clear', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['ImagickPixelIterator', 'construct', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['ImagickPixelIterator', 'getNextIteratorRow', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['ImagickPixelIterator', 'resetIterator', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['ImagickPixelIterator', 'setIteratorRow', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['ImagickPixelIterator', 'syncIterator', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Tutorial', 'composite', 'a:1:{s:16:"compositeExample";s:15:"screenGradients";}'],
    ['Tutorial', 'edgeExtend', 'a:2:{s:5:"image";s:8:"Lorikeet";s:12:"virtualPixel";s:4:"Edge";}'],
    ['Tutorial', 'compressImages', 'a:0:{}'],
    ['Tutorial', 'gradientReflection', 'a:0:{}'],
    ['Tutorial', 'psychedelicFont', 'a:0:{}'],
    ['Tutorial', 'psychedelicFontGif', 'a:0:{}'],
    ['Tutorial', 'imagickComposite', 'a:0:{}'],
    ['Tutorial', 'imagickCompositeGen', 'a:0:{}'],
    ['Tutorial', 'fxAnalyzeImage', 'a:0:{}'],
    ['Tutorial', 'listColors', 'a:0:{}'],
    ['Tutorial', 'svgExample', 'a:0:{}'],
    ['Tutorial', 'screenEmbed', 'a:0:{}'],
    ['Tutorial', 'layerPSD', 'a:0:{}'],
    ['Tutorial', 'logoTshirt', 'a:0:{}'],
    ['Tutorial', 'gradientGeneration', 'a:0:{}'],
    ['Imagick', 'adaptiveBlurImage', 'a:4:{s:6:"radius";s:1:"5";s:5:"sigma";s:1:"1";s:5:"image";s:8:"Lorikeet";s:7:"channel";i:134217727;}'],
    ['Imagick', 'adaptiveResizeImage', 'a:4:{s:11:"resizeWidth";s:3:"200";s:12:"resizeHeight";s:3:"200";s:5:"image";s:8:"Lorikeet";s:7:"bestFit";i:1;}'],
    ['Imagick', 'adaptiveSharpenImage', 'a:4:{s:6:"radius";s:1:"5";s:5:"sigma";s:1:"1";s:5:"image";s:8:"Lorikeet";s:7:"channel";i:134217727;}'],
    ['Imagick', 'adaptiveThresholdImage', 'a:4:{s:5:"width";s:2:"50";s:6:"height";s:2:"20";s:5:"image";s:8:"Lorikeet";s:14:"adaptiveOffset";s:5:"0.125";}'],
    ['Imagick', 'addNoiseImage', 'a:3:{s:5:"image";s:8:"Lorikeet";s:5:"noise";s:9:"Laplacian";s:7:"channel";i:134217727;}'],
    ['Imagick', 'affineTransformImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'annotateImage', 'a:3:{s:5:"image";s:8:"Lorikeet";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['Imagick', 'autoLevelImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'blackThresholdImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:14:"thresholdColor";s:18:"rgb(127, 127, 127)";}'],
    ['Imagick', 'blueShiftImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:9:"blueshift";s:3:"1.5";}'],
    ['Imagick', 'blurImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:6:"radius";s:1:"5";s:5:"sigma";s:1:"1";s:7:"channel";i:134217727;}'],
    ['Imagick', 'borderImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:5:"width";s:2:"50";s:6:"height";s:2:"20";s:5:"color";s:18:"rgb(127, 127, 127)";}'],
    ['Imagick', 'brightnessContrastImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:10:"brightness";s:3:"-20";s:8:"contrast";s:3:"-20";s:7:"channel";i:134217727;}'],
    ['Imagick', 'charcoalImage', 'a:3:{s:6:"radius";s:1:"5";s:5:"sigma";s:1:"1";s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'chopImage', 'a:5:{s:5:"image";s:8:"Lorikeet";s:6:"startX";s:3:"100";s:6:"startY";s:3:"100";s:5:"width";s:3:"100";s:6:"height";s:2:"50";}'],
    ['Imagick', 'clutImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'colorizeImage', 'a:3:{s:5:"image";s:8:"Lorikeet";s:5:"color";s:18:"rgb(127, 127, 127)";s:7:"opacity";s:3:"100";}'],
    ['Imagick', 'colorMatrixImage', 'a:26:{s:5:"image";s:8:"Lorikeet";s:13:"colorMatrix_0";d:1.5;s:13:"colorMatrix_1";d:0;s:13:"colorMatrix_2";d:0;s:13:"colorMatrix_3";d:0;s:13:"colorMatrix_4";d:-0.157;s:13:"colorMatrix_5";d:0;s:13:"colorMatrix_6";d:1;s:13:"colorMatrix_7";d:0.5;s:13:"colorMatrix_8";d:0;s:13:"colorMatrix_9";d:-0.157;s:14:"colorMatrix_10";d:0;s:14:"colorMatrix_11";d:0;s:14:"colorMatrix_12";d:0.5;s:14:"colorMatrix_13";d:0;s:14:"colorMatrix_14";d:0.5;s:14:"colorMatrix_15";d:0;s:14:"colorMatrix_16";d:0;s:14:"colorMatrix_17";d:0;s:14:"colorMatrix_18";d:1;s:14:"colorMatrix_19";d:0;s:14:"colorMatrix_20";d:0;s:14:"colorMatrix_21";d:0;s:14:"colorMatrix_22";d:0;s:14:"colorMatrix_23";d:0;s:14:"colorMatrix_24";d:1;}'],
    ['Imagick', 'compositeImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'contrastImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:7:"bestFit";i:1;}'],
    ['Imagick', 'convolveImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'cropImage', 'a:5:{s:5:"image";s:8:"Lorikeet";s:6:"startX";s:3:"100";s:6:"startY";s:3:"100";s:5:"width";s:2:"50";s:6:"height";s:2:"50";}'],
    ['Imagick', 'deskewImage', 'a:1:{s:9:"threshold";s:3:"0.5";}'],
    ['Imagick', 'despeckleImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'distortImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:10:"distortion";i:1;}'],
    ['Imagick', 'enhanceImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'equalizeImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'evaluateImage', 'a:4:{s:12:"evaluateType";i:1;s:9:"firstTerm";s:3:"0.5";s:18:"gradientStartColor";s:5:"black";s:16:"gradientEndColor";s:5:"white";}'],
    ['Imagick', 'flipImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'floodFillPaintImage', 'a:7:{s:9:"fillColor";s:12:"rgb(0, 0, 0)";s:4:"fuzz";s:3:"0.2";s:11:"targetColor";s:17:"rgb(245, 124, 24)";s:1:"x";s:3:"260";s:1:"y";s:3:"150";s:7:"inverse";i:0;s:7:"channel";i:134217727;}'],
    ['Imagick', 'flopImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'forwardFourierTransformImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'frameImage', 'a:6:{s:5:"image";s:8:"Lorikeet";s:5:"color";s:18:"rgb(127, 127, 127)";s:5:"width";s:1:"5";s:6:"height";s:1:"5";s:10:"innerBevel";s:1:"3";s:10:"outerBevel";s:1:"3";}'],
    ['Imagick', 'functionImage', 'a:5:{s:15:"imagickFunction";s:19:"renderImageSinusoid";s:9:"firstTerm";s:3:"0.5";s:10:"secondTerm";s:0:"";s:9:"thirdTerm";s:0:"";s:10:"fourthTerm";s:0:"";}'],
    ['Imagick', 'fxImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'gammaImage', 'a:3:{s:5:"image";s:8:"Lorikeet";s:5:"gamma";s:3:"2.2";s:7:"channel";i:134217727;}'],
    ['Imagick', 'gaussianBlurImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:6:"radius";s:1:"5";s:5:"sigma";s:1:"1";s:7:"channel";i:134217727;}'],
    ['Imagick', 'getImageHistogram', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'getImageHistogram', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'getPixelIterator', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'getPixelRegionIterator', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'haldClutImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'inverseFourierTransformImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'magnifyImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'medianFilterImage', 'a:2:{s:6:"radius";s:1:"5";s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'mergeImageLayers', 'a:1:{s:10:"methodType";i:13;}'],
    ['Imagick', 'modulateImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:3:"hue";s:3:"150";s:10:"saturation";s:3:"100";s:10:"brightness";s:3:"100";}'],
    ['Imagick', 'motionBlurImage', 'a:5:{s:5:"image";s:8:"Lorikeet";s:6:"radius";s:2:"20";s:5:"sigma";s:2:"20";s:5:"angle";s:2:"45";s:7:"channel";i:134217727;}'],
    ['Imagick', 'negateImage', 'a:3:{s:5:"image";s:8:"Lorikeet";s:7:"bestFit";i:0;s:7:"channel";i:134217727;}'],
    ['Imagick', 'newPseudoImage', 'a:1:{s:10:"canvasType";s:9:"gradient:";}'],
    ['Imagick', 'normalizeImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'oilPaintImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:6:"radius";s:1:"5";}'],
    ['Imagick', 'quantizeImage', 'a:5:{s:5:"image";s:8:"Lorikeet";s:12:"numberColors";i:64;s:10:"colorSpace";i:1;s:9:"treeDepth";i:0;s:6:"dither";i:1;}'],
    ['Imagick', 'radialBlurImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'raiseImage', 'a:6:{s:5:"image";s:8:"Lorikeet";s:5:"width";s:2:"15";s:6:"height";s:2:"15";s:1:"x";s:2:"10";s:1:"y";s:2:"10";s:5:"raise";i:1;}'],
    ['Imagick', 'randomThresholdImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:12:"lowThreshold";s:3:"0.1";s:13:"highThreshold";s:3:"0.9";s:7:"channel";i:134217727;}'],
    ['Imagick', 'recolorImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'reduceNoiseImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:11:"reduceNoise";s:1:"5";}'],
    ['Imagick', 'resampleImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'resizeImage', 'a:7:{s:5:"image";s:8:"Lorikeet";s:10:"filterType";i:22;s:5:"width";s:3:"200";s:6:"height";s:3:"200";s:4:"blur";s:1:"1";s:7:"bestFit";i:1;s:8:"cropZoom";i:1;}'],
    ['Imagick', 'rollImage', 'a:3:{s:5:"image";s:8:"Lorikeet";s:5:"rollX";s:3:"100";s:5:"rollY";s:3:"100";}'],
    ['Imagick', 'rotateImage', 'a:3:{s:5:"image";s:8:"Lorikeet";s:5:"angle";s:2:"45";s:5:"color";s:18:"rgb(127, 127, 127)";}'],
    ['Imagick', 'rotationalBlurImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'roundCorners', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'scaleImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'segmentImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:16:"clusterThreshold";s:1:"5";s:15:"smoothThreshold";s:1:"5";s:10:"colorSpace";i:1;}'],
    ['Imagick', 'selectiveBlurImage', 'a:5:{s:5:"image";s:8:"Lorikeet";s:6:"radius";s:1:"5";s:5:"sigma";s:1:"1";s:9:"threshold";s:3:"0.5";s:7:"channel";i:134217727;}'],
    ['Imagick', 'separateImageChannel', 'a:2:{s:5:"image";s:8:"Lorikeet";s:7:"channel";i:134217727;}'],
    ['Imagick', 'sepiaToneImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:5:"sepia";s:2:"55";}'],
    ['Imagick', 'setImageArtifact', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'setImageDelay', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'setImageOrientation', 'a:2:{s:5:"image";s:8:"Lorikeet";s:15:"orientationType";N;}'],
    ['Imagick', 'setImageTicksPerSecond', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'setOption', 'a:2:{s:5:"image";s:8:"Lorikeet";s:11:"imageOption";i:0;}'],
    ['Imagick', 'shadeImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'shadowImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'sharpenImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:6:"radius";s:1:"5";s:5:"sigma";s:1:"1";s:7:"channel";i:134217727;}'],
    ['Imagick', 'shaveImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'shearImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:6:"shearX";s:2:"15";s:6:"shearY";s:1:"5";s:5:"color";s:18:"rgb(127, 127, 127)";}'],
    ['Imagick', 'sigmoidalContrastImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:13:"sigmoidalMode";i:1;s:8:"midpoint";s:1:"4";s:17:"sigmoidalContrast";s:3:"0.5";}'],
    ['Imagick', 'sketchImage', 'a:4:{s:5:"image";s:8:"Lorikeet";s:6:"radius";s:1:"5";s:5:"sigma";s:1:"1";s:5:"angle";s:2:"45";}'],
    ['Imagick', 'smushImages', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'solarizeImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:17:"solarizeThreshold";s:3:"0.2";}'],
    ['Imagick', 'sparseColorImage', 'a:1:{s:6:"sparse";s:18:"renderImageVoronoi";}'],
    ['Imagick', 'spliceImage', 'a:5:{s:5:"image";s:8:"Lorikeet";s:6:"startX";s:3:"100";s:6:"startY";s:3:"100";s:5:"width";s:2:"50";s:6:"height";s:2:"50";}'],
    ['Imagick', 'spreadImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:6:"radius";s:1:"5";}'],
    ['Imagick', 'statisticImage', 'a:5:{s:5:"image";s:8:"Lorikeet";s:13:"statisticType";i:1;s:3:"w20";s:1:"5";s:3:"h20";i:5;s:7:"channel";i:134217727;}'],
    ['Imagick', 'subImageMatch', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'swirlImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:5:"swirl";s:3:"100";}'],
    ['Imagick', 'textureImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'thresholdImage', 'a:3:{s:5:"image";s:8:"Lorikeet";s:9:"threshold";s:3:"0.5";s:7:"channel";i:134217727;}'],
    ['Imagick', 'thumbnailImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'tintImage', 'a:4:{s:1:"r";s:3:"100";s:1:"g";s:2:"50";s:1:"b";s:3:"100";s:1:"a";s:3:"100";}'],
    ['Imagick', 'transformImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'transparentPaintImage', 'a:3:{s:5:"color";s:17:"rgb(39, 194, 255)";s:5:"alpha";s:1:"0";s:4:"fuzz";s:3:"0.1";}'],
    ['Imagick', 'transposeImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'transformImageColorspace', 'a:3:{s:5:"image";s:8:"Lorikeet";s:10:"colorSpace";i:1;s:10:"channelNum";i:134217727;}'],
    ['Imagick', 'transverseImage', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'trimImage', 'a:2:{s:5:"color";s:17:"rgb(39, 194, 255)";s:4:"fuzz";s:3:"0.1";}'],
    ['Imagick', 'uniqueImageColors', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Imagick', 'unsharpMaskImage', 'a:6:{s:5:"image";s:8:"Lorikeet";s:6:"radius";s:1:"5";s:5:"sigma";s:1:"1";s:6:"amount";s:1:"5";s:16:"unsharpThreshold";s:1:"0";s:7:"channel";i:134217727;}'],
    ['Imagick', 'vignetteImage', 'a:5:{s:5:"image";s:8:"Lorikeet";s:10:"blackPoint";s:2:"10";s:10:"whitePoint";s:3:"200";s:1:"x";s:2:"10";s:1:"y";s:2:"10";}'],
    ['Imagick', 'waveImage', 'a:3:{s:5:"image";s:8:"Lorikeet";s:9:"amplitude";s:1:"5";s:6:"length";s:2:"20";}'],
    ['Imagick', 'whiteThresholdImage', 'a:2:{s:5:"image";s:8:"Lorikeet";s:5:"color";s:18:"rgb(127, 127, 127)";}'],
    ['ImagickDraw', 'affine', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'arc', 'a:9:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:6:"startX";s:3:"100";s:6:"startY";s:3:"100";s:4:"endX";s:3:"400";s:4:"endY";s:3:"400";s:10:"startAngle";s:1:"0";s:8:"endAngle";s:3:"270";}'],
    ['ImagickDraw', 'bezier', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'circle', 'a:7:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:7:"originX";s:3:"250";s:7:"originY";s:3:"250";s:4:"endX";s:3:"400";s:4:"endY";s:3:"400";}'],
    ['ImagickDraw', 'composite', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'ellipse', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'line', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'matte', 'a:4:{s:9:"paintType";i:4;s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'pathStart', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'point', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'polygon', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'polyline', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'pop', 'a:4:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:17:"fillModifiedColor";s:10:"LightCoral";}'],
    ['ImagickDraw', 'popClipPath', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'popPattern', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'popDefs', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'push', 'a:4:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:17:"fillModifiedColor";s:10:"LightCoral";}'],
    ['ImagickDraw', 'pushClipPath', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'pushPattern', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'rectangle', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'rotate', 'a:4:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:17:"fillModifiedColor";s:10:"LightCoral";}'],
    ['ImagickDraw', 'roundRectangle', 'a:9:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:6:"startX";s:3:"100";s:6:"startY";s:3:"100";s:4:"endX";s:3:"400";s:4:"endY";s:3:"400";s:6:"roundX";s:3:"100";s:6:"roundY";s:2:"50";}'],
    ['ImagickDraw', 'scale', 'a:4:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:17:"fillModifiedColor";s:10:"LightCoral";}'],
    ['ImagickDraw', 'setClipPath', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setClipRule', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setClipUnits', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFillAlpha', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFillColor', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFillOpacity', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFillRule', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFont', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFontFamily', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFontSize', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFontStretch', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFontStyle', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setFontWeight', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setGravity', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeAlpha', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeAntialias', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeColor', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeDashArray', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeDashOffset', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeLineCap', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeLineJoin', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeMiterLimit', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeOpacity', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setStrokeWidth', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setTextAlignment', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setTextAntialias', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'setTextDecoration', 'a:4:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:14:"textDecoration";i:2;}'],
    ['ImagickDraw', 'setTextUnderColor', 'a:4:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:14:"textUnderColor";s:9:"DeepPink2";}'],
    ['ImagickDraw', 'setViewBox', 'a:3:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";}'],
    ['ImagickDraw', 'skewX', 'a:9:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:17:"fillModifiedColor";s:10:"LightCoral";s:6:"startX";s:3:"100";s:6:"startY";s:3:"100";s:4:"endX";s:3:"400";s:4:"endY";s:3:"400";s:4:"skew";s:2:"10";}'],
    ['ImagickDraw', 'skewY', 'a:9:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:17:"fillModifiedColor";s:10:"LightCoral";s:6:"startX";s:3:"100";s:6:"startY";s:3:"100";s:4:"endX";s:3:"400";s:4:"endY";s:3:"400";s:4:"skew";s:2:"10";}'],
    ['ImagickDraw', 'translate', 'a:10:{s:15:"backgroundColor";s:18:"rgb(225, 225, 225)";s:11:"strokeColor";s:12:"rgb(0, 0, 0)";s:9:"fillColor";s:11:"DodgerBlue2";s:17:"fillModifiedColor";s:10:"LightCoral";s:6:"startX";s:3:"100";s:6:"startY";s:3:"100";s:4:"endX";s:3:"400";s:4:"endY";s:3:"400";s:10:"translateX";s:2:"75";s:10:"translateY";s:2:"75";}'],
    ['ImagickPixelIterator', 'clear', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['ImagickPixelIterator', 'construct', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['ImagickPixelIterator', 'getNextIteratorRow', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['ImagickPixelIterator', 'resetIterator', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['ImagickPixelIterator', 'setIteratorRow', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['ImagickPixelIterator', 'syncIterator', 'a:1:{s:5:"image";s:8:"Lorikeet";}'],
    ['Tutorial', 'composite', 'a:1:{s:16:"compositeExample";s:15:"screenGradients";}'],
    ['Tutorial', 'edgeExtend', 'a:2:{s:5:"image";s:8:"Lorikeet";s:12:"virtualPixel";s:4:"Edge";}'],
    ['Tutorial', 'gradientGeneration', 'a:0:{}'],

];



foreach ($allTests as $test) {

    list($category, $functionName, $serializedParams) = $test;

    $params = unserialize($serializedParams);

    $functionFullname = 'ImagickDemo\\'.$category.'\\'.$functionName;
    $injector = bootstrapInjector('testkey', 'testpass', 'testsource');

    foreach ($params as $name => $value) {
        $injector->defineParam($name, $value);
    }

    $injector->alias(\ImagickDemo\Navigation\Nav::class, \ImagickDemo\Navigation\CategoryNav::class);
    $injector->define(\ImagickDemo\Navigation\CategoryNav::class, [
        ':category' => $category,
        ':example' => $functionName
    ]);
    
    $categoryNav = $injector->make(\ImagickDemo\Navigation\CategoryNav::class);

    $exampleDefinition = $categoryNav->getExampleDefinition($category, $functionName);
    $function = $exampleDefinition[0];
    $controlClass = $exampleDefinition[1];

    if (array_key_exists('defaultParams', $exampleDefinition) == true) {
        foreach($exampleDefinition['defaultParams'] as $name => $value) {
            $defaultName = 'default'.ucfirst($name);
            $injector->defineParam($defaultName, $value);
        }
    }

    //delegateAllTheThings($injector, $controlClass);

    $filename = getImageCacheFilename($category, $functionName.".compare", $params);

    $extensions = [".jpg", '.jpeg', ".gif", ".png", ];

    $fileExtension = false;

    foreach ($extensions as $extension) {
        $filenameWithExtension = $filename.$extension;
        if (file_exists($filenameWithExtension) == true) {
            $fileExtension = $extension;
        }
    }
    
    if ($fileExtension === false) {
        echo "File $filename does not exist creating.\n";
        generateCompare($injector, $functionFullname, $filename);
    }
    else {
        compareFile($injector, $functionFullname, $filename, $fileExtension);
    }

}

