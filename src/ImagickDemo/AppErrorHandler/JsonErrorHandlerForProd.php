<?php

declare(strict_types = 1);

namespace ImagickDemo\AppErrorHandler;

class JsonErrorHandlerForProd implements AppErrorHandler
{
    public function __invoke($container)
    {
        return function ($request, $response, \Throwable $exception) {
            \error_log("The heck: " . $exception->getMessage());
            \error_log(getTextForException($exception));
            $text = json_encode("Sorry, there was an error.\n");
            return $response->withStatus(500)
                ->withHeader('Content-Type', 'application/json')

                ->write($text);
        };
    }
}
