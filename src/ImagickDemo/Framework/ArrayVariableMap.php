<?php


namespace ImagickDemo\Framework;


class ArrayVariableMap implements VariableMap {

    function __construct(array $variables) {
        $this->variables = $variables;
    }

    function getVariable($variableName, $default = false, $minimum = false, $maximum = false) {
        if(array_key_exists($variableName, $this->variables) == true){
            $result = $this->variables[$variableName];
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
}

