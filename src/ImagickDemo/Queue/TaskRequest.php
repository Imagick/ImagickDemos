<?php

namespace ImagickDemo\Queue;

use Intahwebz\Request;

class TaskRequest implements Request
{
    private $variables;

    public function __construct($variables)
    {
        $this->variables = $variables;
    }

    public function getClientIP()
    {
        throw new \Exception("Not implemented");
    }

    public function getHostName()
    {
        throw new \Exception("Not implemented");
    }

    public function setRouteParameters($routeParameters)
    {
        throw new \Exception("Not implemented");
    }

    public function getScheme()
    {
        throw new \Exception("Not implemented");
    }

    public function getRequestParams()
    {
        throw new \Exception("Not implemented");
    }

    public function getPath()
    {
        throw new \Exception("Not implemented");
    }

    public function getPort()
    {
        throw new \Exception("Not implemented");
    }

    public function getMethod()
    {
        throw new \Exception("Not implemented");
    }

    public function getReferrer()
    {
        throw new \Exception("Not implemented");
    }

    /**
     * @param $variableName
     * @param mixed $default
     * @param mixed $minimum
     * @param mixed $maximum
     * @return mixed
     */
    public function getVariable($variableName, $default = false, $minimum = false, $maximum = false)
    {
        if (array_key_exists($variableName, $this->variables) == true) {
            $result = $this->variables[$variableName];
        } else {
            $result = $default;
        }

        if ($minimum !== false) {
            if ($result < $minimum) {
                $result = $minimum;
            }
        }

        if ($maximum !== false) {
            if ($result > $maximum) {
                $result = $maximum;
            }
        }

        return $result;
    }

    public function checkIfModifiedHeader($unixTime)
    {
        throw new \Exception("Not implemented");
    }
}
