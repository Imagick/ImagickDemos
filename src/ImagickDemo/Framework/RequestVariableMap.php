<?php


namespace ImagickDemo\Framework;

use Intahwebz\Request;

class RequestVariableMap implements VariableMap
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getVariable($variableName, $default = false, $minimum = false, $maximum = false)
    {
        return $this->request->getVariable($variableName, $default, $minimum, $maximum);
    }
}
