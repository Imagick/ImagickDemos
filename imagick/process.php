<?php

//TODO - Arctan function isn't in my current imagick.

use ImagickDemo\Navigation\NavOption;

\Intahwebz\Functions::load();

//yolo - We use a global to allow us to do a hack to make all the code examples
//appear to use the standard 'header' function, but also capture the content type 
//of the image
$imageType = null;


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
        new NavOption( 'pop' ,true, 'push' ), //=> 'push'
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
        //'annotateImage',
        //'appendImages',
        //new NavOption('averageImages',  true),
        new NavOption('blackThresholdImage',  true),
        new NavOption('blurImage',  true),
        new NavOption('borderImage', true),
        new NavOption('charcoalImage', true),
        new NavOption('chopImage', true),
        //'clear',
        //new NavOption('clipImage', true),
        //'clipPathImage',
        new NavOption('clutImage', true),
        //'coalesceImages',
        new NavOption('colorFloodfillImage', true),
        new NavOption('colorizeImage', true),
        //'combineImages',
        //'commentImage',
        //'compareImageChannels',
        //'compareImageLayers',
        //'compareImages',
        //'compositeImage',
        //__construct',
        new NavOption('contrastImage', true),
        //'contrastStretchImage',
        new NavOption('convolveImage', true),
        new NavOption('cropImage', true),
        //'cropThumbnailImage',
        //'current',
        //'cycleColormapImage',
        //'decipherImage',
        //'deconstructImages',
        //'deleteImageArtifact',
        new NavOption('deskewImage', true),
        new NavOption('despeckleImage', true),
        //'destroy',
        //'displayImage',
        //'displayImages',
        //'distortImage',
        //'drawImage',
        //'edgeImage',
        //'embossImage',
        //'encipherImage',
        new NavOption('edgeExtend', true),
        new NavOption('enhanceImage', true),
        new NavOption('equalizeImage', true),
        //'evaluateImage',
        //'exportImagePixels',
        //'extentImage',
        //'flattenImages',
        new NavOption('flipImage', true),
        //'floodFillPaintImage',
        new NavOption('flopImage', true),
        //'frameImage',
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
        //'mosaicImages',
        new NavOption('motionBlurImage', true),
        new NavOption('negateImage', true),
        //'newImage',
        new NavOption('newPseudoImage', true),
        //'nextImage',
        new NavOption('normalizeImage', true),
        new NavOption('oilPaintImage', true),
        //'opaquePaintImage',
        //'optimizeImageLayers',
        //'orderedPosterizeImage',
        //'paintFloodfillImage',
        //'paintOpaqueImage',
        //'paintTransparentImage',
        new NavOption('pingImage', false),
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
        new NavOption('radialBlurImage', true),
        //'raiseImage',
        //'randomThresholdImage',
        //'readImage',
        //'readImageBlob',
        //'readImageFile',
        new NavOption('recolorImage', true),
        //'reduceNoiseImage',
        //new NavOption('remapImage', true),
        //'removeImage',
        //'removeImageProfile',
        //'render',
        new NavOption('resampleImage', true),
        //'resetImagePage',
        //'resizeImage',
        //'rollImage',
        new NavOption('rotateImage', true),
        //'roundCorners',
        //'sampleImage',
        new NavOption('scaleImage', true),
        new NavOption('screenEmbed', true),
        new NavOption('segmentImage', true),
        //'separateImageChannel',
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
        //'sigmoidalContrastImage',
        new NavOption('sketchImage', true),
        new NavOption('solarizeImage', true),
        new NavOption('sparseColorImage', true),
        new NavOption('spliceImage', true),
        new NavOption('spreadImage', true),
        //'steganoImage',
        //'stereoImage',
        //'stripImage',
        new NavOption('swirlImage', true),
        new NavOption('textureImage',  true),
        //'thresholdImage',
        new NavOption('thumbnailImage', true),
        new NavOption('tintImage',  true),//what is this
        new NavOption('transformImage', true),
        new NavOption('transparentPaintImage', true),
        new NavOption('transposeImage', true),
        new NavOption('transverseImage', true),
        new NavOption('trimImage', true),
        new NavOption('uniqueImageColors', true),
        new NavOption('unsharpMaskImage', true),
//'valid',
        new NavOption('vignetteImage', true),
        new NavOption('waveImage', true),
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

//TODO - get a better name
function getExampleExamples() {
    $imagickExamples = [
        new NavOption('gradientReflection',  true),
        new NavOption('psychedelicFont', true),
        new NavOption('psychedelicFontGif', true),
        new NavOption('imagickComposite', true),
        new NavOption('imagickCompositeGen', true),
        new NavOption('composite', true),
    ];

    return $imagickExamples;
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
        \Intahwebz\Jig\JigRender::COMPILE_CHECK_MTIME
    );

    $injector->share($jigConfig);

    $injector->defineParam('imageBaseURL', null);
    $injector->defineParam('pageTitle', "Imagick demos");

    $injector->alias(\ImagickDemo\Example::class, \ImagickDemo\NullExample::class);
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

    $injector->defineParam('imageCachePath', "../var/cache/imageCache/");
    $injector->defineParam('activeNav', null);
    $injector->share(ImagickDemo\Navigation\Nav::class);
    $injector->alias(\ImagickDemo\Navigation\ActiveNav::class, \ImagickDemo\Navigation\DefaultNav::class);
    $injector->share($injector); //yolo - use injector as service locator

    return $injector;
}

function setupImage(\Auryn\Provider $injector, $category, $example = null) {
    setupExample($injector, $category, $example, true);

    $cache = false;

    if ($cache == true) {
        $injector->execute([\ImagickDemo\ImageExampleCache::class, 'renderImageSafe']);
    }
    else {
        if (false) {
            $injector->execute([\ImagickDemo\Example::class, 'renderImage']);
        }
        else {
            $object = $injector->make(\ImagickDemo\Example::class);
            $injector->execute([$object, 'renderImage']);
        }
    }
    exit(0);
}



function setupHelp(\Auryn\Provider $injector, $category, $example = null) {
    setupExample($injector, $category, $example, true);

    if ($example == null) {
        echo "Example not set, cannot generate help.";
        return;
    }
    echo "Do something";


    $examples = getExamples($category, $example);
    
    foreach ($examples as $title => $example) {
        echo "<h2>$title</h2>";
        echo nl2br($example);
    }
    
}

/**
 * @param $category
 * @param $example
 * @return array
 */
function getExamples($category, $example) {

    $result = array();
    
    $filename = "../src/ImagickDemo/$category/$example.php";
    
    $contents = @file_get_contents($filename);

    if ($contents) {
        $currentPosition = 0;
        $finished = false;
        
        while($finished == false) {
            
            $nextExampleStart = strpos($contents, '//Example ', $currentPosition);
            
            if (!$nextExampleStart) {
                break;
            }
            
            $endOfLine = strpos($contents, "\n", $nextExampleStart);
            
            if (!$endOfLine) {
                echo "Failed to read example title";
                return [];
            }

            $titleStart = $nextExampleStart + strlen('//Example ');
            
            $exampleTitle = substr($contents, $titleStart, $endOfLine - $titleStart);

            $exampleEnd = strpos($contents, '//ExampleEnd', $endOfLine);
            
            if (!$exampleEnd) {
                break;
            }

            $exampleText = substr($contents, $endOfLine + 1, $exampleEnd - ($endOfLine + 1));
            $result[$exampleTitle] = $exampleText;
            $currentPosition = $exampleEnd + strlen('//ExampleEnd');
        }
    }
    
    return $result;
}



function setupExample(\Auryn\Provider $injector, $category, $example = null, $image = false) {

    $injector->defineParam('imageBaseURL', '/image/'.$category.'/'.$example);

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

    $injector->alias(\ImagickDemo\Navigation\ActiveNav::class, \ImagickDemo\Navigation\Nav::class);

    $nav = $injector->make(ImagickDemo\Navigation\Nav::class, [
        ':examples' => $examples,
        ':category' => $category,
        ':example' => $example
    ]);

    $nav->setupControlAndExample($injector);

    if ($image == false) {
        renderTemplate($injector);
    }
}

function renderTemplate(\Auryn\Provider $injector) {
    $viewModel = $injector->make(Intahwebz\ViewModel\BasicViewModel::class);
    $jigRenderer = $injector->make(Intahwebz\Jig\JigRender::class);
    $jigRenderer->bindViewModel($viewModel);
    $viewModel->setVariable('pageTitle', "Imagick demos");
    $jigRenderer->renderTemplateFile('index');
}


function setupRootIndex(\Auryn\Provider $injector) {
    renderTemplate($injector);
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

//$uri = '/image/Imagick/setProgressMonitor?image=Skyline';

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

