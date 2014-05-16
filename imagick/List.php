<?php


use ImagickDemo\Navigation\NavOption;



function getImagickDrawExamples() {

    $imagickDrawExamples = array(
        new NavOption('affine', true ),
        //[ 'annotation',  ColorControl::class ], //=> 'setFontSize',
        new NavOption( 'arc', true ),
        new NavOption( 'bezier', true ),
        new NavOption( 'circle', true ),
        //'clear',
        //'color',
        //'comment',
        new NavOption( 'composite', true ),
        //'destroy',
        new NavOption( 'ellipse',true ),
        //    'getClipPath',
        //    'getClipRule',
        //    'getClipUnits',
        //    'getFillColor',
        //    'getFillOpacity',
        //    'getFillRule',
        //    'getFont',
        //    'getFontFamily',
        //    'getFontSize',
        //    'getFontStyle',
        //    'getFontWeight',
        //    'getGravity',
        //    'getStrokeAntialias',
        //    'getStrokeColor',
        //    'getStrokeDashArray',
        //    'getStrokeDashOffset',
        //    'getStrokeLineCap',
        //    'getStrokeLineJoin',
        //    'getStrokeMiterLimit',
        //    'getStrokeOpacity',
        //    'getStrokeWidth',
        //    'getTextAlignment',
        //    'getTextAntialias',
        //    'getTextDecoration',
        //    'getTextEncoding',
        //    'getTextUnderColor',
        //    'getVectorGraphics',
        new NavOption( 'line', true ),
        //'matte', dont know how it works
//        'pathClose' => 'pathStart',
//        'pathCurveToAbsolute',
//        'pathCurveToQuadraticBezierAbsolute',
//        'pathCurveToQuadraticBezierRelative',
//        'pathCurveToQuadraticBezierSmoothAbsolute',
//        'pathCurveToQuadraticBezierSmoothRelative',
//        'pathCurveToRelative',
//        'pathCurveToSmoothAbsolute',
//        'pathCurveToSmoothRelative',
//        'pathEllipticArcAbsolute',
//        'pathEllipticArcRelative',
//        'pathFinish',
//        'pathLineToAbsolute',
//        'pathLineToHorizontalAbsolute',
//        'pathLineToHorizontalRelative',
//        'pathLineToRelative',
//        //'pathLineToVerticalAbsolute',
//        //'pathLineToVerticalRelative',
//        'pathMoveToAbsolute',
//        'pathMoveToRelative',
        new NavOption( 'pathStart',true ),
        new NavOption( 'point',true ),
        new NavOption( 'polygon',true ),
        new NavOption( 'polyline',true ),
        new NavOption( 'pop' ,true, 'push' ),
        new NavOption( 'popClipPath' ,true, 'setClipPath' ), //=> 'setClipPath'
        //'popDefs', DrawPushDefs() indicates that commands up to a terminating DrawPopDefs() command create named elements (e.g. clip-paths, textures, etc.) which may safely be processed earlier for the sake of efficiency.
        new NavOption( 'popPattern' ,true, 'pushPattern' ), //=> 'pushPattern'
        new NavOption( 'push',true ),
        new NavOption( 'pushClipPath' ,true, 'setClipPath' ), //=> 'setClipPath'
        // 'pushDefs', DrawPushDefs() indicates that commands up to a terminating DrawPopDefs() command create named elements (e.g. clip-paths, textures, etc.) which may safely be processed earlier for the sake of efficiency.
        new NavOption( 'pushPattern', true),
        new NavOption( 'rectangle',true ),
        //'render', no idea what this does
        new NavOption( 'rotate',true ),
        new NavOption( 'roundRectangle',true ),
        new NavOption( 'scale',true ),
        new NavOption( 'setClipPath',true ),
        new NavOption( 'setClipRule',true ),
        new NavOption( 'setClipUnits',true ),
        new NavOption( 'setFillAlpha',true ),
        new NavOption( 'setFillColor',true ),
        new NavOption( 'setFillOpacity',true ),
        //new NavOption( 'setFillPatternURL' ,true ), //=> 'pushPattern'
        new NavOption( 'setFillRule',true ),
        new NavOption( 'setFont',true ),
        //'setFontFamily',
        new NavOption( 'setFontSize',true ),
        //'setFontStretch', Does nothing?
        new NavOption( 'setFontStyle',true ),
        new NavOption( 'setFontWeight',true ),
        new NavOption( 'setGravity',true ),
        new NavOption( 'setStrokeAlpha',true ),
        new NavOption( 'setStrokeAntialias',true ),
        new NavOption( 'setStrokeColor',true ),
        new NavOption( 'setStrokeDashArray',true ),
        new NavOption( 'setStrokeDashOffset',true ),
        new NavOption( 'setStrokeLineCap',true ),
        new NavOption( 'setStrokeLineJoin',true ),
        new NavOption( 'setStrokeMiterLimit',true ),
        new NavOption( 'setStrokeOpacity',true ),
        //'setStrokePatternURL',
        new NavOption( 'setStrokeWidth',true ),
        new NavOption( 'setTextAlignment',true ),
        new NavOption( 'setTextAntialias',true ),
        new NavOption( 'setTextDecoration',true ),
        //'setTextEncoding',
        new NavOption( 'setTextUnderColor',true ),
        //new NavOption( 'setVectorGraphics', true ),
        // 'setViewbox', no idea what this does
        new NavOption( 'skewX',true ),
        new NavOption( 'skewY',true ),
        new NavOption( 'translate',true ),
    );

    return $imagickDrawExamples;
}


function getImagickPixelExamples() {
    $imagePixelExamples = array(
        new NavOption('construct', true),
        //'ImagickPixel.clear', 
        new NavOption('getColor',  false),
        new NavOption('getColorAsString', false),
        //No idea    'ImagickPixel.getColorCount',
        new NavOption('getColorValue', false),
        new NavOption('getColorValueQuantum', false),
        new NavOption('getHSL', false),
        new NavOption('isSimilar', false),
        new NavOption('setColor', true),
        new NavOption('setColorValue', true),
        new NavOption('setColorValueQuantum', true),
        new NavOption('setHSL', false),
    );

    return $imagePixelExamples;
}

/**
 * @return NavOption[]
 */
function getImagickExamples() {

    $imagickExamples = [

        new NavOption('adaptiveBlurImage', true),
        new NavOption('adaptiveResizeImage', true),
        new NavOption('adaptiveSharpenImage', true),
        new NavOption('adaptiveThresholdImage',  true),
        //'addImage',
        new NavOption('addNoiseImage',  true),
        new NavOption('affineTransformImage',  true), //Doesn't work?
        //'animateImages',
        new NavOption('annotateImage',  true),
        //'appendImages',
        new NavOption('autoLevelImage',  true),
        //new NavOption('averageImages',  true),
        new NavOption('blackThresholdImage',  true),
        new NavOption('blueShiftImage',  true),
        new NavOption('blurImage',  true),
        new NavOption('borderImage', true),
        new NavOption('brightnessContrastImage', true),
        new NavOption('charcoalImage', true),
        new NavOption('chopImage', true),
        //ClipImage
        //'clear',
        //new NavOption('clipImage', true),
        //'clipPathImage',
        new NavOption('clutImage', true),
        //'coalesceImages',
        //deprecated - new NavOption('colorFloodfillImage', true),
        //ColorDecisionListImage
        new NavOption('colorizeImage', true),
        new NavOption('colorMatrixImage', true),
        //'combineImages',
        //'commentImage',
        //'compareImageChannels',
        //'compareImageLayers',
        //'compareImages',
        new NavOption('compositeImage', true),
        // CompositeLayers
        //__construct',
        new NavOption('contrastImage', true),
        //'contrastStretchImage',
        new NavOption('convolveImage', true),
        new NavOption('cropImage', true),
        //'cropThumbnailImage',
        //'current',
        //'cycleColormapImage',
        // ConstituteImage
        // DestroyImage
        //'decipherImage',
        //'deconstructImages',
        //'deleteImageArtifact',
        new NavOption('deskewImage', true),
        new NavOption('despeckleImage', true),
        //'destroy',
        //'displayImage',
        //'displayImages',
        new NavOption('distortImage', true),
        //'drawImage',
        //'edgeImage',
        //'embossImage',
        //'encipherImage',

        new NavOption('enhanceImage', true),
        new NavOption('equalizeImage', true),
//'evaluateImage',
        //'exportImagePixels',
//'extentImage',
        //FilterImage - this appears to be a duplicate function
        //FrameImage
        //'flattenImages',
        new NavOption('flipImage', true),
        new NavOption('floodFillPaintImage', true),
        new NavOption('flopImage', true),
        new NavOption('forwardFourierTransformImage', false),
        new NavOption('frameImage', true),
        new NavOption('functionImage', true),
        new NavOption('fxImage', true),
        new NavOption('gammaImage', true),
        new NavOption('gaussianBlurImage', true),
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
        new NavOption('getImageChannelStatistics', true),
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
        new NavOption('getImageHistogram', false),
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
        new NavOption('getPixelIterator', true),
        new NavOption('getPixelRegionIterator', true),
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
//'haldClutImage',
        //'hasNextImage',
        //'hasPreviousImage',
        new NavOption('identifyImage', false),
        new NavOption('inverseFourierTransformImage', false, 'forwardFourierTransformImage'),
        //'implodeImage',
        //'importImagePixels',
        //'labelImage',
        //'levelImage',
        //'linearStretchImage',
        //'liquidRescaleImage',
        new NavOption('magnifyImage', true),
        //'mapImage',
        //'matteFloodfillImage',
        //'medianFilterImage',
        //'mergeImageLayers',
        //'minifyImage',
        new NavOption('modulateImage', true),
        //'montageImage',
        //'morphImages',
        // MorphologyImage
        new NavOption('mosaicImage', true),
        new NavOption('motionBlurImage', true),
        new NavOption('negateImage', true),
        //'newImage',
        new NavOption('newPseudoImage', true),
        //'nextImage',
        new NavOption('normalizeImage', true),
        new NavOption('oilPaintImage', true),
        //'opaquePaintImage',
        //'optimizeImageLayers',
        // OptimizeImageTransparency
        //'orderedPosterizeImage',
        //'paintOpaqueImage',
        //'paintTransparentImage',
        //deprecated - paintfloodfillimage
        new NavOption('pingImage', false),
        new NavOption('Quantum', null, false),
        //'pingImageBlob',
        //'pingImageFile',
        //'polaroidImage',
        //'posterizeImage',
        //'previewImages',
        //'previousImage',
        //'profileImage',
        
        new NavOption('quantizeImage', true),
        //'quantizeImages',
        //'queryFontMetrics',
        //'queryFonts',
        //'queryFormats',
        new NavOption('radialBlurImage', true),
        new NavOption('raiseImage', true),
        new NavOption('randomThresholdImage', true),
        //'readImage',
        //'readImageBlob',
        //'readImageFile',
        new NavOption('recolorImage', true),
        new NavOption('reduceNoiseImage', true),
//new NavOption('remapImage', true),
        //'removeImage',
        //'removeImageProfile',
        //'render',
        new NavOption('resampleImage', true),
        //'resetImagePage',
        //'resizeImage',
        new NavOption('rollImage', true),
        new NavOption('rotateImage', true),
        //RotationalBlurImage
        //'roundCorners',
        //'sampleImage',
        new NavOption('scaleImage', true),
        new NavOption('screenEmbed', true),
        new NavOption('segmentImage', true),
        new NavOption('selectiveBlurImage', true),
        new NavOption('separateImageChannel', true),
        new NavOption('sepiaToneImage', true),
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
        new NavOption('setImageArtifact', true),
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
        new NavOption('setImageDelay', true),
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
        new NavOption('setImageTicksPerSecond', true),
        //'setImageType',
        //'setImageUnits',
        //'setImageVirtualPixelMethod',
        //'setImageWhitePoint',
        //'setInterlaceScheme',
        //'setIteratorIndex',
        //'setLastIterator',
        new NavOption('setOption', true),
        new NavOption('setProgressMonitor', true),
        //'setPage',
        //'setPointSize',
        //'setResolution',
        //'setResourceLimit',
        //'setSamplingFactors',
        //'setSize',
        //'setSizeOffset',
        //'setType',
        new NavOption('shadeImage', true),
        new NavOption('shadowImage', true),
        new NavOption('sharpenImage', true),
        new NavOption('shaveImage', true),
        new NavOption('shearImage', true),
        new NavOption('sigmoidalContrastImage', true),
//new NavOption('similarityImage', true),
        
        new NavOption('sketchImage', true),
        new NavOption('sketchImage', true),
        new NavOption('smushImages', true),
        new NavOption('solarizeImage', true),
        new NavOption('sparseColorImage', true),
        new NavOption('spliceImage', true),
        new NavOption('spreadImage', true),
        //StatisticImage
        //'steganoImage',
        //'stereoImage',
        //'stripImage',
        new NavOption('swirlImage', true),
        new NavOption('textureImage',  true),
        new NavOption('thresholdImage',  true),
        new NavOption('thumbnailImage', true),
        new NavOption('tintImage',  true),//what is this
        new NavOption('transformImage', true),
        new NavOption('transparentPaintImage', true),
        new NavOption('transposeImage', true),
        new NavOption('transformImageColorspace', true),
        new NavOption('transverseImage', true),
        new NavOption('trimImage', true),
        new NavOption('uniqueImageColors', true),
        new NavOption('unsharpMaskImage', true),
        new NavOption('vignetteImage', true),
        new NavOption('waveImage', true),
        new NavOption('whiteThresholdImage', true),
    ];
    
    //Things not sure whether to demo
    //'valid',
    //'writeImage',
    //'writeImageFile',
    //'writeImages',
    //'writeImagesFile',
    
    

    return $imagickExamples;
}



function getImagickPixelIteratorExamples() {

    $imagickPixelIteratorExamples = array(
        new NavOption('clear', true ),
        new NavOption('construct', true),
        //'getCurrentIteratorRow',
        //'getIteratorRow' => 'setIteratorRow',
        new NavOption('getNextIteratorRow', true ),
        //'getPreviousIteratorRow',
        //'newPixelIterator', deprecated
        //'newPixelRegionIterator', deprecated
        new NavOption('resetIterator', true ),
        //'setIteratorFirstRow',
        //'setIteratorLastRow',
        new NavOption('setIteratorRow', true ),
        new NavOption('syncIterator', true),// => '__construct',
    );

    return $imagickPixelIteratorExamples;
}

/*

Image examples that still need to be checked for being available
and working.

GetImage
GetImageAlphaChannel
GetImageClipMask
GetImageBackgroundColor
GetImageBlob
GetImageBlob
GetImageBluePrimary
GetImageBorderColor
GetImageChannelDepth
GetImageChannelDistortion
GetImageChannelDistortions
GetImageChannelFeatures
GetImageChannelKurtosis
GetImageChannelMean
GetImageChannelRange
GetImageColormapColor
GetImageColors
GetImageColorspace
GetImageCompose
GetImageCompression
GetImageCompressionQuality
GetImageDelay
GetImageDepth
GetImageDistortion
GetImageDispose
GetImageEndian
GetImageFilename
GetImageFormat
GetImageFuzz
GetImageGamma
GetImageGravity
GetImageGreenPrimary
GetImageHeight
GetImageInterlaceScheme
GetImageInterpolateMethod
GetImageIterations
GetImageLength
GetImageMatteColor
GetImageOrientation
GetImagePage
GetImagePixelColor
GetImageRedPrimary
GetImageRegion
GetImageRenderingIntent
GetImageResolution
GetImageScene
GetImageSignature
GetImageTicksPerSecond
GetImageType
GetImageUnits
GetImageVirtualPixelMethod
GetImageWhitePoint
GetImageWidth
GetNumberImages
GetImageTotalInkDensity


SetImage
SetImageAlphaChannel
SetImageBackgroundColor
SetImageBias
SetImageBluePrimary
SetImageBorderColor
SetImageChannelDepth
SetImageClipMask
SetImageColor
SetImageColormapColor
SetImageColorspace
SetImageCompose
SetImageCompression
SetImageCompressionQuality
SetImageDepth
SetImageDispose
SetImageEndian
SetImageExtent
SetImageFilename
SetImageFormat
SetImageFuzz
SetImageGamma
SetImageGravity
SetImageGreenPrimary
SetImageInterlaceScheme
SetImageInterpolateMethod
SetImageIterations
SetImageMatte
SetImageMatteColor
SetImageOpacity
SetImageOrientation
SetImagePage
SetImageProgressMonitor
SetImageRedPrimary
SetImageRenderingIntent
SetImageResolution
SetImageScene
SetImageType
SetImageUnits
SetImageVirtualPixelMethod
SetImageWhitePoint


*/

//TODO - get a better name
function getExampleExamples() {
    $imagickExamples = [
        new NavOption('edgeExtend', true),
        new NavOption('gradientReflection',  true),
        new NavOption('psychedelicFont', true),
        new NavOption('psychedelicFontGif', true),
        new NavOption('imagickComposite', true),
        new NavOption('imagickCompositeGen', true),

        new NavOption('fxAnalyzeImage', true),
        
        
        new NavOption('composite', true),
    ];

    return $imagickExamples;
}


function checkOutstanding() {
    $imagickExamples = getImagickExamples();
    require_once "test.php";

    foreach ($magickFunctions as $magickFunction) {
        $functionName = $magickFunction;
        if (strpos($functionName, "Magick") === 0) {
            $functionName = substr($functionName, strlen("Magick"));
        }

        $present = false;

        foreach ($imagickExamples as $example) {
            if (strcasecmp($example->getName(), $functionName) === 0) {
                $present = true;
            }
        }

        if ($present == false) {
            echo $functionName;
            echo "<br/>";
        }
    }

    exit(0);
}

//checkOutstanding();




 