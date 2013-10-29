<?php

define('SEPARATOR', ', ');

echo "<h2><a href='/'>Imagick examples</a></h2>";

if (array_key_exists('image', $_REQUEST) && $_REQUEST['image']) {
    $image = $_REQUEST['image'];
    echo "<img src='".$image."' />";
}

$imagePixelExamples = array(
    '__construct',
    //'ImagickPixel.clear', 
    'getColor',// ([ bool $normalized = false ] )
    'getColorAsString',// ( void )
    //No idea    'ImagickPixel.getColorCount',// ( void )
    'getColorValue',// ( int $color )
    'getColorValueQuantum',// ( int $color )
    'getHSL',// ( void )
    'isSimilar',// ( ImagickPixel $color , float $fuzz )
    'setColor',// ( string $color )
    'setColorValue',// ( int $color , float $value )
    'setcolorValueQuantum',// ( int $color , float $value )
    'setHSL',// ( float $hue , float $saturation , float $luminosity )
);


$ImagickPixelIteratorExamples = array(
    'clear' => 'resetIterator',
    '__construct',
    //'getCurrentIteratorRow',
    'getIteratorRow' => 'setIteratorRow',
    //'getNextIteratorRow',
    //'getPreviousIteratorRow',
    //'newPixelIterator', deprecated
    //'newPixelRegionIterator', deprecated
    'resetIterator',
    //'setIteratorFirstRow',
    //'setIteratorLastRow',
    'setIteratorRow',
    'syncIterator',// => '__construct',
);


$imagickExamples = array(
    'Quantum',
    'getImageChannelStatistics',

'adaptiveBlurImage',
//'adaptiveResizeImage',
//'adaptiveSharpenImage',
'adaptiveThresholdImage',
//'addImage',
'addNoiseImage',
'affineTransformImage', //Doesn't work?
//'animateImages',
//'annotateImage',
//'appendImages',
//'averageImages',
'blackThresholdImage',
'blurImage',
'borderImage',
'charcoalImage',
//'chopImage',
//'clear',
//'clipImage',
//'clipPathImage',
//'clutImage',
//'coalesceImages',
'colorFloodfillImage',
//'colorizeImage',
//'combineImages',
//'commentImage',
//'compareImageChannels',
//'compareImageLayers',
//'compareImages',
//'compositeImage',
//__construct',
'contrastImage',
//'contrastStretchImage',
//'convolveImage',
'cropImage',
//'cropThumbnailImage',
//'current',
//'cycleColormapImage',
//'decipherImage',
//'deconstructImages',
//'deleteImageArtifact',
//'deskewImage',
//'despeckleImage',
//'destroy',
//'displayImage',
//'displayImages',
//'distortImage',
//'drawImage',
//'edgeImage',
//'embossImage',
//'encipherImage',
'enhanceImage',
'equalizeImage',
//'evaluateImage',
//'exportImagePixels',
//'extentImage',
//'flattenImages',
'flipImage',
//'floodFillPaintImage',
'flopImage',
//'frameImage',
//'functionImage',
'fxImage',
//'gammaImage',
//'gaussianBlurImage',
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
//'getImageChannelStatistics',
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
'getImageHistogram',
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
'getPixelIterator',
'getPixelRegionIterator',
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
//'identifyImage',
//'implodeImage',
//'importImagePixels',
//'labelImage',
//'levelImage',
//'linearStretchImage',
//'liquidRescaleImage',
'magnifyImage',
//'mapImage',
//'matteFloodfillImage',
//'medianFilterImage',
//'mergeImageLayers',
//'minifyImage',
'modulateImage',
//'montageImage',
//'morphImages',
//'mosaicImages',
'motionBlurImage',
'negateImage',
//'newImage',
'newPseudoImage',
'newPseudoImage2',
//'nextImage',
'normalizeImage',
'oilPaintImage',
//'opaquePaintImage',
//'optimizeImageLayers',
//'orderedPosterizeImage',
//'paintFloodfillImage',
//'paintOpaqueImage',
//'paintTransparentImage',
'pingImage' => true,
//'pingImageBlob',
//'pingImageFile',
//'polaroidImage',
//'posterizeImage',
//'previewImages',
//'previousImage',
//'profileImage',
//'quantizeImage',
//'quantizeImages',
//'queryFontMetrics',
//'queryFonts',
//'queryFormats',
'radialBlurImage',
//'raiseImage',
//'randomThresholdImage',
//'readImage',
//'readImageBlob',
//'readImageFile',
'recolorImage',
//'reduceNoiseImage',
'remapImage',
//'removeImage',
//'removeImageProfile',
//'render',
'resampleImage',
//'resetImagePage',
//'resizeImage',
//'rollImage',
'rotateImage',
//'roundCorners',
//'sampleImage',
'scaleImage',
'segmentImage',
//'separateImageChannel',
'sepiaToneImage',
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
'setImageArtifact',
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

'setImageDelay',

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

'setImageTicksPerSecond',
//'setImageType',
//'setImageUnits',
//'setImageVirtualPixelMethod',
//'setImageWhitePoint',
//'setInterlaceScheme',
//'setIteratorIndex',
//'setLastIterator',
'setOption',
//'setPage',
//'setPointSize',
//'setResolution',
//'setResourceLimit',
//'setSamplingFactors',
//'setSize',
//'setSizeOffset',
//'setType',
'shadeImage',
'shadowImage',
'sharpenImage',
'shaveImage',
'shearImage',
//'sigmoidalContrastImage',
'sketchImage',
'solarizeImage',
'sparseColorImage_barycentric',
'sparseColorImage_bilinear',
'sparseColorImage_shepards',
'sparseColorImage_voronoi',
'spliceImage',
'spreadImage',
//'steganoImage',
//'stereoImage',
//'stripImage',
'swirlImage',
//'textureImage',
//'thresholdImage',
'thumbnailImage',
'tintImage', //what is this
'transformImage',
//'transparentPaintImage',
'transposeImage',
'transverseImage',
'trimImage',
'uniqueImageColors',
'unsharpMaskImage',
//'valid',
'vignetteImage',
'waveImage',
//'whiteThresholdImage',
//'writeImage',
//'writeImageFile',
//'writeImages',
//'writeImagesFile',
//}
);


$imagickDrawExamples = array(
    'affine',
    'annotation' => 'setFontSize',
    'arc',
    'bezier',
    'circle',
    //'clear',
    //'color',
    //'comment',
    'composite',
    //'destroy',
    'ellipse',
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
    'line',
    //'matte', dont know how it works
    'pathClose' => 'pathStart',
    'pathCurveToAbsolute',
    'pathCurveToQuadraticBezierAbsolute',
    'pathCurveToQuadraticBezierRelative',
    'pathCurveToQuadraticBezierSmoothAbsolute',
    'pathCurveToQuadraticBezierSmoothRelative',
    'pathCurveToRelative',
    'pathCurveToSmoothAbsolute',
    'pathCurveToSmoothRelative',
    'pathEllipticArcAbsolute',
    'pathEllipticArcRelative',
    'pathFinish',
    'pathLineToAbsolute',
    'pathLineToHorizontalAbsolute',
    'pathLineToHorizontalRelative',
    'pathLineToRelative',
    'pathLineToVerticalAbsolute',
    'pathLineToVerticalRelative',
    'pathMoveToAbsolute',
    'pathMoveToRelative',
    'pathStart',
    'point',
    'polygon',
    'polyline',
    'pop' => 'push',
    'popClipPath' => 'setClipPath',
    //'popDefs', DrawPushDefs() indicates that commands up to a terminating DrawPopDefs() command create named elements (e.g. clip-paths, textures, etc.) which may safely be processed earlier for the sake of efficiency.
    'popPattern' => 'pushPattern',
    'push',
    'pushClipPath' => 'setClipPath',
    // 'pushDefs', DrawPushDefs() indicates that commands up to a terminating DrawPopDefs() command create named elements (e.g. clip-paths, textures, etc.) which may safely be processed earlier for the sake of efficiency.
    'pushPattern',
    'rectangle',
    //'render', no idea what this does
    'rotate',
    'roundRectangle',
    'scale',
    'setClipPath',
    'setClipRule',
    'setClipUnits',
    'setFillAlpha',
    'setFillColor',
    'setFillOpacity',
    'setFillPatternURL' => 'pushPattern',
    'setFillRule',
    'setFillRule2',
    'setFont',
    //'setFontFamily',
    'setFontSize',
    //'setFontStretch', Does nothing?
    'setFontStyle',
    'setFontWeight',
    'setGravity',
    'setStrokeAlpha',
    'setStrokeAntialias',
    'setStrokeColor',
    'setStrokeDashArray',
    'setStrokeDashOffset',
    'setStrokeLineCap',
    'setStrokeLineJoin',
    'setStrokeMiterLimit',
    'setStrokeOpacity',
    //'setStrokePatternURL',
    'setStrokeWidth',
    'setTextAlignment',
    'setTextAntialias',
    'setTextDecoration',
    //'setTextEncoding',
    'setTextUnderColor',
    'setVectorGraphics', // seems broken
    // 'setViewbox', no idea what this does
    'skewX',
    'skewY',
    'translate',
);

$fullExamples = [
    'gradientReflection',
    'psychedelicFont',
    'composite' => 'composite',
];

echo "<h2>Full examples</h2>";
$separator = '';


foreach($fullExamples as $key => $fullExample) {
    echo $separator;
//    echo "<a href='/examples/$fullExample.php'>".$fullExample."</a>";

    if ($key === intval($key)){
        echo "<a href='?image=/examples/$fullExample.php'>".$fullExample."</a>";
    }
    else{
        echo "<a href='/examples/$fullExample.php'>".$key."</a>";
    }

//    if ($imagickExample === true) {
//        echo "<a href='/Imagick/$key.php' target='_blank'>".$key."</a>";
//    }

    $separator = SEPARATOR;
}


echo "<h2>ImagePixelExamples</h2>";
$separator = '';
foreach($imagePixelExamples as $imagePixelExample) {
    echo $separator;
    echo "<a href='/ImagickPixel/$imagePixelExample.php'>".$imagePixelExample."</a>";
    $separator = SEPARATOR;
}

echo "<h2>Imagick examples</h2>";
$separator = '';
foreach($imagickExamples as $key => $imagickExample) {
    echo $separator;

    if ($key === intval($key)){
        echo "<a href='?image=/Imagick/$imagickExample.php'>".$imagickExample."</a>";
    }

    if ($imagickExample === true) {
        echo "<a href='/Imagick/$key.php' target='_blank'>".$key."</a>";
    }
    $separator = SEPARATOR;
}

echo "<h2>ImagickDraw examples</h2>";
$separator = '';
foreach($imagickDrawExamples as $key => $imagickDrawExample) {
    echo $separator;

    if ($key === intval($key)){
        echo "<a href='?image=/ImagickDraw/$imagickDrawExample.php'>".$imagickDrawExample."</a>";
    }
    else{
        echo "<a href='?image=/ImagickDraw/$imagickDrawExample.php'>".$key."</a>";
    }
    $separator = SEPARATOR;
}

echo "<h2>ImagickPixelIteratorExample</h2>";
$separator = '';
foreach($ImagickPixelIteratorExamples as $key => $ImagickPixelIteratorExample) {
    echo $separator;

    if ($key === intval($key)){
        echo "<a href='?image=/ImagickPixelIterator/$ImagickPixelIteratorExample.php'>".$ImagickPixelIteratorExample."</a>";
    }
    else {
        echo "<a href='?image=/ImagickPixelIterator/$ImagickPixelIteratorExample.php'>".$key."</a>";
    }
    $separator = SEPARATOR;
}