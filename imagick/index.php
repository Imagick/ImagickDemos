<?php

use \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor;


if (defined('LOW_MEM_CLASS_LOADER') && LOW_MEM_CLASS_LOADER == true) {
    require_once('../vendor/intahwebz/lowmemoryclassloader/LowMemoryClassloader.php');
}
else {
    require_once('../vendor/autoload.php');
}


function myBad( Exception $ex ) {
    header("HTTP/1.0 500 Internal Server Error", true, 500);
    echo "Exception ".get_class($ex).': '.$ex->getMessage();

    var_dump($ex->getTrace());
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

function getExampleDefinition($category, $example) {

    $imagickExamples = [
        'adaptiveBlurImage' => ['adaptiveBlurImage', \ImagickDemo\Control\ControlCompositeRadiusSigmaImage::class],

        'adaptiveResizeImage' => ['adaptiveResizeImage', \ImagickDemo\Control\ImageControl::class],
        'adaptiveSharpenImage' => ['adaptiveSharpenImage', \ImagickDemo\Control\ControlCompositeRadiusSigmaImage::class ],
        'adaptiveThresholdImage' => ['adaptiveThresholdImage', \ImagickDemo\Control\ImageControl::class ],
        //'addImage',
        'addNoiseImage' => ['addNoiseImage', \ImagickDemo\Control\ControlCompositeImageNoise::class],
        'affineTransformImage' => ['affineTransformImage', \ImagickDemo\Control\ImageControl::class], //Doesn't work?
        //'animateImages',
        'annotateImage' => ['annotateImage', \ImagickDemo\Control\AnnotateImageControl::class],

        //'appendImages',
        'autoLevelImage' => ['autoLevelImage', \ImagickDemo\Control\ImageControl::class],
        //new NavOption('averageImages',  true),
        'blackThresholdImage' => ['blackThresholdImage', \ImagickDemo\Control\ImageControl::class],
        'blueShiftImage' => ['blueShiftImage', \ImagickDemo\Control\BlueShiftControl::class],
        'blurImage' => ['blurImage', \ImagickDemo\Control\BlurControl::class],
        'borderImage' => ['borderImage', \ImagickDemo\Control\ImageControl::class],
        'brightnessContrastImage' => ['brightnessContrastImage', ImagickDemo\Control\BrightnessContrastImage::class],
        'charcoalImage' => ['charcoalImage', \ImagickDemo\Control\ImageControl::class],
        'chopImage' => [
            'chopImage',
            \ImagickDemo\Control\ChopControl::class,
            'defaultParams' => [ 'width' => 100 ]
        ],
        //'clear',
        //new NavOption('clipImage', true),
        //'clipPathImage',
        'clutImage' => ['clutImage', \ImagickDemo\Control\ImageControl::class],
        //'coalesceImages',
        //deprecated - new NavOption('colorFloodfillImage', true),
        //ColorDecisionListImage
        'colorizeImage' => ['colorizeImage', \ImagickDemo\Control\ImageControl::class],
        'colorMatrixImage' => ['colorMatrixImage', \ImagickDemo\Control\ImageControl::class],
        //'combineImages',
        //'commentImage',
        //'compareImageChannels',
        //'compareImageLayers',
//'compareImages',
        'compositeImage' => ['compositeImage',\ImagickDemo\Control\ImageControl::class ],
        // CompositeLayers
        //__construct',
        'contrastImage' => ['contrastImage', \ImagickDemo\Control\ImageControl::class],
        //'contrastStretchImage',
        'convolveImage' => ['convolveImage', \ImagickDemo\Control\ImageControl::class],
        'cropImage' => ['cropImage', \ImagickDemo\Control\ImageControl::class],
        //'cropThumbnailImage',
        //'current',
        //'cycleColormapImage',
        // ConstituteImage
        // DestroyImage
        //'decipherImage',
        //'deconstructImages',
        //'deleteImageArtifact',
        'deskewImage' => ['deskewImage', \ImagickDemo\Control\NullControl::class ],
        'despeckleImage' => ['despeckleImage', \ImagickDemo\Control\ImageControl::class],
        //'destroy',
        //'displayImage',
        //'displayImages',
        'distortImage' => ['distortImage', \ImagickDemo\Control\ControlCompositeImageDistortionType::class],
        //'drawImage',
        //'edgeImage',
        //'embossImage',
        //'encipherImage',

        'enhanceImage' => ['enhanceImage', \ImagickDemo\Control\ImageControl::class],
        'equalizeImage' => ['equalizeImage', \ImagickDemo\Control\ImageControl::class],
        'evaluateImage' =>  ['evaluateimage', \ImagickDemo\Control\EvaluateTypeControl::class],
        //'exportImagePixels',
//'extentImage',
        //FilterImage - this appears to be a duplicate function
        //FrameImage
        //'flattenImages',
        'flipImage' => ['flipImage', \ImagickDemo\Control\ImageControl::class],
        'floodFillPaintImage' => ['floodFillPaintImage', \ImagickDemo\Control\ImageControl::class],
        'flopImage' => ['flopImage', \ImagickDemo\Control\ImageControl::class],
        'forwardFourierTransformImage' => ['forwardFourierTransformImage', \ImagickDemo\Control\ImageControl::class],
        'frameImage' => ['frameImage', \ImagickDemo\Control\ImageControl::class],
        'functionImage' => ['functionImage', \ImagickDemo\Control\ImagickFunctionControl::class],
        'fxImage' => ['fxImage', \ImagickDemo\Control\ImageControl::class],
        'gammaImage' => ['gammaImage', \ImagickDemo\Control\ImageControl::class],
        'gaussianBlurImage' => ['gaussianBlurImage', \ImagickDemo\Control\ImageControl::class],
        //'getColorspace',
        //'getCompression',
        //'getCompressionQuality',
        //'getCopyright',
        //'getFilename',
        //'getFont',
        //'getFormat',
        //'getGravity',
        //'getHomeURL',
        //'getImage',
        //'getImageAlphaChannel',
        //'getImageArtifact',
        //'getImageBackgroundColor',
        //'getImageBlob',
        //'getImageBluePrimary',
        //'getImageBorderColor',
        //'getImageChannelDepth',
        //'getImageChannelDistortion',
        //'getImageChannelDistortions',
        //'getImageChannelExtrema',
        //'getImageChannelKurtosis',
        //'getImageChannelMean',
        //'getImageChannelRange',
        'getImageChannelStatistics' => ['getImageChannelStatistics', \ImagickDemo\Control\ImageControl::class],
        //'getImageClipMask',
        //'getImageColormapColor',
        //'getImageColors',
        //'getImageColorspace',
        //'getImageCompose',
        //'getImageCompression',
        //'getCompressionQuality',
        //'getImageDelay',
        //'getImageDepth',
        //'getImageDispose',
        //'getImageDistortion',
        //'getImageExtrema',
        //'getImageFilename',
        //'getImageFormat',
        //'getImageGamma',
        //'getImageGeometry',
        //'getImageGravity',
        //'getImageGreenPrimary',
        //'getImageHeight',
        'getImageHistogram' => ['getImageHistogram', \ImagickDemo\Control\ImageControl::class],
        //'getImageIndex',
        //'getImageInterlaceScheme',
        //'getImageInterpolateMethod',
        //'getImageIterations',
        //'getImageLength',
        //'getImageMagickLicense',
        //'getImageMatte',
        //'getImageMatteColor',
        //'getImageOrientation',
        //'getImagePage',
        //'getImagePixelColor',
        //'getImageProfile',
        //'getImageProfiles',
        //'getImageProperties',
        //'getImageProperty',
        //'getImageRedPrimary',
        //'getImageRegion',
        //'getImageRenderingIntent',
        //'getImageResolution',
        //'getImagesBlob',
        //'getImageScene',
        //'getImageSignature',
        //'getImageSize',
        //'getImageTicksPerSecond',
        //'getImageTotalInkDensity',
        //'getImageType',
        //'getImageUnits',
        //'getImageVirtualPixelMethod',
        //'getImageWhitePoint',
        //'getImageWidth',
        //'getInterlaceScheme',
        //'getIteratorIndex',
        //'getNumberImages',
        //'getOption',
        //'getPackageName',
        //'getPage',
        'getPixelIterator' => ['getPixelIterator', \ImagickDemo\Control\ImageControl::class],
        'getPixelRegionIterator' => ['getPixelRegionIterator', \ImagickDemo\Control\ImageControl::class],
        //'getPointSize',
        //'getQuantumDepth',
        //'getQuantumRange',
        //'getReleaseDate',
        //'getResource',
        //'getResourceLimit',
        //'getSamplingFactors',
        //'getSize',
        //'getSizeOffset',
        //'getVersion',

        'haldClutImage' => ['haldClutImage', \ImagickDemo\Control\ImageControl::class],
        //'hasNextImage',
        //'hasPreviousImage',
        'identifyImage' => ['identifyImage', \ImagickDemo\Control\ImageControl::class],
        'inverseFourierTransformImage' => ['forwardFourierTransformImage', \ImagickDemo\Control\ImageControl::class],
        //'implodeImage',
        //'importImagePixels',
        //'labelImage',
        //'levelImage',
        //'linearStretchImage',
        //'liquidRescaleImage',
        'magnifyImage' => ['magnifyImage', \ImagickDemo\Control\ImageControl::class],
        //'mapImage',
        //'matteFloodfillImage',
        'medianFilterImage' => ['medianFilterImage', \ImagickDemo\Control\ControlCompositeRadiusImage::class],

        //'mergeImageLayers',
        //'minifyImage',
        'modulateImage' => ['modulateImage', \ImagickDemo\Control\ImageControl::class],
        //'montageImage',
        //'morphImages',
        // MorphologyImage
        'mosaicImage' => ['mosaicImage', \ImagickDemo\Control\ImageControl::class],
        'motionBlurImage' => ['motionBlurImage', \ImagickDemo\Control\ImageControl::class],
        'negateImage' => ['negateImage', \ImagickDemo\Control\ImageControl::class],
        //'newImage',
        'newPseudoImage' => ['newPseudoImage', \ImagickDemo\Control\ImageControl::class],
        //'nextImage',
        'normalizeImage' => ['normalizeImage', \ImagickDemo\Control\ImageControl::class],
        'oilPaintImage' => ['oilPaintImage', \ImagickDemo\Control\ImageControl::class],
        //'opaquePaintImage',
        //'optimizeImageLayers',
        // OptimizeImageTransparency
        //'orderedPosterizeImage',
        //'paintOpaqueImage',
        //'paintTransparentImage',

        'pingImage' => ['pingImage', \ImagickDemo\Control\ImageControl::class],

        'Quantum'  => ['Quantum', \ImagickDemo\Control\NullControl::class],
        //'pingImageBlob',
        //'pingImageFile',
        //'polaroidImage',
        //'posterizeImage',
        //'previewImages',
        //'previousImage',
        //'profileImage',
        'quantizeImage' => ['quantizeImage', \ImagickDemo\Control\ImageControl::class],
        //'quantizeImages',
        //'queryFontMetrics',
        //'queryFonts',
        //'queryFormats',
        'radialBlurImage' => ['radialBlurImage', \ImagickDemo\Control\ImageControl::class],
        'raiseImage' => ['raiseImage', \ImagickDemo\Control\ImageControl::class],
        'randomThresholdImage' => ['randomThresholdImage', \ImagickDemo\Control\ImageControl::class],
        //'readImage',
        //'readImageBlob',
        //'readImageFile',
        'recolorImage' => ['recolorImage', \ImagickDemo\Control\ImageControl::class],
        'reduceNoiseImage' => ['reduceNoiseImage', \ImagickDemo\Control\ImageControl::class],
//new NavOption('remapImage', true),
        //'removeImage',
        //'removeImageProfile',
        //'render',
        'resampleImage' => ['resampleImage', \ImagickDemo\Control\ImageControl::class],
        //'resetImagePage',
        //'resizeImage',
        'rollImage' => ['rollImage', \ImagickDemo\Control\ImageControl::class],
        'rotateImage' => ['rotateImage', \ImagickDemo\Control\ImageControl::class],
        'rotationalBlurImage' => ['rotationalBlurImage', \ImagickDemo\Control\ImageControl::class],
        'roundCorners' => ['roundCorners', \ImagickDemo\Control\ImageControl::class],
        //'sampleImage',
        'scaleImage' => ['scaleImage', \ImagickDemo\Control\ImageControl::class],
        'screenEmbed' => ['screenEmbed', \ImagickDemo\Control\ImageControl::class],
        'segmentImage' => ['segmentImage', \ImagickDemo\Control\ImageControl::class],
        'selectiveBlurImage' => ['selectiveBlurImage',ImagickDemo\Control\SelectiveBlurImage::class ],
        'separateImageChannel' => ['separateImageChannel', \ImagickDemo\Control\ImageControl::class],
        'sepiaToneImage' => ['sepiaToneImage', \ImagickDemo\Control\ImageControl::class],
        //'setBackgroundColor',
        //'setColorspace',
        //'setCompression',
        //'setCompressionQuality',
        //'setFilename',
        //'setFirstIterator',
        //'setFont',
        //'setFormat',
        //'setGravity',
        //'setImage',
        //'setImageAlphaChannel',
        'setImageArtifact' => ['setImageArtifact', \ImagickDemo\Control\ImageControl::class],
        //'setImageBackgroundColor',
        //'setImageBias',
        //'setImageBluePrimary',
        //'setImageBorderColor',
        //'setImageChannelDepth',
        //'setImageClipMask',
        //'setImageColormapColor',
        //'setImageColorspace',
        //'setImageCompose',
        //'setImageCompression',
        //'setImageCompressionQuality',
        //'setImageDepth',
        'setImageDelay' => ['setImageDelay', \ImagickDemo\Control\ImageControl::class],
        //'setImageDispose',
        //'setImageExtent',
        //'setImageFilename',
        //'setImageFormat',
        //'setImageGamma',
        //'setImageGravity',
        //'setImageGreenPrimary',
        //'setImageIndex',
        //'setImageInterlaceScheme',
        //'setImageInterpolateMethod',
        //'setImageIterations',
        //'setImageMatte',
        //'setImageMatteColor',
        //'setImageOpacity',
        //'setImageOrientation',
        //'setImagePage',
        //'setImageProfile',
        //'setImageProperty',
        //'setImageRedPrimary',
        //'setImageRenderingIntent',
        //'setImageResolution',
        //'setImageScene',
        'setImageTicksPerSecond' => ['setImageTicksPerSecond', \ImagickDemo\Control\ImageControl::class ],
        //'setImageType',
        //'setImageUnits',
        //'setImageVirtualPixelMethod',
        //'setImageWhitePoint',
        //'setInterlaceScheme',
        //'setIteratorIndex',
        //'setLastIterator',
        'setOption' => ['setOption', \ImagickDemo\Control\ImageControl::class ],
        'setProgressMonitor' => ['setProgressMonitor', \ImagickDemo\Control\NullControl::class],
        //'setPage',
        //'setPointSize',
        //'setResolution',
        //'setResourceLimit',
        //'setSamplingFactors',
        //'setSize',
        //'setSizeOffset',
        //'setType',
        'shadeImage' => ['shadeImage', \ImagickDemo\Control\ImageControl::class ],
        'shadowImage' => ['shadowImage', \ImagickDemo\Control\ImageControl::class ],
        'sharpenImage' => ['sharpenImage', \ImagickDemo\Control\ImageControl::class],
        'shaveImage' => ['shaveImage', \ImagickDemo\Control\ImageControl::class],
        'shearImage' => ['shearImage', \ImagickDemo\Control\ImageControl::class],
        'sigmoidalContrastImage' => ['sigmoidalContrastImage', \ImagickDemo\Control\SigmoidalContrastControl::class ],


        //new NavOption('similarityImage', true),
        'sketchImage' => ['sketchImage', \ImagickDemo\Control\ImageControl::class],
        'smushImages' => ['smushImages', \ImagickDemo\Control\ImageControl::class],
        'solarizeImage' => ['solarizeImage', \ImagickDemo\Control\ControlCompositeImageSolarizeThreshold::class],
        'sparseColorImage' => ['sparseColorImage', \ImagickDemo\Control\SparseColorControl::class],
        'spliceImage' => ['spliceImage', \ImagickDemo\Control\ImageControl::class],
        'spreadImage' => ['spreadImage', \ImagickDemo\Control\ImageControl::class],
        'statisticImage' => ['statisticImage', \ImagickDemo\Control\StatisticControl::class],
        'subImageMatch' => ['subImageMatch', \ImagickDemo\Control\ImageControl::class],
        'swirlImage' => ['swirlImage', \ImagickDemo\Control\ControlCompositeImageSwirl::class],
        'textureImage' => ['textureImage', \ImagickDemo\Control\ImageControl::class],
        'thresholdImage' => ['thresholdImage', \ImagickDemo\Control\ImageControl::class],
        'thumbnailImage' => ['thumbnailImage', \ImagickDemo\Control\ImageControl::class],
        'tintImage' => ['tintImage', \ImagickDemo\Control\ControlCompositeRGBA::class],
        'transformImage' => ['transformImage', \ImagickDemo\Control\ImageControl::class],
        'transparentPaintImage' => ['transparentPaintImage', \ImagickDemo\Control\ImageControl::class],
        'transposeImage' => ['transposeImage', \ImagickDemo\Control\ImageControl::class],
        'transformImageColorspace' => ['transformImageColorspace', \ImagickDemo\Control\ControlCompositeImageColorSpace::class],
        'transverseImage' => ['transverseImage', \ImagickDemo\Control\ImageControl::class],
        'trimImage' => ['trimImage', \ImagickDemo\Control\ImageControl::class],
        'uniqueImageColors' => ['uniqueImageColors', \ImagickDemo\Control\ImageControl::class],
        'unsharpMaskImage' => ['unsharpMaskImage',\ImagickDemo\Control\ControlCompositeImageRadiusSigmaAmountUnsharpThresholdChannel::class ],
        'vignetteImage' => ['vignetteImage', \ImagickDemo\Control\ControlCompositeImageBlackPointWhitePointXY::class],
        'waveImage' => ['waveImage', \ImagickDemo\Control\ControlCompositeImageAmplitudeLength::class],
        'whiteThresholdImage' => ['whiteThresholdImage', \ImagickDemo\Control\ImageControl::class],
    ];

    $imagickDrawExamples = [
        'affine' => ['affine', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'arc' => ['arc', \ImagickDemo\Control\ArcControl::class],
        'bezier' => ['bezier', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'circle' => ['circle', \ImagickDemo\Control\CircleControl::class],
        'composite' => ['composite', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'ellipse' => ['ellipse', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'line' => ['line', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'matte' => ['matte', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'pathStart' => ['pathStart', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'point' => ['point', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'polygon' => ['polygon', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'polyline' => ['polyline', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'pop' => ['push', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColorFillModifiedColor::class],
        'popClipPath' => ['setClipPath', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'popPattern' => ['pushPattern', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'popDefs' => ['popDefs', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'push' => ['push', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColorFillModifiedColor::class],
        'pushClipPath' => ['setClipPath', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'pushPattern' => ['pushPattern', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'rectangle' => ['rectangle', ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'render' => ['render', ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'rotate' => ['rotate', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColorFillModifiedColor::class],
        'roundRectangle' => ['roundRectangle', \ImagickDemo\Control\RoundRectangleControl::class],
        'scale' => ['scale', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColorFillModifiedColor::class],
        'setClipPath' => ['setClipPath', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setClipRule' => ['setClipRule', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setClipUnits' => ['setClipUnits', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setFillAlpha' => ['setFillAlpha', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setFillColor' => ['setFillColor', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setFillOpacity' => ['setFillOpacity', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setFillRule' => ['setFillRule', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setFont' => ['setFont', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setFontFamily' => ['setFontFamily', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setFontSize' => ['setFontSize', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setFontStretch' => ['setFontStretch', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setFontStyle' => ['setFontStyle', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setFontWeight' => ['setFontWeight', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setGravity' => ['setGravity', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setStrokeAlpha' => ['setStrokeAlpha', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setStrokeAntialias' => ['setStrokeAntialias', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setStrokeColor' => ['setStrokeColor', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setStrokeDashArray' => ['setStrokeDashArray', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setStrokeDashOffset' => ['setStrokeDashOffset', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setStrokeLineCap' => ['setStrokeLineCap', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setStrokeLineJoin' => ['setStrokeLineJoin', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],

        'setStrokeMiterLimit' => ['setStrokeMiterLimit', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setStrokeOpacity' => ['setStrokeOpacity', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setStrokeWidth' => ['setStrokeWidth', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setTextAlignment' => ['setTextAlignment', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setTextAntialias' => ['setTextAntialias', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setTextDecoration' => ['setTextDecoration', \ImagickDemo\Control\TextDecoration::class],
        'setTextUnderColor' => ['setTextUnderColor', \ImagickDemo\Control\TextUnderControl::class],
        'setVectorGraphics' => ['setVectorGraphics', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'setViewBox' => ['setViewBox', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'skewX' => ['skewX', \ImagickDemo\Control\SkewControl::class],
        'skewY' => ['skewY', \ImagickDemo\Control\SkewControl::class],
        'translate' => ['translate', \ImagickDemo\Control\TranslateControl::class],
    ];


    $imagickPixelExamples = [
        'construct' => ['construct', \ImagickDemo\Control\NullControl::class],
        'getColor' => ['getColor', \ImagickDemo\Control\NullControl::class],
        'getColorAsString' => ['getColorAsString', \ImagickDemo\Control\NullControl::class],
        'getColorCount' => ['getColorCount', \ImagickDemo\Control\NullControl::class],
        'getColorValue' => ['getColorValue', \ImagickDemo\Control\NullControl::class],
        'getColorValueQuantum' => ['getColorValueQuantum', \ImagickDemo\Control\NullControl::class],
        'getHSL' => ['getHSL', \ImagickDemo\Control\NullControl::class],
        'isSimilar' => ['isSimilar', \ImagickDemo\Control\NullControl::class],
        'setColor' => ['setColor', \ImagickDemo\Control\NullControl::class],
        'setColorValue' => ['setColorValue', \ImagickDemo\Control\NullControl::class],
        'setColorValueQuantum' => ['setColorValueQuantum', \ImagickDemo\Control\NullControl::class],
        'setHSL' => ['setHSL', \ImagickDemo\Control\NullControl::class],
    ];


    $imagickPixelIteratorExamples = [
        'clear' => ['clear', \ImagickDemo\Control\ImageControl::class],
        'construct' => ['construct', \ImagickDemo\Control\ImageControl::class],
        //'getCurrentIteratorRow',
        //'getIteratorRow' => 'setIteratorRow',
        'getNextIteratorRow' => ['getNextIteratorRow', \ImagickDemo\Control\ImageControl::class ],
        //'getPreviousIteratorRow',
        //'newPixelIterator', deprecated
        //'newPixelRegionIterator', deprecated
        'resetIterator' => ['resetIterator', \ImagickDemo\Control\ImageControl::class],
        //'setIteratorFirstRow',
        //'setIteratorLastRow',
        'setIteratorRow' => ['setIteratorRow', \ImagickDemo\Control\ImageControl::class],
        'syncIterator' => ['construct', \ImagickDemo\Control\ImageControl::class],
    ];

    $tutorialExamples = [
        'composite' => ['composite', \ImagickDemo\Control\CompositeExampleControl::class ],
        'edgeExtend' => ['edgeExtend', \ImagickDemo\Control\ControlCompositeImageVirtualPixel::class],
        'compressImages' => ['compressImages', \ImagickDemo\Control\NullControl::class],
        'gradientReflection' => ['gradientReflection', \ImagickDemo\Control\NullControl::class],
        'psychedelicFont' => ['psychedelicFont', \ImagickDemo\Control\NullControl::class],
        'psychedelicFontGif' => ['psychedelicFontGif', \ImagickDemo\Control\NullControl::class],
        'imagickComposite' => ['imagickComposite', \ImagickDemo\Control\NullControl::class],
        'imagickCompositeGen' => ['imagickCompositeGen', \ImagickDemo\Control\NullControl::class],
        'fxAnalyzeImage' => ['fxAnalyzeImage', \ImagickDemo\Control\NullControl::class],
        'listColors' => ['listColors', \ImagickDemo\Control\NullControl::class],
        'svgExample' => ['svgExample', \ImagickDemo\Control\NullControl::class],
        'screenEmbed' => ['screenEmbed', \ImagickDemo\Control\NullControl::class],
        'gradientGeneration' => ['gradientGeneration', \ImagickDemo\Control\NullControl::class],

    ];

    $examples = [
        'Imagick' => $imagickExamples,
        'ImagickDraw' => $imagickDrawExamples,
        'ImagickPixel' => $imagickPixelExamples,
        'ImagickPixelIterator' => $imagickPixelIteratorExamples,
        'Example' => $tutorialExamples,
    ];

    if (!isset($examples[$category][$example])) {
        throw new \Exception("Somethings fucky: example [$category][$example] doesn't exist.");
    }

    return $examples[$category][$example];
}



require_once "process.php";
