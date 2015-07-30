<?php

namespace ImagickDemo\Framework;

interface VariableMap
{
    public function getVariable($variableName, $default = false, $minimum = false, $maximum = false);
}
