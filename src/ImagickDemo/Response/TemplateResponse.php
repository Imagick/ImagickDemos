<?php


namespace ImagickDemo\Response;

use Jig\JigBase;

class TemplateResponse implements \ImagickDemo\Response\Response {

    private $text;

    function __construct(JigBase $jigBase) {
        $this->text = $jigBase->render();
    }

    function send(array $headers = []) {
        foreach($headers as $header) {
            header($header);
        }

        echo $this->text;
    }
}

 