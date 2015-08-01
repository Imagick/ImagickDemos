<?php

namespace Arya;

class RedirectBody implements Body
{

    /**
     * @var string
     */
    private $text;

    /**
     * @var
     */
    private $location;
    
    function __construct($text, $location)
    {
        $this->text = $text;
        $this->location = $location;
    }
    
    /**
     * Responsible for outputting entity body data to STDOUT
     */
    public function __invoke()
    {
        return $this->text;
    }

    /**
     * Return an optional array of headers to be sent prior to entity body output
     */
    public function getHeaders()
    {
        return ['Location' => $this->location];
    }

    function __toString()
    {
        return $this->text;
    }
}
