<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\ComplexOperatorType;

class ComplexImagesControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[ComplexOperatorType('complex_operator')]
        private string $complex_operator,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'complex_operator' => getOptionFromOptions($this->complex_operator, getComplexOperatorOptions()),
        ];
    }
}