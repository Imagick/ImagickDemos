<?php

use Arya\TextBody;
use ImagickDemo\Framework\VariableMap;
use ImagickDemo\Response\RedirectResponse;
use Predis\Client as RedisClient;
use Auryn\Injector;
use Jig\Jig;
use Jig\Converter\JigConverter;
use Tier\ResponseBody\EmptyBody;
use Tier\Tier;
use Tier\ResponseBody\HtmlBody;
use Tier\InjectionParams;
use Jig\JigConfig;
use Arya\Request;
use Arya\Response;
use Tier\ResponseBody\ImageResponse;
use Tier\ResponseBody\FileResponseIM as FileResponse;
use ImagickDemo\Queue\ImagickTaskQueue;
use ImagickDemo\Helper\PageInfo;
use ImagickDemo\Navigation\CategoryNav;

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

    $errorNames = [
        E_ERROR => "E_ERROR",
        E_WARNING => "E_WARNING",
        E_PARSE => "E_PARSE",
        E_NOTICE => "E_NOTICE",
        E_CORE_ERROR => "E_CORE_ERROR",
        E_CORE_WARNING => "E_CORE_WARNING",
        E_COMPILE_ERROR => "E_COMPILE_ERROR",
        E_COMPILE_WARNING => "E_COMPILE_WARNING",
        E_USER_ERROR => "E_USER_ERROR",
        E_USER_WARNING => "E_USER_WARNING",
        E_USER_NOTICE => "E_USER_NOTICE",
        E_STRICT => "E_STRICT",
        E_RECOVERABLE_ERROR => "E_RECOVERABLE_ERROR",
        E_DEPRECATED => "E_DEPRECATED",
        E_USER_DEPRECATED => "E_USER_DEPRECATED",
    ];
    
    $errorType = "Error type $errno";

    if (array_key_exists($errno, $errorNames)) {
        $errorType = $errorNames[$errno];
    }

    $message =  "$errorType: [$errno] $errstr in file $errfile on line $errline";
    throw new \LogicException($message);
}


function fatalErrorShutdownHandler()
{
    $fatals = [
        E_ERROR,
        E_PARSE,
        E_USER_ERROR,
        E_CORE_ERROR,
        E_CORE_WARNING,
        E_COMPILE_ERROR,
        E_COMPILE_WARNING
    ];
    $lastError = error_get_last();
    
    if ($lastError && in_array($lastError['type'], $fatals)) {
        if (headers_sent()) {
            return;
        }
        header_remove();
        header("HTTP/1.0 500 Internal Server Error");
        
        extract($lastError);
        $errorMessage = sprintf("Fatal error: %s in %s on line %d", $message, $file, $line);

        error_log($errorMessage);
        $msg = "Oops! Something went terribly wrong :(";

        $msg = "<pre style=\"color:red;\">{$msg}</pre>";
        echo "<html><body><h1>500 Internal Server Error</h1><hr/>{$msg}</body></html>";
    }
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

function prepareJigConverter(JigConverter $jigConverter, $injector)
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

    $exampleName = $categoryNav->getImageFunctionName();

    return $injector->make($exampleName);
}


function setupCategoryExample($vars)
{
    if (array_key_exists('category', $vars)) {
        //This is actually only needed for image requests
        $className = sprintf('ImagickDemo\%s\functions', $vars['category']);
        $className::load();
    }
}

/**
 * @param \Auryn\Injector $injector
 * @param $routesFunction
 * @return \ImagickDemo\Response\Response|StandardHTTPResponse|null
 */
function routeRequest()
{
    $dispatcher = \FastRoute\simpleDispatcher('routesFunction');
    $httpMethod = 'GET';
    $uri = '/';

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

        //var_dump($handler);
        
        $fn = function () use ($vars) {
            setupCategoryExample($vars);
        };

        $params = InjectionParams::fromParams($vars);

        return new Tier($handler, $params, $fn);
    }
    else if ($dispatcherResult == \FastRoute\Dispatcher::NOT_FOUND) {
        //return new StandardHTTPResponse(404, $uri, "Route not found");
        return new Tier('serve404ErrorPage');
    }

    //TODO - need to embed allowedMethods....theoretically.
    return new Tier('serve405ErrorPage');
}


function originalImage(\Intahwebz\Request $request, \Auryn\Injector $injector)
{
    \ImagickDemo\Imagick\functions::load();
    
    $original = $request->getVariable('original', false);
    if ($original) {
        //TODO - these are not cached.
        
        //TODO - Bug waiting for pull https://github.com/rdlowrey/Auryn/pull/104
        //means we can't execute directly.
        //return $injector->execute(['ImagickDemo\Example', 'renderOriginalImage']);
        
        $instance = $injector->make('ImagickDemo\Example');
        return $injector->execute([$instance, 'renderOriginalImage']);
    }

    return null;
}
    
    
function cachedImageCallable(CategoryNav $categoryNav, Request $request, Response $response, $params)
{
    $filename = getImageCacheFilename($categoryNav->getPageInfo(), $params);
    $extensions = ["jpg", 'jpeg', "gif", "png", ];
    
    $contentType = false;

    $fileFound = false;
    
    foreach ($extensions as $extension) {
        $filenameWithExtension = $filename.".".$extension;
        if (file_exists($filenameWithExtension) == true) {
            //TODO - content type should actually be image/jpeg
            $contentType = "image/".$extension;
            $fileFound = $filenameWithExtension;
            break;
        }
    }
    
    if ($fileFound == false) {
        return false;
    }

    if ($request->hasHeader('HTTP_IF_MODIFIED_SINCE')) {
        $lastModifiedTime = filemtime($fileFound);
        if (strtotime($request->getHeader('HTTP_IF_MODIFIED_SINCE')) >= $lastModifiedTime) {
            $response->setStatus(304);
            return new EmptyBody();
        }
    }

    return new FileResponse($fileFound, $contentType);
}


function cachingheader($string, $replace = true, $http_response_code = null)
{
    global $imageType;
    global $cacheImages;

    if (stripos($string, "Content-Type: image/") === 0) {
        $imageType = substr($string, strlen("Content-Type: image/"));
    }
    
    if ($cacheImages == false) {
        if (php_sapi_name() !== 'cli') {
            \header($string, $replace, $http_response_code);
        }
    }
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

    cachingHeader("Content-Type: image/png");
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
    
function getOriginalImageURL($activeCategory, $activeExample)
{
    return '/imageOriginal/'.$activeCategory.'/'.$activeExample;
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


function routesFunction(\FastRoute\RouteCollector $r)
{
    $categories = '{category:Imagick|ImagickDraw|ImagickPixel|ImagickPixelIterator|ImagickKernel|Tutorial}';

    //Category indices
    $r->addRoute(
        'GET',
        "/$categories",
        ['ImagickDemo\Controller\Page', 'renderCategoryIndex']
    );

    //Category + example
    $r->addRoute(
        'GET',
        "/$categories/{example:[a-zA-Z]+}",
        ['ImagickDemo\Controller\Page', 'renderExamplePage']
    );

    //Images
    $r->addRoute(
        'GET',
        "/imageStatus/$categories/{example:[a-zA-Z]+}",
        ['ImagickDemo\Controller\Image', 'getImageJobStatus']
    );

    //Images
    $r->addRoute(
        'GET',
        "/image/$categories/{example:[a-zA-Z]+}",
        ['ImagickDemo\Controller\Image', 'getImageResponse']
    );
    
    //Original image
    $r->addRoute(
        'GET',
        "/imageOriginal/$categories/{example:[a-zA-Z]+}",
        ['ImagickDemo\Controller\Image', 'getOriginalImage']
    );

    //Custom images
    $r->addRoute(
        'GET',
        "/customImage/$categories/{example:[a-zA-Z]*}",
        ['ImagickDemo\Controller\Image', 'getCustomImageResponse']
    );

    $r->addRoute('GET', '/info', ['ImagickDemo\Controller\ServerInfo', 'createResponse']);
    $r->addRoute('GET', '/queueinfo', ['ImagickDemo\Controller\QueueInfo', 'createResponse']);
    
    $r->addRoute('GET', '/queuedelete', ['ImagickDemo\Controller\QueueInfo', 'deleteQueue']);
    $r->addRoute('GET', '/opinfo', ['ImagickDemo\Controller\ServerInfo', 'renderOPCacheInfo']);
    $r->addRoute('GET', '/', ['ImagickDemo\Controller\Page', 'renderTitlePage']);
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
        throw new \Exception("imageType not set, can't set image content type correctly.");
    }
    $imageData = ob_get_contents();

    ob_end_clean();
    
    return new \ImagickDemo\Response\ImageResponse($filename, "image/".$imageType, $imageData);
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
    
    var_dump($imageFunction);

    try {
        ob_start();

        global $imageType;

        $injector->execute($imageFunction, $params);


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

        return [$fullFilename, $imageType];
    }
    catch (\Exception $e) {
        throw $e;
    }
//    finally {
//        while (ob_get_level() > 0) {
//            ob_end_flush();
//        }
//    }
}


/**
 * @param Request $request
 * @param $job
 * @return RedirectResponse
 */
function redirectWaitingTask(Response $response, Request $request, $job)
{
    $job = intval($job) + 1;

    if ($job > 20) {
        //probably ought to time out at some point.
    }

    $request->getPath();
    $params = $request->getRequestParams();
    $params['job'] = $job;

    $newURL = 'http://'.$request->getHostName().$request->getPath()."?".http_build_query($params);
    $response->setStatus(202);
    
    return new TextBody("Image is generating.");
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

    $useAsyncLoading = $taskQueueIsActive;

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
    
/**
 * @param JigBase $template
 * @return HtmlBody
 * @throws Exception
 * @throws \Jig\JigException
 */
function createHtmlBody(\Jig\JigBase $template)
{
    $text = $template->render();

    return new HtmlBody($text);
}

    
function getRenderTemplateTier(InjectionParams $injectionParams, $templateName)
{
    $fn = function (Jig $jigRender) use ($injectionParams, $templateName) {
        $className = $jigRender->getTemplateCompiledClassname($templateName);
        $jigRender->checkTemplateCompiled($templateName);
        $injectionParams->alias('Jig\JigBase', $className);

        return new Tier('createHtmlBody', $injectionParams);
    };

    return new Tier($fn);
}
    
function createRedisClient()
{
    $redisParameters = array(
        'connection_timeout' => 30,
        'read_write_timeout' => 30,
    );

    $redisOptions = [];

    return new \Predis\Client($redisParameters, $redisOptions);
}

function directImageCallable(CategoryNav $categoryNav, \Auryn\Injector $injector, $params)
{
    $imageFunction = $categoryNav->getImageFunctionName();
    $filename = getImageCacheFilename(
        $categoryNav->getPageInfo(),
        $params
    );

    global $imageType;

    ob_start();
    $injector->execute($imageFunction);

    if ($imageType == null) {
        ob_end_clean();
        throw new \Exception("imageType not set, can't cache image correctly.");
    }
    $imageData = ob_get_contents();

    ob_end_clean();

    return new ImageResponse($filename, "image/".$imageType, $imageData);
}
    
function directCustomImageCallable(CategoryNav $categoryNav, \Auryn\Injector $injector, $params)
{
    $imageFunction = $categoryNav->getCustomImageFunctionName();
    $filename = getImageCacheFilename(
        $categoryNav->getPageInfo(),
        $params
    );

    global $imageType;

    ob_start();
    $injector->execute($imageFunction);

    if ($imageType == null) {
        ob_end_clean();
        throw new \Exception("imageType not set, can't cache image correctly.");
    }
    $imageData = ob_get_contents();

    ob_end_clean();

    return new ImageResponse($filename, "image/".$imageType, $imageData);
}

    
function createImageTask(
    VariableMap $variableMap,
    ImagickTaskQueue $taskQueue,
    CategoryNav $categoryNav,
    Response $response,
    $customImage,
    $params
) {
    $job = $variableMap->getVariable('job', false);
    if ($job === false) {
        if ($taskQueue->isActive() == false) {
            //Queue isn't active - don't bother queueing a task
            return false;
        }
    
        $task = new \ImagickDemo\Queue\ImagickTask($categoryNav, $params, $customImage);
        $taskQueue->addTask($task);
    }
    
    if ($variableMap->getVariable('noredirect') == true) {
        return new \ImagickDemo\Response\ErrorResponse(503, "image still processing $job is ".$job);
    }

    $response->setStatus(202);
    
    return new TextBody("Image is generating.");
}

function serve404ErrorPage(Response $response)
{
    $response->setStatus(404);

    return new TextBody('Route not found.');
}

function serve405ErrorPage(Response $response)
{
    $response->setStatus(404);

    return new TextBody('Method not allowed for route.');
}


function createHTTPRequest()
{
    return new \Intahwebz\Routing\HTTPRequest(
        $_SERVER,
        $_GET,
        $_POST,
        $_FILES,
        $_COOKIE
    );
}