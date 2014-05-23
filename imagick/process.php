<?php

//TODO - Arctan function isn't in my current imagick.

\Intahwebz\Functions::load();

//yolo - We use a global to allow us to do a hack to make all the code examples
//appear to use the standard 'header' function, but also capture the content type 
//of the image
$imageType = null;


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
        'pingImage' => ['pingImage', \ImagickDemo\Control\ImageControl::class],
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
        'rectangle' => ['rectangle', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
        'render' => ['render', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
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
    
    
    $examples = [
        'Imagick' => $imagickExamples,
        'ImagickDraw' => $imagickDrawExamples,
    ];

    if (!isset($examples[$category][$example])) {
        throw new \Exception("Somethings fucky: example [$category][$example] doesn't exist.");
    }
    
    return $examples[$category][$example];
}

function setupImageDelegation(\Auryn\Provider $provider, $category, $example) {

    list($function, $controlClass) = getExampleDefinition($category, $example);

    $provider->share($controlClass);

    $params = ['a', 'amount', 'amplitidude', 'angle', 'b', 'backgroundColor', 'blackPoint', 'channel', 'colorElement', 'colorSpace', 'distortionExample', 'endAngle', 'endX', 'endY', 'fillColor', 'fillModifiedColor', 'g', 'height', 'image', 'imagePath', 'length', 'meanOffset', 'noise', 'originX', 'originY', 'r', 'radius', 'roundX', 'roundY', 'sigma', 'skew', 'solarizeThreshold', 'startAngle', 'startX', 'startY', 'statisticType', 'strokeColor', 'swirl', 'textDecoration', 'textUnderColor', 'translateX', 'translateY', 'unsharpThreshold', 'virtualPixel', 'whitePoint', 'x', 'y',];

    foreach ($params as $param) {
        $paramGet = 'get'.ucfirst($param);
        $provider->delegateParam(
            $param,
            [$controlClass, $paramGet]
        );
    }

    
    $namespace = sprintf('ImagickDemo\%s\functions', $category);
    $namespace::load(); 
    
//    var_dump($category);
//    var_dump($function);
//    exit(0);

    $provider->execute($function);
    exit(0);
}

//function setupImage(\Auryn\Provider $injector, $category, $example = null) {
//
//    $cache = false;
//
//    if (strlen($example) === 0) {
//        $example = null;
//    }
//
//    setupExample($injector, $category, $example, true);
//    
//    if ($cache == true) {
//        $injector->execute([\ImagickDemo\ImageExampleCache::class, 'renderImageSafe']);
//    }
//    else {
//        if (false) {
//            $injector->execute([\ImagickDemo\Example::class, 'renderImage']);
//        }
//        else {
//            $object = $injector->make(\ImagickDemo\Example::class);
//            $injector->execute([$object, 'renderImage']);
//        }
//    }
//    exit(0);
//}

function setupSubImage(\Auryn\Provider $injector, $category, $example, $subImageType) {

    $cache = false;

    if (strlen($example) === 0) {
        $example = null;
    }

    setupExample($injector, $category, $example, true);
    
    $injector->defineParam('subImageType', $subImageType);

//    if ($cache == true) {
//        $injector->execute([\ImagickDemo\ImageExampleCache::class, 'renderImageSafe']);
//    }
//    else {
        if (false) {
            $injector->execute([\ImagickDemo\Example::class, 'renderImage']);
        }
        else {
            $object = $injector->make(\ImagickDemo\Example::class);
            $injector->execute([$object, 'renderSubImage']);
        }
    //}
    exit(0);
}

function setupExampleDelegation(\Auryn\Provider $injector, $category, $example) {

    list($function, $controlClass) = getExampleDefinition($category, $example);

    $injector->defineParam('imageBaseURL', '/image/'.$category.'/'.$example);
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
//
//    $injector->defineParam('imageBaseURL', '/image/'.$category.'/'.$example);
//
//
//    $injector->alias('ImagickDemo\ExampleList', "ImagickDemo\\".$category."\\ExampleList");
//    $injector->alias(\ImagickDemo\Navigation\Nav::class, \ImagickDemo\Navigation\Nav::class);
//
//    $nav = $injector->make(ImagickDemo\Navigation\Nav::class, [
//        ':category' => $category,
//        ':example' => $example
//    ]);
//
//    $nav->setupControlAndExample($injector);
//
//    if ($image == false) {
//        renderTemplate($injector);
//    }


//    $imagickExamples = [
//        'adaptiveBlurImage' => ['adaptiveBlurImage', \ImagickDemo\Control\ControlCompositeRadiusSigmaImage::class]
//    ];
//
//    $examples = [
//        'Imagick' => $imagickExamples
//    ];

//    if (!isset($examples[$category][$example])) {
//        throw new \Exception("Somethings fucky: example [$category][$example] doesn't exist.");
//    }

//    $exampleInfo = $examples[$category][$example];

//    $function = $exampleInfo[0];
    //$controlClass = $exampleInfo[1];

    $injector->defineParam('imageBaseURL', '/image/'.$category);
    $injector->defineParam('activeCategory', $category);

//    $injector->alias(\ImagickDemo\Control::class, $controlClass);
    $injector->share(\ImagickDemo\Control::class);
    $injector->alias(ImagickDemo\ExampleList::class, "ImagickDemo\\".$category."\\ExampleList");
    $injector->alias(\ImagickDemo\Example::class, sprintf('ImagickDemo\%s\IndexExample', $category));
    
    

    $injector->alias(\ImagickDemo\Navigation\Nav::class, \ImagickDemo\Navigation\CategoryNav::class);
    $injector->define(ImagickDemo\Navigation\CategoryNav::class, [
        ':category' => $category,
        ':example' => $example
    ]);

    //$injector->share(\ImagickDemo\Example::class);
    //$injector->alias(\ImagickDemo\Example::class, sprintf('ImagickDemo\%s\%s', $category, $example));

    renderTemplate($injector);
}


//function setupExample(\Auryn\Provider $injector, $category, $example = null, $image = false) {
//
//    $validCatergories = [
//        'Imagick',
//        'ImagickDraw',
//        'ImagickPixel',
//        'ImagickPixelIterator',
//        'Example',
//    ];
//    
//    if (in_array($category, $validCatergories) == false) {
//        throw new \Exception("Category is not valid.");
//    }
//
//    $injector->defineParam('imageBaseURL', '/image/'.$category.'/'.$example);
//    
//
//    $injector->alias('ImagickDemo\ExampleList', "ImagickDemo\\".$category."\\ExampleList");
//    $injector->alias(\ImagickDemo\Navigation\Nav::class, \ImagickDemo\Navigation\CategoryNav::class);
//
//    $injector->define(ImagickDemo\Navigation\CategoryNav::class, [
//        ':category' => $category,
//        ':example' => $example
//    ]);
//
//    //$nav->setupControlAndExample($injector);
//
//    if ($image == false) {
//        renderTemplate($injector);
//    }
//}

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
          //'setupExample'
          'setupCatergoryDelegation'
    );

    //Category + example
    $r->addRoute(
        'GET',
        "/$categories/{example:[a-zA-Z]+}",
        //'setupExample'
        'setupExampleDelegation'
    );

    //Images
    $r->addRoute(
      'GET',
          "/image/$categories/{example:[a-zA-Z]+}",
          //'setupImage'
          'setupImageDelegation'
    );

    $r->addRoute(
      'GET',
          "/subimage/$categories/{example:[a-zA-Z]*}/{subImageType:[a-zA-Z]*}",
          'setupSubImage'
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

// $uri = '/image/Imagick/raiseImage?image=Lorikeet';
//$uri = '/Imagick/subImageMatch?image=Lorikeet';

//$uri = '/image/Imagick/adaptiveBlurImage?radius=5&sigma=1&image=Lorikeet';

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
        echo "No route matched";
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