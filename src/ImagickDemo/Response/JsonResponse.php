<?php


namespace ImagickDemo\Response;



class JsonResponse implements \ImagickDemo\Response\Response {

    private $data;

    function __construct($data) {
        $this->data = $data;
    }

    function send(array $headers = []) {
        $json = json_encode($this->data, JSON_PRETTY_PRINT);
        
        if (!$json) {
            //json encoding screwed up
            throw new \Exception("json encoding failed.");
        }

        header('Content-Type: application/json');
        header('Content-Length: ' . strlen($json)); //byte-safe
        echo $json;
    }
}

 