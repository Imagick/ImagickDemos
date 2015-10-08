<?php


use Room11\HTTP\Request;
use Room11\HTTP\Response;
use Room11\HTTP\Body;
use Auryn\Injector;
use ImagickDemo\Framework\VariableMap;
use ImagickDemo\Helper\PageInfo;
use ImagickDemo\Navigation\CategoryInfo;
use ImagickDemo\Queue\ImagickTaskQueue;
use Jig\Converter\JigConverter;
use Jig\Jig;
use Jig\JigConfig;
use Predis\Client as RedisClient;
use Room11\HTTP\Body\DataBody;
use Room11\HTTP\Body\EmptyBody;
use Room11\HTTP\Body\HtmlBody;
use Room11\HTTP\Body\TextBody;
use Tier\InjectionParams;
use Tier\ResponseBody\CachingFileResponseFactory;
use Tier\Tier;
use Room11\Caching\LastModifiedStrategy;
use Room11\Caching\LastModified\Disabled as CachingDisabled;
use Room11\Caching\LastModified\Revalidate as CachingRevalidate;
use Room11\Caching\LastModified\Time as CachingTime;
use ScriptServer\Value\ScriptVersion;
use ImagickDemo\Config;

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

function prepareJigConverter(JigConverter $jigConverter, $injector)
{
    $jigConverter->addDefaultHelper('Jig\TemplateHelper\DebugHelper');
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
        $instance = $injector->make('ImagickDemo\Example');
        return $injector->execute([$instance, 'renderOriginalImage']);
    }

    return null;
}

function cachedImageCallable(
    PageInfo $pageInfo,
    Request $request,
    Response $response,
    CachingFileResponseFactory $fileResponseFactory,
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
            $response->setStatus(304);
            return new EmptyBody();
        }
    }
    
    
    return $fileResponseFactory->create($filenameFound, $contentType);
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
    $r->addRoute('GET', "/css/{cssInclude}", ['ScriptServer\Controller\ScriptServer', 'getPackedCSS']);
    $r->addRoute('GET', '/js/{jsInclude}', ['ScriptServer\Controller\ScriptServer', 'getPackedJavascript']);
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


function getTemplatRenderCallable($templateFilename)
{
    $fn = function (JigConfig $jigConfig) use ($templateFilename) {
        $className = $jigConfig->getFullClassname($templateFilename);

        return [$className, 'render'];
    };

    return $fn;
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

    
function createRenderTemplateTier($templateName, InjectionParams $injectionParams = null)
{
    $fn = function (Jig $jig) use ($injectionParams, $templateName) {
        if ($injectionParams == null) {
            $injectionParams = InjectionParams::fromParams([]);
        }

        $className = $jig->getTemplateCompiledClassname($templateName);
        $jig->checkTemplateCompiled($templateName);
        $injectionParams->alias('Jig\JigBase', $className);

        return new Tier('createHtmlBody', $injectionParams);
    };

    return new Tier($fn);
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

function directImageCallable(PageInfo $pageInfo, \Auryn\Injector $injector, $params)
{
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

    return new DataBody($filename, $imageData, "image/".$imageType);
}
    
function directCustomImageCallable(PageInfo $pageInfo, \Auryn\Injector $injector, $params)
{
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
    
    return new DataBody($filename, $imageData, "image/".$imageType);
}

function createImageTask(
    VariableMap $variableMap,
    ImagickTaskQueue $taskQueue,
    PageInfo $pageInfo,
    Request $request,
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

        $task = new \ImagickDemo\Queue\ImagickTask(
            $pageInfo,
            $params,
            $customImage,
            $request->getPath()
        );
        $taskQueue->addTask($task);
    }

    if ($variableMap->getVariable('noredirect') == true) {
        return new \ImagickDemo\Response\ErrorResponse(503, "image still processing $job is ".$job);
    }

    $caching = new \Room11\Caching\LastModified\Disabled();
    foreach ($caching->getHeaders(time()) as $key => $value) {
        $response->addHeader($key, $value);
    }

    $response->setStatus(420);

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
    return\ImagickDemo\Config\Librato::make(
        $config->getKey(Config::LIBRATO_KEY),
        $config->getKey(Config::LIBRATO_USERNAME),
        $config->getKey(Config::LIBRATO_STATSSOURCENAME)
    );
}

function createJigConfig(Config $config)
{
    $jigConfig = new \Jig\JigConfig(
        "../templates/",
        "../var/compile/",
        'tpl',
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

function createScriptInclude(Config $config, ScriptVersion $scriptVersion)
{
    $value = $config->getKey(Config::SCRIPT_PACKING);

    if ($value) {
        return new \ScriptServer\Service\ScriptIncludePacked($scriptVersion);
    }
        
    return new \ScriptServer\Service\ScriptIncludeIndividual(
        $scriptVersion
    );
}
