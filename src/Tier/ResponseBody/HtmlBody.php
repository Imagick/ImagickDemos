<?php

namespace Tier\ResponseBody;

use Arya\Body;

class HtmlBody implements Body
{
    private $text;
    
    public function __construct($text)
    {
        $this->text = (string)$text;
    }

    public function __toString()
    {
        return $this->text;
    }
    
    public function __invoke()
    {
        return $this->text;
    }

    public function getHeaders()
    {
        return [
            'Content-Type' => 'text/html; charset=UTF-8; charset=utf-8',
            'Content-Length' => strlen($this->text)
        ];
    }
}
