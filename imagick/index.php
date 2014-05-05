<?php


if (defined('LOW_MEM_CLASS_LOADER') && LOW_MEM_CLASS_LOADER == true) {
    require_once('../vendor/intahwebz/lowmemoryclassloader/LowMemoryClassloader.php');
}
else {
    require_once('../vendor/autoload.php');
}

use ImagickDemo\Control\ColorControl;
use ImagickDemo\Control\ImageControl;
use ImagickDemo\Navigation\NavOption;

\Intahwebz\Functions::load();

//yolo - We use a global to allow us to do a hack to make all the code examples
//appear to use the standard 'header' function, but also capture the content type 
//of the image
$imageType = null;


function getImagickDrawExamples() {

    $imagickDrawExamples = array(
        new NavOption('affine', ColorControl::class, true ),
        //[ 'annotation',  ColorControl::class ], //=> 'setFontSize',
        new NavOption( 'arc', ColorControl::class, true ),
        new NavOption( 'bezier', ColorControl::class, true ),
        new NavOption( 'circle', ColorControl::class, true ),
        //'clear',
        //'color',
        //'comment',
        new NavOption( 'composite', ColorControl::class, true ),
        //'destroy',
        new NavOption( 'ellipse',ColorControl::class, true ),
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
        new NavOption( 'line', ColorControl::class, true ),
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
        new NavOption( 'pathStart',ColorControl::class, true ),
        new NavOption( 'point',ColorControl::class, true ),
        new NavOption( 'polygon',ColorControl::class, true ),
        new NavOption( 'polyline',ColorControl::class, true ),
        new NavOption( 'pop' ,ColorControl::class, true, 'push' ), //=> 'push'
        new NavOption( 'popClipPath' ,ColorControl::class, true, 'setClipPath' ), //=> 'setClipPath'
        //'popDefs', DrawPushDefs() indicates that commands up to a terminating DrawPopDefs() command create named elements (e.g. clip-paths, textures, etc.) which may safely be processed earlier for the sake of efficiency.
        new NavOption( 'popPattern' ,ColorControl::class, true, 'pushPattern' ), //=> 'pushPattern'
        new NavOption( 'push',ColorControl::class, true ),
        new NavOption( 'pushClipPath' ,ColorControl::class, true, 'setClipPath' ), //=> 'setClipPath'
        // 'pushDefs', DrawPushDefs() indicates that commands up to a terminating DrawPopDefs() command create named elements (e.g. clip-paths, textures, etc.) which may safely be processed earlier for the sake of efficiency.
        new NavOption( 'pushPattern', ColorControl::class, true),
        new NavOption( 'rectangle',ColorControl::class, true ),
        //'render', no idea what this does
        new NavOption( 'rotate',ColorControl::class, true ),
        new NavOption( 'roundRectangle',ColorControl::class, true ),
        new NavOption( 'scale',ColorControl::class, true ),
        new NavOption( 'setClipPath',ColorControl::class, true ),
        new NavOption( 'setClipRule',ColorControl::class, true ),
        new NavOption( 'setClipUnits',ColorControl::class, true ),
        new NavOption( 'setFillAlpha',ColorControl::class, true ),
        new NavOption( 'setFillColor',ColorControl::class, true ),
        new NavOption( 'setFillOpacity',ColorControl::class, true ),
        //new NavOption( 'setFillPatternURL' ,ColorControl::class, true ), //=> 'pushPattern'
        new NavOption( 'setFillRule',ColorControl::class, true ),
        new NavOption( 'setFont',ColorControl::class, true ),
        //'setFontFamily',
        new NavOption( 'setFontSize',ColorControl::class, true ),
        //'setFontStretch', Does nothing?
        new NavOption( 'setFontStyle',ColorControl::class, true ),
        new NavOption( 'setFontWeight',ColorControl::class, true ),
        new NavOption( 'setGravity',ColorControl::class, true ),
        new NavOption( 'setStrokeAlpha',ColorControl::class, true ),
        new NavOption( 'setStrokeAntialias',ColorControl::class, true ),
        new NavOption( 'setStrokeColor',ColorControl::class, true ),
        new NavOption( 'setStrokeDashArray',ColorControl::class, true ),
        new NavOption( 'setStrokeDashOffset',ColorControl::class, true ),
        new NavOption( 'setStrokeLineCap',ColorControl::class, true ),
        new NavOption( 'setStrokeLineJoin',ColorControl::class, true ),
        new NavOption( 'setStrokeMiterLimit',ColorControl::class, true ),
        new NavOption( 'setStrokeOpacity',ColorControl::class, true ),
        //'setStrokePatternURL',
        new NavOption( 'setStrokeWidth',ColorControl::class, true ),
        new NavOption( 'setTextAlignment',ColorControl::class, true ),
        new NavOption( 'setTextAntialias',ColorControl::class, true ),
        new NavOption( 'setTextDecoration',ColorControl::class, true ),
        //'setTextEncoding',
        new NavOption( 'setTextUnderColor',ColorControl::class, true ),
        new NavOption( 'setVectorGraphics', ColorControl::class, true ),// seems broken
        // 'setViewbox', no idea what this does
        new NavOption( 'skewX',ColorControl::class, true ),
        new NavOption( 'skewY',ColorControl::class, true ),
        new NavOption( 'translate',ColorControl::class, true ),
    );

    return $imagickDrawExamples;
}


function getImagickPixelExamples() {
     $imagePixelExamples = array(
        new NavOption('construct', null, true),
        //'ImagickPixel.clear', 
        new NavOption('getColor',  null, true),// (new NavOption( bool $normalized = false ) )
        new NavOption('getColorAsString', null, true),// ( void )
        //No idea    'ImagickPixel.getColorCount',// ( void )
        new NavOption('getColorValue', null, true),// ( int $color )
        new NavOption('getColorValueQuantum', null, true),// ( int $color )
        new NavOption('getHSL', null, true),// ( void )
        new NavOption('isSimilar', null, false),// ( ImagickPixel $color , float $fuzz )
        new NavOption('setColor', null, true),// ( string $color )
        new NavOption('setColorValue', null, true),// ( int $color , float $value )
        new NavOption('setColorValueQuantum', null, true),// ( int $color , float $value )
        new NavOption('setHSL',  null, false),// ( float $hue , float $saturation , float $luminosity )
    );

    return $imagePixelExamples;
}

function getImagickExamples() {

    $imagickExamples = [

        new NavOption('adaptiveBlurImage', ImageControl::class, true),
        new NavOption('adaptiveResizeImage', ImageControl::class, true),
        new NavOption('adaptiveSharpenImage', ImageControl::class, true),
        new NavOption('adaptiveThresholdImage',  ImageControl::class, true),
//'addImage',
        new NavOption('addNoiseImage',  ImageControl::class, true),
        new NavOption('affineTransformImage',  ImageControl::class, true), //Doesn't work?
//'animateImages',
//'annotateImage',
//'appendImages',
        new NavOption('averageImages',  ImageControl::class, true),
        new NavOption('blackThresholdImage',  ImageControl::class, true),
        new NavOption('blurImage',  ImageControl::class, true),
        new NavOption('borderImage', ImageControl::class, true),
        new NavOption('charcoalImage', ImageControl::class, true),
        new NavOption('chopImage', ImageControl::class, true),
//'clear',
        new NavOption('clipImage', ImageControl::class, true),
//'clipPathImage',
        new NavOption('clutImage', ImageControl::class, true),
//'coalesceImages',
        new NavOption('colorFloodfillImage', ImageControl::class, true),
        new NavOption('colorizeImage', ImageControl::class, true),
//'combineImages',
//'commentImage',
//'compareImageChannels',
//'compareImageLayers',
//'compareImages',
//'compositeImage',
//__construct',
        new NavOption('contrastImage', ImageControl::class, true),
//'contrastStretchImage',
        new NavOption('convolveImage', ImageControl::class, true),
        new NavOption('cropImage', ImageControl::class, true),
//'cropThumbnailImage',
//'current',
//'cycleColormapImage',
//'decipherImage',
//'deconstructImages',
//'deleteImageArtifact',
        new NavOption('deskewImage', ImageControl::class, true),
        new NavOption('despeckleImage', ImageControl::class, true),
//'destroy',
//'displayImage',
//'displayImages',
//'distortImage',
//'drawImage',
//'edgeImage',
//'embossImage',
//'encipherImage',
        new NavOption('edgeExtend', ImageControl::class, true),
        new NavOption('enhanceImage', ImageControl::class, true),
        new NavOption('equalizeImage', ImageControl::class, true),
//'evaluateImage',
//'exportImagePixels',
//'extentImage',
//'flattenImages',
        new NavOption('flipImage', ImageControl::class, true),
//'floodFillPaintImage',
        new NavOption('flopImage', ImageControl::class, true),
//'frameImage',
        new NavOption('functionImage', ImageControl::class, true),
        new NavOption('fxImage', ImageControl::class, true),
        new NavOption('gammaImage', ImageControl::class, true),
        new NavOption('gaussianBlurImage', ImageControl::class, true),
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
        new NavOption('getImageChannelStatistics', ImageControl::class, true),
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
        new NavOption('getImageHistogram', ImageControl::class, true),
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
        new NavOption('getPixelIterator', ImageControl::class, true),
        new NavOption('getPixelRegionIterator', ImageControl::class, true),
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
        new NavOption('identifyImage', ImageControl::class, true),
//'implodeImage',
//'importImagePixels',
//'labelImage',
//'levelImage',
//'linearStretchImage',
//'liquidRescaleImage',
        new NavOption('magnifyImage', ImageControl::class, true),
//'mapImage',
//'matteFloodfillImage',
//'medianFilterImage',
//'mergeImageLayers',
//'minifyImage',
        new NavOption('modulateImage', ImageControl::class, true),
//'montageImage',
//'morphImages',
//'mosaicImages',
        new NavOption('motionBlurImage', ImageControl::class, true),
        new NavOption('negateImage', ImageControl::class, true),
//'newImage',
        new NavOption('newPseudoImage', ImageControl::class, true),
//'nextImage',
        new NavOption('normalizeImage', ImageControl::class, true),
        new NavOption('oilPaintImage', ImageControl::class, true),
//'opaquePaintImage',
//'optimizeImageLayers',
//'orderedPosterizeImage',
//'paintFloodfillImage',
//'paintOpaqueImage',
//'paintTransparentImage',
        new NavOption('pingImage', ImageControl::class, false),
        new NavOption('Quantum', null, false),
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
        new NavOption('radialBlurImage', ImageControl::class, true),
//'raiseImage',
//'randomThresholdImage',
//'readImage',
//'readImageBlob',
//'readImageFile',
        new NavOption('recolorImage', ImageControl::class, true),
//'reduceNoiseImage',
        new NavOption('remapImage', ImageControl::class, true),
//'removeImage',
//'removeImageProfile',
//'render',
        new NavOption('resampleImage', ImageControl::class, true),
//'resetImagePage',
//'resizeImage',
//'rollImage',
        new NavOption('rotateImage', ImageControl::class, true),
//'roundCorners',
//'sampleImage',
        new NavOption('scaleImage', ImageControl::class, true),
        new NavOption('screenEmbed', ImageControl::class, true),
        new NavOption('segmentImage', ImageControl::class, true),
//'separateImageChannel',
        new NavOption('sepiaToneImage', ImageControl::class, true),
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
        new NavOption('setImageArtifact', ImageControl::class, true),
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
        new NavOption('setImageDelay', ImageControl::class, true),
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

        new NavOption('setImageTicksPerSecond', ImageControl::class, true),
//'setImageType',
//'setImageUnits',
//'setImageVirtualPixelMethod',
//'setImageWhitePoint',
//'setInterlaceScheme',
//'setIteratorIndex',
//'setLastIterator',
        new NavOption('setOption', ImageControl::class, true),
//'setPage',
//'setPointSize',
//'setResolution',
//'setResourceLimit',
//'setSamplingFactors',
//'setSize',
//'setSizeOffset',
//'setType',
        new NavOption('shadeImage', ImageControl::class, true),
        new NavOption('shadowImage', ImageControl::class, true),
        new NavOption('sharpenImage', ImageControl::class, true),
        new NavOption('shaveImage', ImageControl::class, true),
        new NavOption('shearImage', ImageControl::class, true),
//'sigmoidalContrastImage',
        new NavOption('sketchImage', ImageControl::class, true),
        new NavOption('solarizeImage', ImageControl::class, true),
        new NavOption('sparseColorImage', ImageControl::class, true),
//        'sparseColorImage_bilinear',
//        'sparseColorImage_shepards',
//        'sparseColorImage_voronoi',
        new NavOption('spliceImage', ImageControl::class, true),
        new NavOption('spreadImage', ImageControl::class, true),
//'steganoImage',
//'stereoImage',
//'stripImage',
        new NavOption('swirlImage', ImageControl::class, true),
//'textureImage',
//'thresholdImage',
        new NavOption('thumbnailImage', ImageControl::class, true),
        new NavOption('tintImage',  ImageControl::class, true),//what is this
        new NavOption('transformImage', ImageControl::class, true),
//'transparentPaintImage',
        new NavOption('transposeImage', ImageControl::class, true),
        new NavOption('transverseImage', ImageControl::class, true),
        new NavOption('trimImage', ImageControl::class, true),
        new NavOption('uniqueImageColors', ImageControl::class, true),
        new NavOption('unsharpMaskImage', ImageControl::class, true),
//'valid',
        new NavOption('vignetteImage', ImageControl::class, true),
        new NavOption('waveImage', ImageControl::class, true),
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
        new NavOption('clear', null, true ),// => 'resetIterator',
        new NavOption('construct', null, true ),
        //'getCurrentIteratorRow',
        //'getIteratorRow' => 'setIteratorRow',
        new NavOption('getNextIteratorRow', null, true ),
        //'getPreviousIteratorRow',
        //'newPixelIterator', deprecated
        //'newPixelRegionIterator', deprecated
        new NavOption('resetIterator', null, true ),
        //'setIteratorFirstRow',
        //'setIteratorLastRow',
        new NavOption('setIteratorRow', null, true ),
        new NavOption('syncIterator', null, true),// => '__construct',
    );

    return $imagickPixelIteratorExamples;
}

//TODO - get a better name
function getExampleExamples() {
    $imagickExamples = [
        new NavOption('gradientReflection', null, true),
        new NavOption('psychedelicFont', null, true),
        new NavOption('imagickComposite', null, true),
        new NavOption('imagickCompositeGen', null, true),
        new NavOption('composite', null, true),  // => 'composite'
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
//    $injector->defineParam('imagePath', "../images/Skyline_400.jpg");
//    $injector->defineParam('imageCachePath', "../var/cache/imageCache/");
    $injector->defineParam('activeNav', null);
    $injector->share(ImagickDemo\Navigation\Nav::class);
    $injector->alias(\ImagickDemo\Navigation\ActiveNav::class, \ImagickDemo\Navigation\DefaultNav::class);
    $injector->share($colors);
    $injector->share($injector); //yolo

    return $injector;
}

function setupImage(\Auryn\Provider $injector, $category, $example = null) {
    setupExample($injector, $category, $example, true);

    //        $injector->execute([\ImagickDemo\ImageExampleCache::class, 'renderImageSafe']);
    
    if (false) {
        $injector->execute([\ImagickDemo\Example::class, 'renderImage']);
    }
    else {
        $object = $injector->make(\ImagickDemo\Example::class);
        $injector->execute([$object, 'renderImage']);
    }
//    
    exit(0);
}

function setupExample(\Auryn\Provider $injector, $category, $example = null, $image = false) {

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
    $injector->alias(\ImagickDemo\Navigation\ActiveNav::class, \ImagickDemo\Navigation\Nav::class);
    
    $nav = $injector->make(ImagickDemo\Navigation\Nav::class, [
        ':examples' => $examples,
        ':category' => $category,
        ':example' => $example
    ]);

    $nav->setupControlAndExample($injector);
}


function setupRootIndex(\Auryn\Provider $injector) {
    //Nothing to do?
}

$routesFunction = function(FastRoute\RouteCollector $r) {
    
    $categories = '{category:Imagick|ImagickDraw|ImagickPixel|ImagickPixelIterator|Example}';
    
    //Category indices
    $r->addRoute(
        'GET',
        "/$categories",
        'setupExample'
    );

    //Category + example
    $r->addRoute(
        'GET',
        "/$categories/{example:[a-zA-Z]+}",
        'setupExample'
    );

    //Images
    $r->addRoute(
      'GET',
          "/image/$categories/{example:[a-zA-Z]+}",
          'setupImage'
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

function myBad( Exception $ex ) {
    header("HTTP/1.0 500 Internal Server Error", true, 500);
    echo $ex->getMessage();
}

set_exception_handler('myBad');

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        header("HTTP/1.0 404 Not Found", true, 404);
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

