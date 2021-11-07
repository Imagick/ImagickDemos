<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\ComplexOperatorType;

class ComplexImagesControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

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