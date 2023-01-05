<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\AlphaType;
use ImagickDemo\Params\MatteType;

class SetImageMatteControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[MatteType('matte_enabled')]
        private string $matte_enabled,
        #[AlphaType('alpha_type')]
        private string $alpha_type,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'matte_enabled' => getOptionFromOptions($this->matte_enabled, getMatteOptions()),
            'alpha_type' => getOptionFromOptions($this->alpha_type, getImageAlphaOptions()),
        ];
    }
}