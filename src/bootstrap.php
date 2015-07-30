<?php

namespace {

use ImagickDemo\Response\StandardHTTPResponse;
use ImagickDemo\Response\FileResponse;
use Intahwebz\Request;
use ImagickDemo\Response\RedirectResponse;
use Predis\Client as RedisClient;
use ImagickDemo\InjectionParams;
use Auryn\Injector;
use ImagickDemo\Tier;
use Jig\JigRender;
use Jig\JigConfig;

use ImagickDemo\Helper\PageInfo;
use ImagickDemo\Navigation\CategoryNav;

define('COMPOSER_OPCACHE_OPTIMIZE', true);
require __DIR__.'/../vendor/autoload.php';

//yolo - We use a global to allow us to do a hack to make all the code examples
//appear to use the standard 'header' function, but also capture the content type 
//of the image
$imageType = null;

function exceptionHandler(Exception $ex)
{
    //TODO - need to ob_end_clean as many times as required because
    //otherwise partial content gets sent to the client.

    if (headers_sent() == false) {
        header("HTTP/1.0 500 Internal Server Error", true, 500);
    }
    else {
        //Exception after headers sent
    }

    while ($ex) {
        echo "Exception " . get_class($ex) . ': ' . $ex->getMessage()."<br/>";

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
        $ex = $ex->getPrevious();
        if ($ex) {
            echo "Previously ";
        }
    };
}

function errorHandler($errno, $errstr, $errfile, $errline)
{
    if (error_reporting() == 0) {
        return true;
    }
    if ($errno == E_DEPRECATED) {
        //lol don't care.
        return true;
    }
    
    switch ($errno) {
        case E_CORE_ERROR:
        case E_ERROR: {
            $message =  "<b>Fatality</b> [$errno] $errstr on line $errline in file $errfile <br />\n";
            //echo "$message";
            break;
        }

        default: {
            $message =  "<b>errorHandler</b> [$errno] $errstr in file $errfile on line $errline<br />\n";
            throw new \Exception($message);
            break;
        }
    }
    
    return false;
}


function fatalErrorShutdownHandler()
{
    $level = ob_get_level();

    for ($x=0; $x<$level; $x++) {
        ob_end_flush();
    }

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

        case (E_CORE_WARNING): {
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


function getImageCacheFilename(PageInfo $pageInfo, $params)
{
    $category = $pageInfo->getCategory();
    $example = $pageInfo->getExample();
    
    $filename = "../var/cache/imageCache/".$category.'/'.$example.'/'.$example;
    if (!empty($params)) {
        $filename .= '_' . md5(json_encode($params));
    }

    return $filename;
}

function renderImgTag($url, $id = '', $extra = '')
{
    $output = sprintf(
        "<img src='%s' id='%s' class='img-responsive' %s />",
        $url,
        $id,
        $extra
    );

    return $output;
}

function createRedisSessionDriver()
{
    $redisConfig = array(
        "scheme" => "tcp",
        "host" => 'localhost',
        "port" => 6379
    );

    $redisOptions = array(
        'profile' => '2.6',
        'prefix' => 'imagickdemo:',
    );

    $redisClient = new RedisClient($redisConfig, $redisOptions);
    $redisDriver = new RedisDriver($redisClient);

    return $redisDriver;
}

function createSessionManager(RedisDriver $redisDriver)
{
    $sessionConfig = new SessionConfig(
        'SessionTest',
        3600 * 10,
        60
    );

    $sessionManager = new SessionManager(
        $sessionConfig,
        $redisDriver
    );

    return $sessionManager;
}

function prepareJigConverter(Jig\Converter\JigConverter $jigConverter, $injector)
{
    $jigConverter->addDefaultHelper('Jig\TemplateHelper\DebugHelper');
}

function createControl(CategoryNav $categoryNav, Injector $injector)
{
    list($controlClassname, $params) = $categoryNav->getDIInfo();

    foreach ($params as $name => $value) {
        $injector->defineParam($name, $value);
    }

    $control = $injector->make($controlClassname);
    $params = $control->getFullParams();
    
    foreach ($params as $name => $value) {
        $injector->defineParam($name, $value);
    }
    
    return $control;
}
    
function createExample(CategoryNav $categoryNav, Injector $injector)
{
    $exampleName = $categoryNav->getExampleName();

    return $injector->make($exampleName);
}
    
/**
 * @param $libratoKey
 * @param $libratorUsername
 * @param $statsSourceName
 * @return \Auryn\Injector
 */
function bootstrapInjector()
{
    $injector = new Auryn\Injector();

    $config = new \ImagickDemo\Config();
    $config->delegateShit($injector);

    $injector->share('Jig\JigConfig');
    $injector->share('ImagickDemo\Control');
    $injector->share('ImagickDemo\Example');
    $injector->share('ImagickDemo\Navigation\Nav');
    $injector->share('ImagickDemo\Queue\ImagickTaskQueue');
    $injector->share('ImagickDemo\Helper\PageInfo');
    $injector->share(\ImagickDemo\Config\Application::class);
    $injector->share(\ImagickDemo\Config\Librato::class);
    $injector->share('ImagickDemo\Framework\VariableMap');
    $injector->share('Predis\Client');
    
    $injector->alias('Intahwebz\Request', 'Intahwebz\Routing\HTTPRequest');
    $injector->alias('ImagickDemo\DocHelper', 'ImagickDemo\DocHelperDisplay');
    $injector->alias('ImagickDemo\Framework\VariableMap', 'ImagickDemo\Framework\RequestVariableMap');
    //$injector->alias('ImagickDemo\Banners\Banner', 'ImagickDemo\Banners\PHPStormBanner');
    $injector->alias('ImagickDemo\Banners\Banner', 'ImagickDemo\Banners\NullBanner');
    $injector->prepare('Jig\Converter\JigConverter', 'prepareJigConverter');

    if (false) {
        $injector->share('ASM\SessionManager');
        $injector->delegate('ASM\SessionManager', 'createSessionManager');
        $injector->share('ASM\Driver\RedisDriver');
        $injector->delegate('ASM\Driver\RedisDriver', 'createRedisSessionDriver');
    }

    $injector->delegate('ImagickDemo\Control', 'createControl');
    $injector->delegate('ImagickDemo\Example', 'createExample');

    $redisParameters = array(
        'connection_timeout' => 30,
        'read_write_timeout' => 30,
    );

    $redisOptions = [];

    $injector->define(
        'Predis\Client',
        array(
            ':parameters' => $redisParameters,
            ':options' => $redisOptions,
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


/**
 * @param \Auryn\Injector $injector
 * @param $routesFunction
 * @return \ImagickDemo\Response\Response|StandardHTTPResponse|null
 */
function servePage()
{
    $routesFunction = getRoutes();
    $dispatcher = \FastRoute\simpleDispatcher($routesFunction);

    $httpMethod = 'GET';
    //$uri = '/';
    $uri = '/image/Imagick/adaptiveResizeImage';

    if (array_key_exists('REQUEST_URI', $_SERVER)) {
        $uri = $_SERVER['REQUEST_URI'];
    }
    
    ///$uri = '/image/Imagick/adaptiveResizeImage';

    $path = $uri;
    $queryPosition = strpos($path, '?');
    if ($queryPosition !== false) {
        $path = substr($path, 0, $queryPosition);
    }

    $routeInfo = $dispatcher->dispatch($httpMethod, $path);

    $dispatcherResult = $routeInfo[0];
    
    if ($dispatcherResult == \FastRoute\Dispatcher::FOUND) {
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        if (array_key_exists('category', $vars)) {
            $className = sprintf('ImagickDemo\%s\functions', $vars['category']);
            $className::load();
        }

        $params = InjectionParams::fromParams($vars);

        return new Tier($handler, $params);
    }
    else if ($dispatcherResult == \FastRoute\Dispatcher::NOT_FOUND) {
        return new StandardHTTPResponse(404, $uri, "Route not found");
    }
    
    //TODO - need to embed allowedMethods....theoretically.
    // $allowedMethods = $routeInfo[1];
    // ... 405 Method Not Allowed
    return new StandardHTTPResponse(405, $uri, "Not allowed");
}


/**
 * @param $filename
 * @return FileResponse|null
 */
function createFileResponseIfFileExists($filename)
{
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
 * @param \Imagick $imagick
 * @param int $graphWidth
 * @param int $graphHeight
 */
function analyzeImage(\Imagick $imagick, $graphWidth = 255, $graphHeight = 127)
{
    $sampleHeight = 20;
    $border = 2;

    $imagick->transposeImage();
    $imagick->scaleImage($graphWidth, $sampleHeight);

    $imageIterator = new \ImagickPixelIterator($imagick);

    $luminosityArray = [];

    foreach ($imageIterator as $row => $pixels) { /* Loop through pixel rows */
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
}

function getPanelStart($smaller, $extraClass = '', $style = '')
{
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

function getPanelEnd()
{
    return "</div></div>";
}

function getImageURL($activeCategory, $activeExample)
{
    return '/image/'.$activeCategory.'/'.$activeExample;
}

function getCustomImageURL($activeCategory, $activeExample)
{
    return '/customImage/'.$activeCategory.'/'.$activeExample;
}

function getImageStatusURL($activeCategory, $activeExample)
{
    return '/imageStatus/'.$activeCategory.'/'.$activeExample;
}

function getKnownExtensions()
{
    return ['gif', 'jpg', 'png', 'webp'];
}


function getRoutes()
{
    $routesFunction = function (\FastRoute\RouteCollector $r) {

        $categories = '{category:Imagick|ImagickDraw|ImagickPixel|ImagickPixelIterator|ImagickKernel|Tutorial}';

        //Category indices
        $r->addRoute(
            'GET',
            "/$categories",
            [\ImagickDemo\Controller\Page::class, 'renderCategoryIndex']
        );

        //Category + example
        $r->addRoute(
            'GET',
            "/$categories/{example:[a-zA-Z]+}",
            [\ImagickDemo\Controller\Page::class, 'renderExamplePage']
        );

        //Images
        $r->addRoute(
            'GET',
            "/imageStatus/$categories/{example:[a-zA-Z]+}",
            [\ImagickDemo\Controller\Image::class, 'getImageJobStatus']
        );

        $imageController = [\ImagickDemo\Controller\Image::class, 'getImageResponse'];
        $customImageController = [\ImagickDemo\Controller\Image::class, 'getCustomImageResponse'];

        //Images
        $r->addRoute(
            'GET',
            "/image/$categories/{example:[a-zA-Z]+}",
            $imageController
        );

        //Custom images
        $r->addRoute(
            'GET',
            "/customImage/$categories/{example:[a-zA-Z]*}",
            $customImageController
        );

        $r->addRoute('GET', '/info', [\ImagickDemo\Controller\ServerInfo::class, 'createResponse']);
        $r->addRoute('GET', '/queueinfo', [\ImagickDemo\Controller\QueueInfo::class, 'createResponse']);
        $r->addRoute('GET', '/', [\ImagickDemo\Controller\Page::class, 'renderTitlePage']);
    };

    return $routesFunction;
}


/**
 * @param callable $imageCallable
 * @return \ImagickDemo\Response\ImageResponse
 * @throws \Exception
 */
function createImageResponse($filename, callable $imageCallable)
{
    global $imageType;
    ob_start();
    $imageCallable();

    if ($imageType == null) {
        ob_end_clean();
        throw new \Exception("imageType not set, can't cache image correctly.");
    }
    $imageData = ob_get_contents();

    ob_end_clean();
    
    return new \ImagickDemo\Response\ImageResponse($filename, "image/".$imageType, $imageData);
}

/**
 * @param $category
 * @param $example
 * @param \ImagickDemo\Control $control
 * @return mixed
 */
function getCachedImageResponse($category, $example, $params)
{
    $filename = getImageCacheFilename($category, $example, $params);

    return createFileResponseIfFileExists($filename);
};


/**
 * @param \Intahwebz\Request $request
 * @return callable|null
 */
function checkGetOriginalImage(\Intahwebz\Request $request)
{
    $original = $request->getVariable('original', false);
    if ($original) {
        //TODO - these are not cached.
        $callable = function (\Auryn\Injector $injector) {
            return $injector->execute([\ImagickDemo\Example::class, 'renderOriginalImage']);
        };

        return $callable;
    }

    return null;
}


/**
 * @param \Auryn\Injector $injector
 * @param $imageCallable
 * @param $filename
 * @return FileResponse
 * @throws \Exception
 */
function renderImageAsFileResponse(
    $imageFunction,
    $filename,
    \Auryn\Injector $injector,
    $params
) {
    $imageCallable = function () use ($imageFunction, $injector, $params) {
        return $injector->execute($imageFunction, $params);
    };

    ob_start();
    
    global $imageType;
    //$imageType = 'gif';
    
    $imageCallable();
    
    if ($imageType == null) {
        ob_end_clean();
        throw new \Exception("imageType not set, can't cache image correctly.");
    }

    $image = ob_get_contents();
    ob_end_clean();
    @mkdir(dirname($filename), 0755, true);
    $fullFilename = $filename . "." . strtolower($imageType);
    
    if (!strlen($image)) {
        throw new \Exception("Image generated was empty for $imageFunction.");
    }

    $fileWritten = @file_put_contents($fullFilename, $image);
    
    if ($fileWritten === false) {
        throw new \Exception("Failed to write file $fullFilename");
    }
    if ($fileWritten === 0) {
        throw new \Exception("Image was empty when written to $fullFilename .");
    }
    
    return new \ImagickDemo\Response\FileResponse($fullFilename, "image/" . $imageType);
}


/**
 * @param Request $request
 * @param $job
 * @return RedirectResponse
 */
function redirectWaitingTask(Request $request, $job)
{
    $job = intval($job) + 1;

    if ($job > 20) {
        //probably ought to time out at some point.
    }

    $request->getPath();
    $params = $request->getRequestParams();
    $params['job'] = $job;

    $newURL = 'http://'.$request->getHostName().$request->getPath()."?".http_build_query($params);
    $response = new RedirectResponse($newURL, 500000);

    return $response;
}

/**
 * @param $imageFunction
 * @param \Auryn\Injector $injector
 * @return \ImagickDemo\Response\ImageResponse
 * @throws \Exception
 */
function directImageFunction($filename, $imageFunction, \Auryn\Injector $injector)
{
    $imageCallable = function () use ($imageFunction, $injector) {
        try {
            return $injector->execute($imageFunction);
        }
        catch (\Exception $e) {
            echo "Exception: ".$e->getMessage();
            exit(0);
        }
    };
    
    return createImageResponse($filename, $imageCallable);
}

function renderImageURL(
    $taskQueueIsActive,
    $imgURL,
    $originalImageURL,
    $statusURL
) {
    global $cacheImages;

    $useAsyncLoading = $cacheImages && $taskQueueIsActive;
    
    $imageRender = new ImagickDemo\Helper\ImageRender(
        $useAsyncLoading,
        $imgURL,
        $originalImageURL,
        $statusURL
    );

    return $imageRender->render();
}

function renderKernelTable($matrix)
{
    $output = "<table class='infoTable'>";

    foreach ($matrix as $row) {
        $output .= "<tr>";
        foreach ($row as $cell) {
            $output .= "<td style='text-align:left'>";
            if ($cell === false) {
                $output .= "false";
            }
            else {
                $output .= round($cell, 3);
            }
            $output .= "</td>";
        }
        $output .= "</tr>";
    }

    $output .= "</table>";

    return $output;
}

function addInjectionParams(Injector $injector, InjectionParams $injectionParams)
{
    foreach ($injectionParams->getAliases() as $original => $alias) {
        $injector->alias($original, $alias);
    }
    
    foreach ($injectionParams->getShares() as $share) {
        $injector->share($share);
    }
    
    foreach ($injectionParams->getParams() as $paramName => $value) {
        $injector->defineParam($paramName, $value);
    }
    
    foreach ($injectionParams->getDelegates() as $className => $callable) {
        $injector->delegate($className, $callable);
    }
}


function getTemplatRenderCallable($templateFilename)
{
    $fn = function (JigConfig $jigConfig) use ($templateFilename) {
        $className = $jigConfig->getFullClassname($templateFilename);

        return [$className, 'render'];
    };

    return $fn;
}
    
function createTemplateResponse(Jig\JigBase $template)
{
    return new \ImagickDemo\Response\TemplateResponse($template);
}
    
function getTemplateSetupCallable($templateName)
{
    $fn = function (JigRender $jigRender) use ($templateName) {
        $className = $jigRender->getClassName($templateName);
        $jigRender->checkTemplateCompiled($templateName);
        $alias = [];
        $alias['Jig\JigBase'] = $className;
        $di = new InjectionParams([], $alias, [], []);

        return new Tier('createTemplateResponse', $di);
    };

    return $fn;
}

}//namespace end

namespace ImagickDemo {
    
    /**
     * Hack the header function to allow us to capture the image type,
     * while still having clean example code.
     *
     * @param $string
     * @param bool $replace
     * @param null $http_response_code
     */
    function header($string, $replace = true, $http_response_code = null)
    {
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
