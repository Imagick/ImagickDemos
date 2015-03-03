<?php

namespace ImagickDemo\Queue;

use Intahwebz\Request;


class TaskRequest implements Request {
    
    private $variables;
    
    function __construct($variables) {
        $this->variables = $variables;
    }
    
    
    function getClientIP() {
        throw new \Exception("Not implemented");
    }

    function getHostName() {
        throw new \Exception("Not implemented");
    }

    function setRouteParameters($routeParameters) {
        throw new \Exception("Not implemented");
    }

    function getScheme() {
        throw new \Exception("Not implemented");
    }

    function getRequestParams() {
        throw new \Exception("Not implemented");
    }

    function getPath() {
        throw new \Exception("Not implemented");
    }

    function getPort() {
        throw new \Exception("Not implemented");
    }

    function getMethod() {
        throw new \Exception("Not implemented");
    }

    function getReferrer() {
        throw new \Exception("Not implemented");
    }

    /**
     * @param $variableName
     * @param mixed $default
     * @param mixed $minimum
     * @param mixed $maximum
     * @return mixed
     */
    function getVariable($variableName, $default = false, $minimum = false, $maximum = false) {
        if(array_key_exists($variableName, $this->variables) == true){
            $result = $this->variables[$variableName];
        }
        else if(array_key_exists($variableName, $this->routeParameters) == true){
            $result = $this->routeParameters[$variableName];
        }
        else if(array_key_exists($variableName, $this->requestParams) == true){
            $result = $this->requestParams[$variableName];
        }
        else{
            $result = $default;
        }

        if($minimum !== false){
            if($result < $minimum){
                $result = $minimum;
            }
        }

        if($maximum !== false){
            if($result > $maximum){
                $result = $maximum;
            }
        }

        return $result;
    }

    function checkIfModifiedHeader($unixTime) {
        throw new \Exception("Not implemented");
    }
}