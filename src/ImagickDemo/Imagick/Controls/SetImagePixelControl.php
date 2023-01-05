<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Count;

class SetImagePixelControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Count(10, 1, 50000, 'count')]
        private string $count,
        #[ImagickColorParam('rgb(127, 127, 127)', 'color')]
        private string $color,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'count' => $this->count,
            'color' => $this->color,
        ];
    }
}