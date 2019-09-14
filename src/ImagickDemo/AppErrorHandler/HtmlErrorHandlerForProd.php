<?php

declare(strict_types = 1);

namespace ImagickDemo\AppErrorHandler;

class HtmlErrorHandlerForProd implements AppErrorHandler
{
    public function __invoke($container)
    {
        return function ($request, $response, \Throwable $exception) {
            \error_log("The heck: " . $exception->getMessage());
            \error_log(getTextForException($exception));
            $text = "Sorry, an error occurred. ";

            return $response->withStatus(500)
                ->withHeader('Content-Type', 'text/html')
                ->write($text);
        };
    }
}
