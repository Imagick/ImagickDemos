<?php

declare(strict_types = 1);

namespace ImagickDemo\ImagickKernel\Params;

use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

class NullControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct() { }

    public function getValuesForForm(): array
    {
        return [ ];
    }
}