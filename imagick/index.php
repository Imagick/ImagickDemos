<?php


if (defined('LOW_MEM_CLASS_LOADER') && LOW_MEM_CLASS_LOADER == true) {
    require_once('../vendor/intahwebz/lowmemoryclassloader/LowMemoryClassloader.php');
}
else {
    require_once('../vendor/autoload.php');
}

use ImagickDemo\Control\ColorControl;
use ImagickDemo\Control\ImageControl;

\Intahwebz\Functions::load();

//yolo - We use a global to allow us to do a hack to make all the code examples
//appear to use the standard 'header' function, but also capture the content type 
//of the image
$imageType = null;


function getImagickDrawExamples() {

    $imagickDrawExamples = array(
        [ 'affine', ColorControl::class ],
        //[ 'annotation',  ColorControl::class ], //=> 'setFontSize',
        [ 'arc', ColorControl::class ],
        [ 'bezier', ColorControl::class ],
        [ 'circle', ColorControl::class ],
        //'clear',
        //'color',
        //'comment',
        [ 'composite', ColorControl::class ],
        //'destroy',
        [ 'ellipse',ColorControl::class ],
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
        [ 'line', ColorControl::class ],
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
        [ 'pathStart',ColorControl::class ],
        [ 'point',ColorControl::class ],
        [ 'polygon',ColorControl::class ],
        [ 'polyline',ColorControl::class ],
        [ 'pop' ,ColorControl::class ], //=> 'push'
        [ 'popClipPath' ,ColorControl::class ], //=> 'setClipPath'
        //'popDefs', DrawPushDefs() indicates that commands up to a terminating DrawPopDefs() command create named elements (e.g. clip-paths, textures, etc.) which may safely be processed earlier for the sake of efficiency.
        [ 'popPattern' ,ColorControl::class ], //=> 'pushPattern'
        [ 'push',ColorControl::class ],
        [ 'pushClipPath' ,ColorControl::class ], //=> 'setClipPath'
        // 'pushDefs', DrawPushDefs() indicates that commands up to a terminating DrawPopDefs() command create named elements (e.g. clip-paths, textures, etc.) which may safely be processed earlier for the sake of efficiency.
        [ 'pushPattern', ColorControl::class ],
        [ 'rectangle',ColorControl::class ],
        //'render', no idea what this does
        [ 'rotate',ColorControl::class ],
        [ 'roundRectangle',ColorControl::class ],
        [ 'scale',ColorControl::class ],
        [ 'setClipPath',ColorControl::class ],
        [ 'setClipRule',ColorControl::class ],
        [ 'setClipUnits',ColorControl::class ],
        [ 'setFillAlpha',ColorControl::class ],
        [ 'setFillColor',ColorControl::class ],
        [ 'setFillOpacity',ColorControl::class ],
        [ 'setFillPatternURL' ,ColorControl::class ], //=> 'pushPattern'
        [ 'setFillRule',ColorControl::class ],
        [ 'setFillRule2',ColorControl::class ],
        [ 'setFont',ColorControl::class ],
        //'setFontFamily',
        [ 'setFontSize',ColorControl::class ],
        //'setFontStretch', Does nothing?
        [ 'setFontStyle',ColorControl::class ],
        [ 'setFontWeight',ColorControl::class ],
        [ 'setGravity',ColorControl::class ],
        [ 'setStrokeAlpha',ColorControl::class ],
        [ 'setStrokeAntialias',ColorControl::class ],
        [ 'setStrokeColor',ColorControl::class ],
        [ 'setStrokeDashArray',ColorControl::class ],
        [ 'setStrokeDashOffset',ColorControl::class ],
        [ 'setStrokeLineCap',ColorControl::class ],
        [ 'setStrokeLineJoin',ColorControl::class ],
        [ 'setStrokeMiterLimit',ColorControl::class ],
        [ 'setStrokeOpacity',ColorControl::class ],
        //'setStrokePatternURL',
        [ 'setStrokeWidth',ColorControl::class ],
        [ 'setTextAlignment',ColorControl::class ],
        [ 'setTextAntialias',ColorControl::class ],
        [ 'setTextDecoration',ColorControl::class ],
        //'setTextEncoding',
        [ 'setTextUnderColor',ColorControl::class ],
        [ 'setVectorGraphics', ColorControl::class ],// seems broken
        // 'setViewbox', no idea what this does
        [ 'skewX',ColorControl::class ],
        [ 'skewY',ColorControl::class ],
        [ 'translate',ColorControl::class ],
    );

    return $imagickDrawExamples;
}


function getImagickPixelExamples() {
     $imagePixelExamples = array(
        ['construct', null],
        //'ImagickPixel.clear', 
        ['getColor',  null],// ([ bool $normalized = false ] )
        ['getColorAsString', null],// ( void )
        //No idea    'ImagickPixel.getColorCount',// ( void )
        ['getColorValue', null],// ( int $color )
        ['getColorValueQuantum', null],// ( int $color )
        ['getHSL', null],// ( void )
        ['isSimilar', null],// ( ImagickPixel $color , float $fuzz )
        ['setColor', null],// ( string $color )
        ['setColorValue', null],// ( int $color , float $value )
        ['setColorValueQuantum', null],// ( int $color , float $value )
        ['setHSL',  null],// ( float $hue , float $saturation , float $luminosity )
    );

    return $imagePixelExamples;
}

function getImagickExamples() {

    $imagickExamples = [

        ['adaptiveBlurImage', ImageControl::class],
        ['adaptiveResizeImage', ImageControl::class],
        ['adaptiveSharpenImage', ImageControl::class],
        ['adaptiveThresholdImage',  ImageControl::class],
//'addImage',
        ['addNoiseImage',  ImageControl::class],
        ['affineTransformImage',  ImageControl::class], //Doesn't work?
//'animateImages',
//'annotateImage',
//'appendImages',
        ['averageImages',  ImageControl::class],
        ['blackThresholdImage',  ImageControl::class],
        ['blurImage',  ImageControl::class],
        ['borderImage', ImageControl::class],
        ['charcoalImage', ImageControl::class],
        ['chopImage', ImageControl::class],
//'clear',
        ['clipImage', ImageControl::class],
//'clipPathImage',
        ['clutImage', ImageControl::class],
//'coalesceImages',
        ['colorFloodfillImage', ImageControl::class],
        ['colorizeImage', ImageControl::class],
//'combineImages',
//'commentImage',
//'compareImageChannels',
//'compareImageLayers',
//'compareImages',
//'compositeImage',
//__construct',
        ['contrastImage', ImageControl::class],
//'contrastStretchImage',
        ['convolveImage', ImageControl::class],
        ['cropImage', ImageControl::class],
//'cropThumbnailImage',
//'current',
//'cycleColormapImage',
//'decipherImage',
//'deconstructImages',
//'deleteImageArtifact',
        ['deskewImage', ImageControl::class],
        ['despeckleImage', ImageControl::class],
//'destroy',
//'displayImage',
//'displayImages',
//'distortImage',
//'drawImage',
//'edgeImage',
//'embossImage',
//'encipherImage',
        ['edgeExtend', ImageControl::class],
        ['enhanceImage', ImageControl::class],
        ['equalizeImage', ImageControl::class],
//'evaluateImage',
//'exportImagePixels',
//'extentImage',
//'flattenImages',
        ['flipImage', ImageControl::class],
//'floodFillPaintImage',
        ['flopImage', ImageControl::class],
//'frameImage',
        ['functionImage', ImageControl::class],
        ['fxImage', ImageControl::class],
        ['gammaImage', ImageControl::class],
        ['gaussianBlurImage', ImageControl::class],
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
        ['getImageChannelStatistics', ImageControl::class],
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
        ['getImageHistogram', ImageControl::class],
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
        ['getPixelIterator', ImageControl::class],
        ['getPixelRegionIterator', ImageControl::class],
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
        ['identifyImage', ImageControl::class],
//'implodeImage',
//'importImagePixels',
//'labelImage',
//'levelImage',
//'linearStretchImage',
//'liquidRescaleImage',
        ['magnifyImage', ImageControl::class],
//'mapImage',
//'matteFloodfillImage',
//'medianFilterImage',
//'mergeImageLayers',
//'minifyImage',
        ['modulateImage', ImageControl::class],
//'montageImage',
//'morphImages',
//'mosaicImages',
        ['motionBlurImage', ImageControl::class],
        ['negateImage', ImageControl::class],
//'newImage',
        ['newPseudoImage', ImageControl::class],
        ['newPseudoImage2', ImageControl::class],
//'nextImage',
        ['normalizeImage', ImageControl::class],
        ['oilPaintImage', ImageControl::class],
//'opaquePaintImage',
//'optimizeImageLayers',
//'orderedPosterizeImage',
//'paintFloodfillImage',
//'paintOpaqueImage',
//'paintTransparentImage',
        ['pingImage', ImageControl::class],
        ['Quantum', null],
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
        ['radialBlurImage', ImageControl::class],
//'raiseImage',
//'randomThresholdImage',
//'readImage',
//'readImageBlob',
//'readImageFile',
        ['recolorImage', ImageControl::class],
//'reduceNoiseImage',
        ['remapImage', ImageControl::class],
//'removeImage',
//'removeImageProfile',
//'render',
        ['resampleImage', ImageControl::class],
//'resetImagePage',
//'resizeImage',
//'rollImage',
        ['rotateImage', ImageControl::class],
//'roundCorners',
//'sampleImage',
        ['scaleImage', ImageControl::class],
        ['screenEmbed', ImageControl::class],
        ['segmentImage', ImageControl::class],
//'separateImageChannel',
        ['sepiaToneImage', ImageControl::class],
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
        ['setImageArtifact', ImageControl::class],
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
        ['setImageDelay', ImageControl::class],
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

        ['setImageTicksPerSecond', ImageControl::class],
//'setImageType',
//'setImageUnits',
//'setImageVirtualPixelMethod',
//'setImageWhitePoint',
//'setInterlaceScheme',
//'setIteratorIndex',
//'setLastIterator',
        ['setOption', ImageControl::class],
//'setPage',
//'setPointSize',
//'setResolution',
//'setResourceLimit',
//'setSamplingFactors',
//'setSize',
//'setSizeOffset',
//'setType',
        ['shadeImage', ImageControl::class],
        ['shadowImage', ImageControl::class],
        ['sharpenImage', ImageControl::class],
        ['shaveImage', ImageControl::class],
        ['shearImage', ImageControl::class],
//'sigmoidalContrastImage',
        ['sketchImage', ImageControl::class],
        ['solarizeImage', ImageControl::class],
        ['sparseColorImage', ImageControl::class],
//        'sparseColorImage_bilinear',
//        'sparseColorImage_shepards',
//        'sparseColorImage_voronoi',
        ['spliceImage', ImageControl::class],
        ['spreadImage', ImageControl::class],
//'steganoImage',
//'stereoImage',
//'stripImage',
        ['swirlImage', ImageControl::class],
//'textureImage',
//'thresholdImage',
        ['thumbnailImage', ImageControl::class],
        ['tintImage',  ImageControl::class],//what is this
        ['transformImage', ImageControl::class],
//'transparentPaintImage',
        ['transposeImage', ImageControl::class],
        ['transverseImage', ImageControl::class],
        ['trimImage', ImageControl::class],
        ['uniqueImageColors', ImageControl::class],
        ['unsharpMaskImage', ImageControl::class],
//'valid',
        ['vignetteImage', ImageControl::class],
        ['waveImage', ImageControl::class],
//'whiteThresholdImage',
//'writeImage',
//'writeImageFile',
//'writeImages',
//'writeImagesFile',
    ];

    return $imagickExamples;
}



function getImagickPixelIteratorExamples() {

    $imagickPixelIteratorExamples = array(
        ['clear', null ],// => 'resetIterator',
        ['construct', null ],
        //'getCurrentIteratorRow',
        //'getIteratorRow' => 'setIteratorRow',
        ['getNextIteratorRow', null ],
        //'getPreviousIteratorRow',
        //'newPixelIterator', deprecated
        //'newPixelRegionIterator', deprecated
        ['resetIterator', null ],
        //'setIteratorFirstRow',
        //'setIteratorLastRow',
        ['setIteratorRow',null ],
        ['syncIterator', null ],// => '__construct',
    );

    return $imagickPixelIteratorExamples;
}

//TODO - get a better name
function getExampleExamples() {
    $imagickExamples = [
        ['gradientReflection', null],
        ['psychedelicFont', null],
        ['imagickComposite', null],
        ['imagickCompositeGen', null],
        ['composite', null],  // => 'composite'
    ];

    return $imagickExamples;
}

//Arctan function isn't in my current imagick.

/**
 * @return \Auryn\Provider
 */
function bootstrap() {

    $injector = new Auryn\Provider();
    $jigConfig = new Intahwebz\Jig\JigConfig(
        "../templates/",
        "../var/compile/",
        'tpl',
        \Intahwebz\Jig\JigRender::COMPILE_CHECK_MTIME
    );

    $injector->share($jigConfig);
    
    $colors = new \ImagickDemo\Colors(
        "SteelBlue2",
        'DarkSlateGrey',
        'LightCoral'
    );

    $injector->defineParam('pageTitle', "Imagick demos");
    $injector->alias(ImagickDemo\Control::class, ImagickDemo\Control\NullControl::class);
    $injector->alias(Intahwebz\Request::class, Intahwebz\Routing\HTTPRequest::class);
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

    //$injector->defineParam('imagePath', "../images/fnord.png");
    $injector->defineParam('imagePath', "../images/Skyline_400.jpg");
    $injector->defineParam('imageCachePath', "../var/cache/imageCache/");
    $injector->defineParam('activeNav', 'blah');
    $injector->share(ImagickDemo\Navigation\Nav::class);
    $injector->share($colors);
    $injector->share($injector); //yolo

    return $injector;
}

function setupImage(\Auryn\Provider $injector, $category, $example = null) {
    setupExample($injector, $category, $example, true);
    $injector->execute([\ImagickDemo\ImageExampleCache::class, 'renderImageSafe']);
    exit(0);
}

function setupExample(\Auryn\Provider $injector, $category, $example = null, $image = false) {

    $examples = [];
    
    switch ($category) {
        case ('Imagick'): {
            $examples = getImagickExamples();
            break;
        }
        case ('ImagickDraw'): {
            $examples = getImagickDrawExamples();
            break;
        }
        case ('ImagickPixel'): {
            $examples = getImagickPixelExamples();
            break;
        }
        case ('ImagickPixelIterator'): {
            $examples = getImagickPixelIteratorExamples();
            break;
        }
        case ('Example'): {
            $examples = getExampleExamples();
            break;
        }
        default: {
            throw new \Exception("Unknown catergory");
        }
    }

    $injector->defineParam('imageBaseURL', '/image/'.$category.'/'.$example);

    $nav = $injector->make(ImagickDemo\Navigation\Nav::class, [
        ':examples' => $examples,
        ':category' => $category,
        ':example' => $example
    ]);

    $nav->setupControlAndExample($injector);
}




$routesFunction = function(FastRoute\RouteCollector $r) {
    
    $categories = '{category:Imagick|ImagickDraw|ImagickPixel|ImagickPixelIterator|Example}';
    
    $r->addRoute(
        'GET',
        "/$categories",
        'setupExample'
    );

    $r->addRoute(
        'GET',
        "/$categories/{example:[a-zA-Z]+}",
        'setupExample'
    );

    $r->addRoute(
      'GET',
          "/image/$categories/{example:[a-zA-Z]+}",
          'setupImage'
    );

    $r->addRoute('GET', '/', [\ImagickDemo\Index::class, 'display']);
};


$dispatcher = FastRoute\simpleDispatcher($routesFunction);

$httpMethod = 'GET';
$uri = '/';

if(array_key_exists('REQUEST_URI', $_SERVER)){
    $uri = $_SERVER['REQUEST_URI'];
}


//$uri = "/image/Imagick/averageImages";
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

    $viewModel = $injector->make(Intahwebz\ViewModel\BasicViewModel::class);
    $jigRenderer = $injector->make(Intahwebz\Jig\JigRender::class);
    $jigRenderer->bindViewModel($viewModel);

    $viewModel->setVariable('pageTitle', "Imagick demos");
    
    $jigRenderer->renderTemplateFile('index');
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
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        echo "No route matched";
    break;
    
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
    break;
    
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars

        process($injector, $handler, $vars);

        break;
}

