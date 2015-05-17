<?php


namespace ImagickDemo\Response;


class ImageResponse implements \ImagickDemo\Response\Response {

    private $mimeType;
    private $data;

    function __construct($filename, $mimeType, $data) {
        $this->mimeType = $mimeType;
        $this->data = $data;
        $this->filename = $filename;
    }
    
    function send(array $headers = []) {

        if ($this->mimeType) {
            header('Content-Type: '.$this->mimeType);
        }
        header('Content-Length: '.strlen($this->data));

        // TODO - this is not safe, needs to be encode by the appropriate
        // rfc scheme
        header("Content-Disposition: attachment; filename=".$this->filename);

        echo $this->data;
    }
}

