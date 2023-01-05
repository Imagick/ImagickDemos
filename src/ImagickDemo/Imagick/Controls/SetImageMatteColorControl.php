<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\AlphaType;
use ImagickDemo\Params\ImagickColorParam;

class SetImageMatteColorControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[ImagickColorParam('blue', 'color')]
        private string $color,
        #[AlphaType('alpha_type')]
        private string $alpha_type,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'color' => $this->color,
            'alpha_type' => getOptionFromOptions($this->alpha_type, getImageAlphaOptions()),
        ];
    }
}