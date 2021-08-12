<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\Image;


class NullControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
    ) {
    }
}