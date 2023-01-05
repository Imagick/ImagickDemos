<?php

declare(strict_types = 1);

namespace ImagickDemo\ImagickKernel\Controls;

use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use DataType\DataType;

class NullControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct() { }

    public function getValuesForForm(): array
    {
        return [ ];
    }
}