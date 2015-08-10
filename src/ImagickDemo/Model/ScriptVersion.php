<?php


namespace ImagickDemo\Model;


class ScriptVersion {

    private $value;
    
    function __construct($value)
    {
        $this->value = $value;
    }
    
    function getValue()
    {
        return $this->value;
    }
}

