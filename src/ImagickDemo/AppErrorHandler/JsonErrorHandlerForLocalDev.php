<?php

declare(strict_types = 1);

namespace ImagickDemo\AppErrorHandler;

use ImagickDemo\App;

class JsonErrorHandlerForLocalDev implements AppErrorHandler
{
    public function __invoke($container)
    {
        return function ($request, $response, $exception) {
            $data = getExceptionInfoAsArray($exception);

            $data['info'] = App::ERROR_CAUGHT_BY_ERROR_HANDLER_API_MESSAGE;

            \error_log(json_encode_safe($data));

            return $response->withStatus(500)
                ->withHeader('Content-Type', 'application/json')
                ->write(json_encode_safe($data));
        };
    }
}
