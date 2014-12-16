<?php

namespace {

    use ImagickDemo\Response\StandardHTTPResponse;
    use ImagickDemo\Response\FileResponse;

    require __DIR__.'/../vendor/autoload.php';
    
    //yolo - We use a global to allow us to do a hack to make all the code examples
    //appear to use the standard 'header' function, but also capture the content type 
    //of the image
    $imageType = null;
    /** @var  $appConfig \ImagickDemo\Config\Application */
    $cacheImages = false;//$appConfig->getCacheImages();

    function exceptionHandler(Exception $ex) {
        //TODO - need to ob_end_clean as many times as required because 
        //otherwise partial content gets sent to the client.

        if (headers_sent() == false) {
            header("HTTP/1.0 500 Internal Server Error", true, 500);
        }
        else {
            //Exception after headers sent
        }
        echo "Exception " . get_class($ex) . ': ' . $ex->getMessage();

        foreach ($ex->getTrace() as $tracePart) {

            if (isset($tracePart['file']) && isset($tracePart['line'])) {
                echo $tracePart['file'] . " " . $tracePart['line'] . "<br/>";
            }
            else if (isset($tracePart["function"])) {
                echo $tracePart["function"] . "<br/>";
            }
            else {
                var_dump($tracePart);
            }
        }

        //TODO - format this
        //var_dump($ex->getTrace());
    }


    function errorHandler($errno, $errstr, $errfile, $errline) {
        if (!(error_reporting() & $errno)) {
            // This error code is not included in error_reporting
            return true;
        }

        switch ($errno) {
            case E_CORE_ERROR:
            case E_ERROR:
            {
                echo "<b>Fatality</b> [$errno] $errstr on line $errline in file $errfile <br />\n";
                break;
            }

            default:
                {
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
            case (E_PARSE):
            {
                // fatal error
                header("HTTP/1.0 500 Bugger bugger bugger", true, 500);
                var_dump($last_error['type'], $last_error['message'], $last_error['file'], $last_error['line']);
                exit(0);
            }

            case(E_CORE_WARNING):
            {
                //TODO - report errors properly.
                errorHandler($last_error['type'], $last_error['message'], $last_error['file'], $last_error['line']);
                break;
            }

            default:
                {
                header("HTTP/1.0 500 Unknown fatal error", true, 500);
                var_dump($last_error);
                break;
                }
        }

        return false;
    }


    function getImageCacheFilename($category, $example, $params) {
        $filename = "../var/cache/imageCache/" . $category . '/' . $example;
        if (!empty($params)) {
            $filename .= '_' . md5(json_encode($params));
        }

        return $filename;
    }

    /**
     * @param \Auryn\Provider $injector
     * @param $imageCallable
     * @param $filename
     * @return FileResponse
     * @throws \Exception
     */
    function renderImageAsFileResponse($imageCallable, $filename) {
        global $imageType;

        ob_start();

        $imageCallable();

        if ($imageType == null) {
            ob_end_clean();
            throw new \Exception("imageType not set, can't cache image correctly.");
        }

        $image = ob_get_contents();
        @mkdir(dirname($filename), 0755, true);
        $fullFilename = $filename . "." . strtolower($imageType);        
        file_put_contents($fullFilename, $image);
        ob_end_clean();

        return new \ImagickDemo\Response\FileResponse($fullFilename, "image/" . $imageType);
    }

    function renderImgTag($url, $id = '', $extra = '') {

        $output = sprintf(
            "<img src='%s' id='%s' class='img-responsive' %s />",
            $url,
            $id,
            $extra
        );

        return $output;

    }

    /**
     * @param $libratoKey
     * @param $libratorUsername
     * @param $statsSourceName
     * @return \Auryn\Provider
     */
function bootstrapInjector() {

    $injector = new Auryn\Provider();
    $jigConfig = new Jig\JigConfig(
        "../templates/",
        "../var/compile/",
        'tpl',
        //Jig\JigRender::COMPILE_CHECK_EXISTS
        //Jig\JigRender::COMPILE_CHECK_MTIME
        Jig\JigRender::COMPILE_ALWAYS
    );

    $injector->share($jigConfig);

    $injector->alias('ImagickDemo\DocHelper', 'ImagickDemo\DocHelperDisplay'); 

    $injector->defineParam('imageBaseURL', null);
    $injector->defineParam('customImageBaseURL', null);
    $injector->alias('ImagickDemo\Control', 'ImagickDemo\Control\NullControl');
    $injector->alias('ImagickDemo\Navigation\Nav', 'ImagickDemo\Navigation\NullNav');
    $injector->alias('Intahwebz\Request', 'Intahwebz\Routing\HTTPRequest');
    $injector->alias('ImagickDemo\Example', 'ImagickDemo\NullExample');
    //$injector->alias('ImagickDemo\Banners\Banner', 'ImagickDemo\Banners\PHPStormBanner');
    $injector->alias('ImagickDemo\Banners\Banner', 'ImagickDemo\Banners\NullBanner');
    $injector->share('ImagickDemo\Control');
    $injector->share('ImagickDemo\Example');
    $injector->share('ImagickDemo\Navigation\Nav');

    $injector->alias('ImagickDemo\Queue\TaskQueue', 'ImagickDemo\Queue\RedisTaskQueue');
    $injector->share('ImagickDemo\Queue\RedisTaskQueue');

    $injector->define('ImagickDemo\DocHelper', [
        ':category' => null,
        ':example' => null
    ]);

    $injector->share(\ImagickDemo\Config\Application::class);
    $injector->share(\ImagickDemo\Config\Librato::class);
    $injector->define(
         '\Stats\SimpleStats',
         [ ':statsSourceName' => "foo"]
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

    $appConfig = $injector->make('ImagickDemo\Config\Application');
    /** @var  $appConfig \ImagickDemo\Config\Application */
    
    global $cacheImages;
    $cacheImages = $appConfig->getCacheImages();

    return $injector;
}



function delegateAllTheThings(\Auryn\Provider $injector, $controlClass) {
    $params = ['a', 'adaptiveOffset', 'alpha', 'amount', 'amplitude', 'angle', 'b', 'backgroundColor', 'bestFit', 'bias', 'blackPoint', 'blackThreshold', 'blendMidpoint', 'blueShift', 'blur', 'brightness', 'canvasType', 'channel', 'clusterThreshold', 'color', 'colorElement', 'colorMatrix', 'colorSpace',  'contrast',  'contrastType', 'cropZoom', 'distortionExample', 'dither', 'endAngle', 'endX', 'endY', 'evaluateType', 'fillColor', 'filterType', 'firstTerm', 'fillModifiedColor', 'fourthTerm', 'fuzz', 'g', 'gamma', 'gradientStartColor', 'gradientEndColor', 'grayOnly', 'height', 'highThreshold', 'hue', 'image', 'imagePath', 'innerBevel', 'inverse', 'kernelMatrix', 'layerMethodType', 'length', 'lowThreshold',  'meanOffset', 'noiseType', 'numberColors', 'numberLevels', 'opacity', 'orderedPosterizeType', 'orientationType', 'originX', 'originY', 'outerBevel', 'paintType', 'posterizeType', 'quality', 'r', 'raise', 'radius', 'reduceNoise', 'rollX', 'rollY', 'roundX', 'roundY', 'saturation', 'secondTerm', 'sepia', 'shearX', 'shearY', 'sigma', 'skew', 'smoothThreshold', 'solarizeThreshold', 'startAngle', 'startX', 'startY', 'statisticType', 'strokeColor', 'swirl', 'targetColor', 'textDecoration', 'textUnderColor', 'thirdTerm', 'threshold', 'thresholdAngle', 'thresholdColor', 'translateX', 'translateY', 'treeDepth', 'unsharpThreshold', 'virtualPixelType', 'whitePoint', 'whiteThreshold', 'x', 'y', 'w20', 'width', 'h20', 'sharpening', 'midpoint', 'sigmoidalContrast',];


    foreach ($params as $param) {
        $paramGet = 'get'.ucfirst($param);
        $injector->delegateParam(
             $param,
             [$controlClass, $paramGet]
        );
    }
}



//TODO - yuck?
function setupExampleInjection(\Auryn\Provider $injector, $category, $example) {

    $injector->alias(\ImagickDemo\Navigation\Nav::class, \ImagickDemo\Navigation\CategoryNav::class);
    $injector->define(\ImagickDemo\Navigation\CategoryNav::class, [
        ':category' => $category,
        ':example' => $example
    ]);

    $categoryNav = $injector->make(\ImagickDemo\Navigation\CategoryNav::class);
    
    if (!$example) {
        $injector->alias(\ImagickDemo\Example::class, sprintf('ImagickDemo\%s\IndexExample', $category));
        return null;
    }

    $exampleDefinition = $categoryNav->getExampleDefinition($category, $example);
    $function = $exampleDefinition[0];
    $controlClass = $exampleDefinition[1];

    if (array_key_exists('defaultParams', $exampleDefinition) == true) {
        foreach ($exampleDefinition['defaultParams'] as $name => $value) {
            $defaultName = 'default' . ucfirst($name);
            $injector->defineParam($defaultName, $value);
        }
    }

    $injector->defineParam('imageBaseURL', '/image/' . $category . '/' . $example);
    $injector->defineParam('customImageBaseURL', '/customImage/' . $category . '/' . $example);
    $injector->defineParam('activeCategory', $category);
    $injector->defineParam('activeExample', $example);

    $injector->defineParam('exampleShown', $function);
    
    

    $injector->alias(\ImagickDemo\Control::class, $controlClass);
    $injector->share($controlClass);

    $injector->define(\ImagickDemo\DocHelper::class, [
        ':category' => $category,
        ':example' => $example
    ]);

    delegateAllTheThings($injector, $controlClass);
    $injector->alias(\ImagickDemo\Example::class, sprintf('ImagickDemo\%s\%s', $category, $function));

    return $function;

}


    /**
     * @param \Auryn\Provider $injector
     * @param $routesFunction
     * @return \ImagickDemo\Response\Response|StandardHTTPResponse|null
     */
    function servePage(\Auryn\Provider $injector, $routesFunction) {

        $dispatcher = \FastRoute\simpleDispatcher($routesFunction);

        $httpMethod = 'GET';
        $uri = '/';

        if (array_key_exists('REQUEST_URI', $_SERVER)) {
            $uri = $_SERVER['REQUEST_URI'];
        }

        $path = $uri;
        $queryPosition = strpos($path, '?');
        if ($queryPosition !== false) {
            $path = substr($path, 0, $queryPosition);
        }

        $routeInfo = $dispatcher->dispatch($httpMethod, $path);

        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND: {
                return new StandardHTTPResponse(404, $uri, "Not found");
            }

            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED: {
                $allowedMethods = $routeInfo[1];
                // ... 405 Method Not Allowed
                return new StandardHTTPResponse(405, $uri, "Not allowed");
            }

            case \FastRoute\Dispatcher::FOUND: {
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                //TODO - support head?
                return process($injector, $handler, $vars);
            }
        }

        return null;
    }


    /**
     * @param $filename
     * @return FileResponse|null
     */
    function createFileResponseIfFileExists($filename) {
        $extensions = ["jpg", 'jpeg', "gif", "png", ];

        foreach ($extensions as $extension) {
            $filenameWithExtension = $filename.".".$extension;
            if (file_exists($filenameWithExtension) == true) {
                //TODO - content type should actually be image/jpeg
                return new FileResponse($filenameWithExtension, "image/".$extension);
            }
        }

        return null;
    }




    /**
     * @param \Auryn\Provider $injector
     * @param $handler
     * @param $vars
     * @return \ImagickDemo\Response\Response $response;
     */
    function process(\Auryn\Provider $injector, $handler, $vars) {

        $category = null;
        $example = null;
        
        if (isset($vars['category'])) {
            $category = $vars['category'];
        }

        if (isset($vars['example'])) {
            $example = $vars['example'];
        }

        $imageCallable = null;
        
        if ($category) {
            $function = setupExampleInjection($injector, $category, $example);
            
            if ($function) {
                $exampleClassName = sprintf('ImagickDemo\%s\%s', $category, $function);
                $injector->alias(\ImagickDemo\Example::class, $exampleClassName);
                $imageCallable = 'ImagickDemo\\'.$category.'\\'.$function;
            }
            else {
                $exampleClassName = sprintf('ImagickDemo\%s\IndexExample', $category);
                $injector->alias(\ImagickDemo\Example::class, $exampleClassName);
            }

            $namespace = sprintf('ImagickDemo\%s\functions', $category);
            $namespace::load();
        }
        else {
            $injector->alias(\ImagickDemo\Example::class, \ImagickDemo\HomePageExample::class);
        }

        $request = $injector->make(\Intahwebz\Request::class);

        $original = $request->getVariable('original', false);
        if ($original) {
            $imageCallable = [
                \ImagickDemo\Example::class,
                'renderOriginalImage'
            ];
        }

        $lowried = [];
        foreach ($vars as $key => $value) {
            $lowried[':'.$key] = $value;
            $injector->defineParam($key, $value);
        }

        $imageCallable = function () use ($injector, $imageCallable, $lowried) {
            $injector->execute($imageCallable, $lowried);
        };

        $lowried[':imageCallable'] = $imageCallable;
        $response = $injector->execute($handler, $lowried);

        return $response;
    }


    /**
     * @param \Imagick $imagick
     * @param int $graphWidth
     * @param int $graphHeight
     */
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
                    $hsl = $pixel->getHSL();
                    $luminosityArray[] = ($hsl['luminosity']);
                }
            }
            /* Sync the iterator, this is important to do on each iteration */
            $imageIterator->syncIterator();
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
            $pos = ($graphHeight - 1) - ($luminosity * ($graphHeight - 1));

            if ($previous !== false) {
                /** @var $previous int */
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

        \ImagickDemo\header("Content-Type: image/png");
        echo $outputImage;

        //exit(0);
    }

    function getPanelStart($smaller, $extraClass = '', $style = '') {
        if ($smaller == true) {
            $output = "<div class='row'>
                <div class='col-md-12 visible-xs visible-sm contentPanel $extraClass'  style='$style'>";
        }
        else {
            $output = "<div class='row'>
                <div class='col-md-12 visible-md visible-lg contentPanel $extraClass'  style='$style'>";
        }

        return $output;
    }

    function getPanelEnd() {
        return "</div></div>";
    }
}

namespace ImagickDemo {
    
    /**
     * Hack the header function to allow us to capture the image type,
     * while still having clean example code.
     *
     * @param $string
     * @param bool $replace
     * @param null $http_response_code
     */
    function header($string, $replace = true, $http_response_code = null) {
        global $imageType;
        global $cacheImages;

        if (stripos($string, "Content-Type: image/") === 0) {
            $imageType = substr($string, strlen("Content-Type: image/"));
        }

        if ($cacheImages == false) {
            \header($string, $replace, $http_response_code);
        }
    }
}
