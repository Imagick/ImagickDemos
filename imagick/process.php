<?php

//TODO - Arctan function isn't in my current imagick.

\Intahwebz\Functions::load();

//yolo - We use a global to allow us to do a hack to make all the code examples
//appear to use the standard 'header' function, but also capture the content type 
//of the image
$imageType = null;

use \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor;




function analyzeImage(\Imagick $imagick, $graphWidth = 255, $graphHeight = 127) {

    //$graphWidth = 255;
    $sampleHeight = 20;
    //$graphHeight = 127;
    $border = 2;

    $imagick->transposeImage();
    //$imagick->flopImage();
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

    //exit(0);


    $plot = new \Imagick();
    $plot->newImage($graphWidth, $graphHeight, 'white');
    $plot->drawImage($draw);

//    $plot->setImageFormat("png");
//    header("Content-Type: image/png");
//    echo $plot;
//    exit(0);
//    

    $outputImage = new \Imagick();
    $outputImage->newImage($graphWidth, $graphHeight + $sampleHeight, 'white');
    $outputImage->compositeimage($plot, \Imagick::COMPOSITE_ATOP, 0, 0);

    //$imagick->resizeimage($imagick->getImageWidth(), $sampleHeight, \Imagick::FILTER_LANCZOS, 1);

    $outputImage->compositeimage($imagick, \Imagick::COMPOSITE_ATOP, 0, $graphHeight);
    $outputImage->borderimage('black', $border, $border);

    $outputImage->setImageFormat("png");
    header("Content-Type: image/png");
    echo $outputImage;
}


/**
 * @return \Auryn\Provider
 */
function bootstrap() {

    $injector = new Auryn\Provider();
    $jigConfig = new Intahwebz\Jig\JigConfig(
        "../templates/",
        "../var/compile/",
        'tpl',
        \Intahwebz\Jig\JigRender::COMPILE_CHECK_EXISTS
    );

    $injector->share($jigConfig);

    $injector->defineParam('imageBaseURL', null);
    $injector->defineParam('customImageBaseURL', null);
    
    $injector->defineParam('pageTitle', "Imagick demos");

    $injector->defineParam('standardImageWidth', 500);
    $injector->defineParam('standardImagHeight', 500);
    $injector->defineParam('smallImageWidth', 350); 
    $injector->defineParam('smallImageHeight', 300);

    $injector->alias(ImagickDemo\Control::class, ImagickDemo\Control\NullControl::class);
    $injector->alias(Intahwebz\Request::class, Intahwebz\Routing\HTTPRequest::class);
    $injector->alias(\ImagickDemo\ExampleList::class, \ImagickDemo\NullExampleList::class);
    $injector->alias(\ImagickDemo\Example::class, \ImagickDemo\NullExample::class);
    $injector->alias(\ImagickDemo\Navigation\Nav::class, \ImagickDemo\Navigation\NullNav::class);

    $injector->share(\ImagickDemo\Control::class);
    $injector->share(\ImagickDemo\Example::class);
    $injector->share(ImagickDemo\Navigation\Nav::class);
    
    $injector->define(
    Intahwebz\Routing\HTTPRequest::class,
        array(
            ':server' => $_SERVER,
            ':get' => $_GET,
            ':post' => $_POST,
            ':files' => $_FILES,
            ':cookie' => $_COOKIE
        )
    );

    $injector->defineParam('imageCachePath', "../var/cache/imageCache/");
    $injector->share($injector); //yolo - use injector as service locator

    return $injector;
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
        'chopImage' => ['chopImage', \ImagickDemo\Control\ImageControl::class],
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

function setupImageDelegation(\Auryn\Provider $provider, $category, $example) {

    list($function, $controlClass) = getExampleDefinition($category, $example);

    $provider->share($controlClass);

    $params = ['a', 'amount', 'amplitude', 'angle', 'b', 'backgroundColor', 'blackPoint', 'blueShift', 'brightness', 'channel', 'colorElement', 'contrast', 'colorSpace', 'distortionExample', 'endAngle', 'endX', 'endY', 'evaluateType', 'fillColor', 'firstTerm', 'fillModifiedColor', 'fourthTerm', 'g', 'gradientStartColor', 'gradientEndColor', 'height', 'image', 'imagePath', 'length', 'meanOffset', 'noiseType', 'originX', 'originY', 'r', 'radius', 'roundX', 'roundY', 'secondTerm', 'sigma', 'skew', 'solarizeThreshold', 'startAngle', 'startX', 'startY', 'statisticType', 'strokeColor', 'swirl', 'textDecoration', 'textUnderColor', 'thirdTerm', 'threshold', 'translateX', 'translateY', 'unsharpThreshold', 'virtualPixelType', 'whitePoint', 'x', 'y', 'w20', 'h20', 'sharpening', 'midpoint', 'sigmoidalContrast',];

    
    foreach ($params as $param) {
        $paramGet = 'get'.ucfirst($param);
        $provider->delegateParam(
            $param,
            [$controlClass, $paramGet]
        );
    }

    
    $namespace = sprintf('ImagickDemo\%s\functions', $category);
    $namespace::load(); 

    $provider->execute($function);
    exit(0);
}

function setupExampleDelegation(\Auryn\Provider $injector, $category, $example) {

    list($function, $controlClass) = getExampleDefinition($category, $example);

    $injector->defineParam('imageBaseURL', '/image/'.$category.'/'.$example);
    $injector->defineParam('customImageBaseURL', '/customImage/'.$category.'/'.$example);
    
    $injector->defineParam('activeCategory', $category);

    $injector->alias(\ImagickDemo\Control::class, $controlClass);
    $injector->alias(ImagickDemo\ExampleList::class, "ImagickDemo\\".$category."\\ExampleList");

    $injector->alias(\ImagickDemo\Navigation\Nav::class, \ImagickDemo\Navigation\CategoryNav::class);
    $injector->define(ImagickDemo\Navigation\CategoryNav::class, [
        ':category' => $category,
        ':example' => $example
    ]);

    $injector->alias(\ImagickDemo\Example::class, sprintf('ImagickDemo\%s\%s', $category, $function));
    renderTemplate($injector);
}


function setupCustomImageDelegation(\Auryn\Provider $injector, $category, $example) {

    list($function, $controlClass) = getExampleDefinition($category, $example);

    $injector->defineParam('imageBaseURL', '/image/'.$category.'/'.$example);
    $injector->defineParam('customImageBaseURL', '/customImage/'.$category.'/'.$example);
    $injector->defineParam('activeCategory', $category);
    $injector->alias(\ImagickDemo\Control::class, $controlClass);
    $injector->alias(ImagickDemo\ExampleList::class, "ImagickDemo\\".$category."\\ExampleList");

    $injector->alias(\ImagickDemo\Navigation\Nav::class, \ImagickDemo\Navigation\CategoryNav::class);
    $injector->define(ImagickDemo\Navigation\CategoryNav::class, [
        ':category' => $category,
        ':example' => $example
    ]);

    $className = sprintf('ImagickDemo\%s\%s', $category, $function);
    $injector->execute([$className, 'renderCustomImage']);
}


function setupCatergoryDelegation(\Auryn\Provider $injector, $category, $example = null) {
    $validCatergories = [
        'Imagick',
        'ImagickDraw',
        'ImagickPixel',
        'ImagickPixelIterator',
        'Example',
    ];

    if (in_array($category, $validCatergories) == false) {
        throw new \Exception("Category is not valid.");
    }

    $injector->defineParam('imageBaseURL', '/image/'.$category);
    $injector->defineParam('customImageBaseURL', '/customImage/'.$category);
    $injector->defineParam('activeCategory', $category);

    $injector->share(\ImagickDemo\Control::class);
    $injector->alias(ImagickDemo\ExampleList::class, "ImagickDemo\\".$category."\\ExampleList");
    $injector->alias(\ImagickDemo\Example::class, sprintf('ImagickDemo\%s\IndexExample', $category));
    $injector->alias(\ImagickDemo\Navigation\Nav::class, \ImagickDemo\Navigation\CategoryNav::class);
    $injector->define(ImagickDemo\Navigation\CategoryNav::class, [
        ':category' => $category,
        ':example' => $example
    ]);

    renderTemplate($injector);
}

function renderTemplate(\Auryn\Provider $injector) {
    $viewModel = $injector->make(Intahwebz\ViewModel\BasicViewModel::class);
    $jigRenderer = $injector->make(Intahwebz\Jig\JigRender::class);
    $jigRenderer->bindViewModel($viewModel);
    $viewModel->setVariable('pageTitle', "Imagick demos");
    $jigRenderer->renderTemplateFile('index');
}


function setupRootIndex(\Auryn\Provider $injector) {
    $injector->alias(\ImagickDemo\Example::class, ImagickDemo\HomePageExample::class);

    //TODO - setup 
    renderTemplate($injector);
}


$routesFunction = function(FastRoute\RouteCollector $r) {

    $categories = '{category:Imagick|ImagickDraw|ImagickPixel|ImagickPixelIterator|Example}';

    //Category indices
    $r->addRoute(
      'GET',
          "/$categories",
          'setupCatergoryDelegation'
    );

    //Category + example
    $r->addRoute(
        'GET',
        "/$categories/{example:[a-zA-Z]+}",
        'setupExampleDelegation'
    );

    //Images
    $r->addRoute(
      'GET',
          "/image/$categories/{example:[a-zA-Z]+}",
          'setupImageDelegation'
    );

    $r->addRoute(
      'GET',
          "/customImage/$categories/{example:[a-zA-Z]*}",
          'setupCustomImageDelegation'
    );

    $r->addRoute(
      'GET',
          "/help/$categories/{example:[a-zA-Z]+}",
          'setupHelp'
    );
    
    //root
    $r->addRoute('GET', '/', 'setupRootIndex');
};


$dispatcher = FastRoute\simpleDispatcher($routesFunction);

$httpMethod = 'GET';
$uri = '/';

if(array_key_exists('REQUEST_URI', $_SERVER)){
    $uri = $_SERVER['REQUEST_URI'];
}

//$uri = "/customImage/Imagick/distortImage?image=Lorikeet&distortion=9";
//$uri = "/customImage/Imagick/sparseColorImage/renderImageVoronoi";

$path = $uri;
$queryPosition = strpos($path, '?');
if ($queryPosition !== false) {
    $path = substr($path, 0, $queryPosition);
}

$injector = bootstrap(); 
$injector->defineParam('activeNav', $path);
$routeInfo = $dispatcher->dispatch($httpMethod, $path);

function process(\Auryn\Provider $injector, $handler, $vars) {

    $lowried = [];
    foreach ($vars as $key => $value) {
        $lowried[':'.$key] = $value;
    }

    $injector->execute($handler, $lowried);
}



//$handler = [
//    'ImagickDemo\ImagickNav',
//    'display'
//];
//
//$vars = [
//  'example' => 'uniqueImageColors'
//];
//
//process($injector, $handler, $vars);
//
//exit(0);


switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND: {
        header("HTTP/1.0 404 Not Found", true, 404);
        echo "No route matched. No route matched.No route matched.No route matched.No route matched.No route matched.No route matched.No route matched.";
        break;
    }

    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED: {
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    }

    case FastRoute\Dispatcher::FOUND: {
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars

        process($injector, $handler, $vars);
        break;
    }
}


/*

function renderImageSafe() {
    try {
        $this->renderImage();
    }
    catch(\Exception $e) {
        $draw = new \ImagickDraw();

        $strokeColor = new \ImagickPixel('none');
        $lightColor = new \ImagickPixel('brown');

        $draw->setStrokeColor($strokeColor);
        $draw->setFillColor($lightColor);
        $draw->setStrokeWidth(1);
        $draw->setFontSize(24);
        $draw->setFont("../fonts/Arial.ttf");

        $draw->setTextAntialias(false);
        $draw->annotation(50, 75, $e->getMessage());

        $imagick = new \Imagick();
        $imagick->newImage(500, 250, "SteelBlue2");
        $imagick->setImageFormat("png");
        $imagick->drawImage($draw);

        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
}

*/