<?php


namespace ImagickDemo\Response;


class ImageResponse implements \ImagickDemo\Response\Response {

    private $mimeType;
    private $data;

    function __construct($mimeType, $data) {
        $this->mimeType = $mimeType;
        $this->data = $data;

    }
    
    function send() {

        if ($this->mimeType) {
            header('Content-Type: ' . $this->mimeType);
        }
        header('Content-Length: ' . strlen($this->data));
        
        echo $this->data;
    }
}

