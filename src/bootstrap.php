<?php


//yolo - We use a global to allow us to do a hack to make all the code examples
//appear to use the standard 'header' function, but also capture the content type 
//of the image
$imageType = null;
$imageCache = false;


function getImageCacheFilename($category, $example, $params) {
    $filename = "../var/cache/imageCache/".$category.'/'.$example;
    if (!empty($params)) {
        $filename .= '_'.md5(json_encode($params));
    }

    return $filename;
}


function createAndCacheFile(\Auryn\Provider $injector, $functionFullname, $filename) {

    global $imageType;
    ob_start();

    $injector->execute($functionFullname);

    if ($imageType == null) {
        throw new \Exception("imageType not set, can't cache image correctly.");
    }

    $image = ob_get_contents();
    @mkdir(dirname ($filename), 0755, true);
    //TODO - is this atomic?
    file_put_contents($filename.".".strtolower($imageType), $image);
    //ob_end_flush();
    ob_end_clean();

    return $image;
}


/**
 * @return \Auryn\Provider
 */
function bootstrapInjector() {

    require '../../imagick-demos.conf.php';
    
    
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
    //TODO - move these elsewhere or delete
    $injector->defineParam('standardImageWidth', 500);
    $injector->defineParam('standardImagHeight', 500);
    $injector->defineParam('smallImageWidth', 350);
    $injector->defineParam('smallImageHeight', 300);

    $injector->alias('ImagickDemo\Control', 'ImagickDemo\Control\NullControl');
    $injector->alias('ImagickDemo\Navigation\Nav', 'ImagickDemo\Navigation\NullNav');
    $injector->alias('Intahwebz\Request', 'Intahwebz\Routing\HTTPRequest');
    $injector->alias('ImagickDemo\Example', 'ImagickDemo\NullExample');
    //$injector->alias('ImagickDemo\Banners\Banner', 'ImagickDemo\Banners\PHPStormBanner');
    $injector->alias('ImagickDemo\Banners\Banner', 'ImagickDemo\Banners\NullBanner');
    $injector->share('ImagickDemo\Control');
    $injector->share('ImagickDemo\Example');
    $injector->share('ImagickDemo\Navigation\Nav');

    $injector->define('ImagickDemo\DocHelper', [
        ':category' => null,
        ':example' => null
    ]);

    
    $injector->define(
        'Stats\Librato',
        [
            ':libratoKey' => $libratoKey,
            ':libratoUsername' => $libratorUsername
        ]
    );

    
    $injector->define(
         'Stats\AsyncStats',
         [ ':statsSourceName' => $statsSourceName]
    );

    
    $injector->define(
         '\Stats\SimpleStats',
         [ ':statsSourceName' => $statsSourceName]
    );

    $redisParameters = array(
        'connection_timeout' => 30,
        'read_write_timeout' => 30,
    );

    $redisOptions = [];

    //This next line annoys phpstorm
    $injector->define(
             'Predis\Client',
                 array(
                     ':parameters' => $redisParameters,
                     ':options' => $redisOptions,
                 )
    );

    $injector->share('Predis\Client');
    $injector->share($injector);


    $injector->define(
             'Intahwebz\Routing\HTTPRequest',
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



function delegateAllTheThings(\Auryn\Provider $injector, $controlClass) {
    $params = ['a', 'adaptiveOffset', 'alpha', 'amount', 'amplitude', 'angle', 'b', 'backgroundColor', 'bestFit', 'blackPoint', 'blueShift', 'brightness', 'canvasType', 'channel', 'clusterThreshold', 'color', 'colorElement', 'colorSpace',  'contrast',  'contrastType', 'distortionExample', 'dither', 'endAngle', 'endX', 'endY', 'evaluateType', 'fillColor', 'firstTerm', 'fillModifiedColor', 'fourthTerm', 'fuzz', 'g', 'gamma', 'gradientStartColor', 'gradientEndColor', 'grayOnly', 'height', 'highThreshold', 'hue', 'image', 'imagePath', 'innerBevel', 'layerMethodType', 'length', 'lowThreshold',  'meanOffset', 'noiseType', 'numberColors', 'opacity', 'originX', 'originY', 'outerBevel', 'paintType', 'r', 'raise', 'radius', 'reduceNoise', 'rollX', 'rollY', 'roundX', 'roundY', 'saturation', 'secondTerm', 'sepia', 'shearX', 'shearY', 'sigma', 'skew', 'smoothThreshold', 'solarizeThreshold', 'startAngle', 'startX', 'startY', 'statisticType', 'strokeColor', 'swirl', 'textDecoration', 'textUnderColor', 'thirdTerm', 'threshold', 'thresholdAngle', 'thresholdColor', 'translateX', 'translateY', 'treeDepth', 'unsharpThreshold', 'virtualPixelType', 'whitePoint', 'x', 'y', 'w20', 'width', 'h20', 'sharpening', 'midpoint', 'sigmoidalContrast',];


    foreach ($params as $param) {
        $paramGet = 'get'.ucfirst($param);
        $injector->delegateParam(
             $param,
             [$controlClass, $paramGet]
        );
    }
}