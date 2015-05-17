<?php


namespace ImagickDemo\Response;



class TextResponse implements \ImagickDemo\Response\Response {

    private $text;

    function __construct($text) {
        $this->text = $text;
    }

    function send(array $headers = []) {
        foreach($headers as $header) {
            header($header);
        }

        echo $this->text;
    }
}

 