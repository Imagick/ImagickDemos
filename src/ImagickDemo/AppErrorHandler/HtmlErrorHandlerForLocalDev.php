<?php

declare(strict_types = 1);

namespace ImagickDemo\AppErrorHandler;

use ImagickDemo\App;
use SlimAuryn\ResponseMapper\ResponseMapper;
use SlimAuryn\Response\HtmlResponse;

class HtmlErrorHandlerForLocalDev implements AppErrorHandler
{
    public function __invoke($container)
    {
        return function ($request, $response, $exception) {
            /** @var \Throwable $exception */
            $text = getTextForException($exception);

            $text .= App::ERROR_CAUGHT_BY_ERROR_HANDLER_MESSAGE;

            $stubResponse = new HtmlResponse(nl2br($text), [], 500);

            \error_log($text);

            $response = ResponseMapper::mapStubResponseToPsr7($stubResponse, $response);

            return $response;
        };
    }
}
