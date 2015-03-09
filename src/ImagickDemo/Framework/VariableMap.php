<?php


namespace ImagickDemo\Framework;


interface VariableMap {
    function getVariable($variableName, $default = false, $minimum = false, $maximum = false);
}

