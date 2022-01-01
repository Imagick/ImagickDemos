<?php

declare(strict_types = 1);


use Auryn\Injector;
use ImagickDemo\Config;
use Psr\Http\Message\ResponseInterface;
use SlimAuryn\SlimAurynInvokerFactory;

function createRoutesForApp()
{
    return new \SlimAuryn\Routes(__DIR__ . '/../routes/app_routes.php');
}


function createSlimContainer()
{
    $container = new \Slim\Container();
    global $request;

    if (isset($request) && $request !== null) {
        $container['request'] = $request;
    }

    return $container;
}


function createSlimAppForApp(
    Injector $injector,
    \Slim\Container $container,
    \ImagickDemo\AppErrorHandler\AppErrorHandler $appErrorHandler
) {
    // quality code.
    $container['foundHandler'] = $injector->make(\SlimAuryn\SlimAurynInvokerFactory::class);

    $callableResolver = new \SlimAuryn\AurynCallableResolver(
        new \Slim\CallableResolver($container),
        $container
    );

    $container['callableResolver'] = $callableResolver;


    // TODO - this shouldn't be used in production.
    $container['errorHandler'] = $appErrorHandler;
//  function ($container) use ($appErrorHandler) {
//        return $appErrorHandler;
//    };

    $container['phpErrorHandler'] = $appErrorHandler;
//        function ($container) {
//        return $container['errorHandler'];
//    };

    $app = new \Slim\App($container);

    $app->add($injector->make(\SlimAuryn\ExceptionMiddleware::class));
//    $app->add($injector->make(\Osf\Middleware\ContentSecurityPolicyMiddleware::class));
//    $app->add($injector->make(\Osf\Middleware\BadHeaderMiddleware::class));
//    $app->add($injector->make(\Osf\Middleware\AllowedAccessMiddleware::class));
//    $app->add($injector->make(\Osf\Middleware\MemoryCheckMiddleware::class));

    return $app;
}


function createHtmlAppErrorHandler(
    \Auryn\Injector $injector,
    Config $config
) : \ImagickDemo\AppErrorHandler\AppErrorHandler {

    if ($config->isProductionEnv() === true) {
        return $injector->make(\ImagickDemo\AppErrorHandler\HtmlErrorHandlerForProd::class);
    }

    return $injector->make(\ImagickDemo\AppErrorHandler\HtmlErrorHandlerForLocalDev::class);
}

function createJsonAppErrorHandler(
    \Auryn\Injector $injector,
    Config $config
) : \ImagickDemo\AppErrorHandler\AppErrorHandler {
    if ($config->isProductionEnv() === true) {
        return $injector->make(\ImagickDemo\AppErrorHandler\JsonErrorHandlerForProd::class);
    }

    return $injector->make(\ImagickDemo\AppErrorHandler\JsonErrorHandlerForLocalDev::class);
}


/**
 * Creates the ExceptionMiddleware that converts all known app exceptions
 * to nicely formatted pages for the app/user facing sites
 */
function createExceptionMiddlewareForApp(\Auryn\Injector $injector)
{
    $exceptionHandlers = [
        // We don't use this. All forms are api based.
        /// \Params\Exception\ValidationException::class => 'foo',
        \ImagickDemo\Exception\DebuggingCaughtException::class => 'debuggingCaughtExceptionExceptionMapperApp',
    ];

    $resultMappers = getResultMappers($injector);

    return new \SlimAuryn\ExceptionMiddleware(
        $exceptionHandlers,
        $resultMappers
    );
}

/**
 * Creates the objects that map StubResponse into PSR7 responses
 */
function getResultMappers(\Auryn\Injector $injector)
{
    $twigResponseMapperFn = function (
        \SlimAuryn\Response\TwigResponse $twigResponse,
        ResponseInterface $originalResponse
    ) use ($injector) {

        $twigResponseMapper = $injector->make(\ImagickDemo\ResponseMapper\TwigResponseMapper::class);

        return $twigResponseMapper($twigResponse, $originalResponse);
    };

//    $markdownResponseMapperFn = function (
//        \Osf\Response\MarkdownResponse $markdownResponse,
//        ResponseInterface $originalResponse
//    ) use ($injector) {
//        $markdownResponseMapper = $injector->make(\Osf\Service\MarkdownResponseMapper::class);
//
//        return $markdownResponseMapper($markdownResponse, $originalResponse);
//    };

    return [
        \SlimAuryn\Response\StubResponse::class => '\SlimAuryn\ResponseMapper\ResponseMapper::mapStubResponseToPsr7',
//        \Osf\Response\MarkdownResponse::class => $markdownResponseMapperFn,


        ResponseInterface::class => 'SlimAuryn\ResponseMapper\ResponseMapper::passThroughResponse',
        'string' => 'convertStringToHtmlResponse',
        \SlimAuryn\Response\TwigResponse::class => $twigResponseMapperFn
    ];
}

function createSlimAurynInvokerFactory(
    \Auryn\Injector $injector,
    \SlimAuryn\RouteMiddlewares $routeMiddlewares
) {
    $resultMappers = getResultMappers($injector);

    return new SlimAuryn\SlimAurynInvokerFactory(
        $injector,
        $routeMiddlewares,
        $resultMappers
    );
}

function createTwigForSite(\Auryn\Injector $injector)
{
    // The templates are included in order of priority.
    $templatePaths = [
        __DIR__ . '/../templates'
    ];

    $loader = new \Twig\Loader\FilesystemLoader($templatePaths);
    $twig = new \Twig\Environment($loader, array(
        'cache' => false,
        'strict_variables' => true,
        'debug' => true // TODO - needs config
    ));

    // Inject function - allows DI in templates.
    $function = new \Twig\TwigFunction('inject', function (string $type) use ($injector) {
        return $injector->make($type);
    });
    $twig->addFunction($function);


    $rawParams = ['is_safe' => array('html')];

    $twigFunctions = [
//        'renderNavbarLinks' => 'renderNavbarLinks'
    ];

    foreach ($twigFunctions as $functionName => $callable) {
        $function = new \Twig\TwigFunction($functionName, function () use ($injector, $callable) {
            return $injector->execute($callable);
        });
        $twig->addFunction($function);
    }

    $function = new \Twig\TwigFunction('linkableTitle', 'linkableTitle', $rawParams);
    $twig->addFunction($function);

    $rawTwigFunctions = [
        'memory_debug' => 'memory_debug',
        'request_nonce' => 'request_nonce',
        'emitDnsPreFetch' => 'emitDnsPreFetch',
        'peakMemory' => 'peak_memory',
    ];


    foreach ($rawTwigFunctions as $functionName => $callable) {
        $function = new \Twig\TwigFunction($functionName, function () use ($injector, $callable) {
            return $injector->execute($callable);
        }, $rawParams);
        $twig->addFunction($function);
    }

    return $twig;
}

function createExampleFinder(
    Predis\Client $redisClient,
    Config $config
) {
    $cache_time = 60; // 1 minute
    if ($config->isProductionEnv() === true) {
        $cache_time = 10000000000; // more than 1 minute
    }
//  return new \ImagickDemo\ExampleFinder\ExampleSourceFinder();
    return new \ImagickDemo\ExampleFinder\RedisExampleFinder($redisClient, $cache_time);
}