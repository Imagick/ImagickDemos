<?php

declare(strict_types = 1);

use Auryn\Injector;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use SlimAuryn\RouteParams;
use SlimAuryn\Response\StubResponse;

function exampleResponseMapper(
    \SlimAuryn\Response\StubResponse $builtResponse,
    ResponseInterface $response
) {
    $status = $builtResponse->getStatus();
    $reasonPhrase = getReasonPhrase($status);

    $response = $response->withStatus($status, $reasonPhrase);
    foreach ($builtResponse->getHeaders() as $key => $value) {
        $response = $response->withAddedHeader($key, $value);
    }
    $response->getBody()->write($builtResponse->getBody());

    return $response;
}

/**
 * @param Injector $injector
 * @param ServerRequestInterface $request
 * @param ResponseInterface $response
 * @param array $routeArguments
 * @throws \Auryn\ConfigException
 */
function setupSlimAurynInvoker(
    Injector $injector,
    ServerRequestInterface $request,
    ResponseInterface $response,
    array $routeArguments
) {
    $injector->alias(ServerRequestInterface::class, get_class($request));
    $injector->share($request);
    $injector->alias(ResponseInterface::class, get_class($response));
    $injector->share($response);
    foreach ($routeArguments as $key => $value) {
        $injector->defineParam($key, $value);
    }

    $invokerRouteParams = new RouteParams($routeArguments);
    $injector->share($invokerRouteParams);

    $psr7WithRouteParams = \VarMap\Psr7InputMapWithVarMap::createFromRequestAndVarMap(
        $request,
        new \VarMap\ArrayVarMap($routeArguments)
    );
    $injector->share($psr7WithRouteParams);
}
