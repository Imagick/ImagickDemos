<?php


namespace ImagickDemo\Response;


class ErrorResponse implements Response {

    private $code;
    private $message;

    private $headers = [];

    function __construct($code, $message) {
        $this->code = $code;
        $this->message = $message;
    }

    function setHeader($type, $value) {
        $this->headers[$type] = $value;
    }

    function send(array $headers = []) {
        header("HTTP/1.1 ".$this->code." ".$this->message);
        foreach ($this->headers as $type => $value) {
            header("$type: $value");
        }
        echo "$this->message";
    }
}




 