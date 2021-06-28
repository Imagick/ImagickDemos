<?php

declare(strict_types=1);

namespace ImagickDemo;

use VarMap\VarMap;

interface ReactParamType
{
    public static function getParamType(): string;
}
