<?php


namespace ImagickDemo\Response;


class NotFoundResponse implements Response  {
    function send(array $headers = []) {
        header("HTTP/1.0 404 Not found");
    }
}

