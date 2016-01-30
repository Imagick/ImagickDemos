<?php

use Auryn\Injector;
use Room11\HTTP\Body;
use Room11\HTTP\VariableMap;
use Room11\HTTP\HeadersSet;
use ImagickDemo\Helper\PageInfo;
use ImagickDemo\Navigation\CategoryInfo;
use ImagickDemo\Queue\ImagickTaskQueue;
use ImagickDemo\Config;
use Jig\Jig;
use Predis\Client as RedisClient;
use Psr\Http\Message\ServerRequestInterface as Request;
use Room11\HTTP\Body\BlobBody;
use Room11\HTTP\Body\EmptyBody;
use Room11\HTTP\Body\TextBody;
use Room11\Caching\LastModifiedStrategy;
use Room11\Caching\LastModified\Disabled as CachingDisabled;
use Room11\Caching\LastModified\Revalidate as CachingRevalidate;
use Room11\Caching\LastModified\Time as CachingTime;
use Tier\Body\CachingFileBodyFactory;

//yolo - We use a global to allow us to do a hack to make all the code examples
//appear to use the standard 'header' function, but also capture the content type 
//of the image
$imageType = null;

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

function createControl(PageInfo $pageInfo, Injector $injector)
{
    list($controlClassname, $params) = CategoryInfo::getDIInfo($pageInfo);
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

function createExample(PageInfo $pageInfo, Injector $injector)
{
    $exampleName = CategoryInfo::getImageFunctionName($pageInfo);

    return $injector->make($exampleName);
}


function setupCategoryExample(\Tier\JigBridge\RouteInfo $routeInfo)
{
    if (array_key_exists('category', $routeInfo->params)) {
        //This is actually only needed for image requests
        $className = sprintf('ImagickDemo\%s\functions', $routeInfo->params ['category']);
        $className::load();
    }
}

function createDispatcher()
{
    $dispatcher = FastRoute\simpleDispatcher('routesFunction');
    
    return $dispatcher;
}

function originalImage(\Intahwebz\Request $request, \Auryn\Injector $injector)
{
    \ImagickDemo\Imagick\functions::load();
    
    $original = $request->getVariable('original', false);
    if ($original) {
        $instance = $injector->make('ImagickDemo\Example');
        return $injector->execute([$instance, 'renderOriginalImage']);
    }

    return null;
}

function cachedImageCallable(
    PageInfo $pageInfo,
    Request $request,
    CachingFileBodyFactory $fileBodyFactory,
    $params
) {
    $filename = getImageCacheFilename($pageInfo, $params);
    $extensions = ["jpg", 'jpeg', "gif", "png", ];
    $contentType = false;
    $filenameFound = false;

    foreach ($extensions as $extension) {
        $filenameWithExtension = $filename.".".$extension;
        if (file_exists($filenameWithExtension) == true) {
            //TODO - content type should actually be image/jpeg
            $contentType = "image/".$extension;
            $filenameFound = $filenameWithExtension;
            break;
        }
    }

    if ($filenameFound == false) {
        return false;
    }

    if ($request->hasHeader('HTTP_IF_MODIFIED_SINCE')) {
        $lastModifiedTime = filemtime($filenameFound);
        if (strtotime($request->getHeader('HTTP_IF_MODIFIED_SINCE')) >= $lastModifiedTime) {
            return new EmptyBody(304);
        }
    }

    return $fileBodyFactory->create($filenameFound, $contentType);
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
    $r->addRoute('GET', '/settingsCheck', ['ImagickDemo\Controller\ServerInfo', 'serverSettings']);
    $r->addRoute('GET', '/', ['ImagickDemo\Controller\Page', 'renderTitlePage']);
    
    $r->addRoute('GET', "/css/{commaSeparatedFilenames}", ['ScriptHelper\Controller\ScriptServer', 'serveCSS']);
    $r->addRoute('GET', '/js/{commaSeparatedFilenames}', ['ScriptHelper\Controller\ScriptServer', 'serveJavascript']);
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
    finally {
        while (ob_get_level() > 0) {
            ob_end_flush();
        }
    }
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


function prepareJig(Jig $jigRender, $injector)
{
    $jigRender->addDefaultPlugin('ImagickDemo\JigPlugin\ImagickPlugin');
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

function directImageCallable(
    PageInfo $pageInfo,
    \Auryn\Injector $injector,
    \Tier\JigBridge\RouteInfo $routeInfo,
    $params
) {
    setupCategoryExample($routeInfo);
    $imageFunction = CategoryInfo::getImageFunctionName($pageInfo);
    $filename = getImageCacheFilename(
        $pageInfo,
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

    return new BlobBody($filename, $imageData, "image/".$imageType);
}
    
function directCustomImageCallable(
    PageInfo $pageInfo,
    \Tier\JigBridge\RouteInfo $routeInfo,
    \Auryn\Injector $injector,
    $params
) {
    setupCategoryExample($routeInfo);
    
    $imageFunction = CategoryInfo::getCustomImageFunctionName($pageInfo);
    $filename = getImageCacheFilename(
        $pageInfo,
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
    
    return new BlobBody($filename, $imageData, "image/".$imageType);
}

function createImageTask(
    VariableMap $variableMap,
    ImagickTaskQueue $taskQueue,
    PageInfo $pageInfo,
    Request $request,
    HeadersSet $headersSet,
    $customImage,
    $params
) {
    $job = $variableMap->getVariable('job', false);
    
    $text = "Image is still generating.";
    if ($job === false) {
        if ($taskQueue->isActive() == false) {
            //Queue isn't active - don't bother queueing a task
            return false;
        }

        $task = new \ImagickDemo\Queue\ImagickTask(
            $pageInfo,
            $params,
            $customImage,
            $request->getUri()->getPath()
        );
        $added = $taskQueue->addTask($task);
        
        if ($added === true) {
            $text = "Image added to task list";
        }
        else {
            $text = "Image task $added already present.";
        }
    }

    $caching = new \Room11\Caching\LastModified\Disabled();
    foreach ($caching->getHeaders(time()) as $key => $value) {
        $headersSet->addHeader($key, $value);
    }

    return new TextBody($text, 420);
}

function serve404ErrorPage()
{
    return new TextBody('Route not found.', 404);
}

function serve405ErrorPage()
{
    return new TextBody('Method not allowed for route.', 405);
}

function routeJSInclude($url)
{
    return "/js/".$url;
}

function getTrace($traceParts, $directory)
{
    $traceText = "";
    $i = 1;

    foreach ($traceParts as $node) {
        $traceText .= "#$i ";
        if (isset($node['file'])) {
            $traceText .= $node['file']." ";
        }
        if (isset($node['line'])) {
            $traceText .= "(".$node['line']."): ";
        }
        if (isset($node['class'])) {
            $traceText .= $node['class'] . "->";
        }
        $traceText .= $node['function'] . "()\n";
        $i++;
    }
    
    $traceText = str_replace($directory, '', $traceText);

    return $traceText;
}

function getExceptionText(\Exception $e)
{
    $fullText = "";
    $fullText .= "<p>";
    $fullText .= get_class($e)." caught: ".$e->getMessage(). "<br/>";
    $fullText .= "</p>";

    $fullText .= "<p><pre>";
    $fullText .= getTrace($e->getTrace(), realpath(__DIR__."/../"));
    $fullText .= "</pre></p>";

    return $fullText;
}


    
function createLibrato(Config $config)
{
    return \ImagickDemo\Config\Librato::make(
        $config->getKey(Config::LIBRATO_KEY),
        $config->getKey(Config::LIBRATO_USERNAME),
        $config->getKey(Config::LIBRATO_STATSSOURCENAME)
    );
}

function createJigConfig(Config $config)
{
    
    $jigConfig = new \Jig\JigConfig(
        new \Jig\JigTemplatePath("../templates/"),
        new \Jig\JigCompilePath("../var/compile/"),
        $config->getKey(Config::JIG_COMPILE_CHECK)
    );

    return $jigConfig;
}

function createDomain(Config $config)
{
    return new \Tier\Domain(
        $config->getKey(Config::DOMAIN_CANONICAL),
        $config->getKey(Config::DOMAIN_CDN_PATTERN),
        $config->getKey(Config::DOMAIN_CDN_TOTAL)
    );
}

function createCaching(Config $config)
{
    $cacheSetting = $config->getKey(Config::CACHING_SETTING);

    switch ($cacheSetting) {
        case LastModifiedStrategy::CACHING_DISABLED: {
            return new CachingDisabled();
        }
        case LastModifiedStrategy::CACHING_REVALIDATE: {
            return new CachingRevalidate(3600 * 2, 3600);
        }
        case LastModifiedStrategy::CACHING_TIME: {
            return new CachingTime(3600 * 10, 3600);
        }
        default: {
            throw new TierException("Unknown caching setting '$cacheSetting'.");
        }
    }
}

function createScriptVersion(Config $config)
{
    $value = $config->getKey(Config::SCRIPT_VERSION);
    return new \ScriptServer\Value\ScriptVersion(
        $value
    );
}

function createScriptInclude(
    Config $config,
    \ScriptHelper\ScriptURLGenerator $scriptURLGenerator
) {
    $packScript = $config->getKey(Config::SCRIPT_PACKING);

    if ($packScript) {
        return new \ScriptHelper\ScriptInclude\ScriptIncludePacked($scriptURLGenerator);
    }
    else {
        return new \ScriptHelper\ScriptInclude\ScriptIncludeIndividual($scriptURLGenerator);
    }
}
