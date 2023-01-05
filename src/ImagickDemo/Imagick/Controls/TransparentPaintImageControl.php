<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\UnitRange;
use ImagickDemo\Params\Inverse;
use \ImagickDemo\Params\Alpha;

class TransparentPaintImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[UnitRange(0.1, 'fuzz')]
        private string $fuzz,
        #[ImagickColorParam('rgb(255, 193, 59)', 'color')]
        private string $color,
        #[Alpha('alpha')]
        private string $alpha,
        #[Inverse('inverse')]
        private string $inverse,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'fuzz' => $this->fuzz,
            'color' => $this->color,
            'alpha' => $this->alpha,
            'inverse' => getOptionFromOptions($this->inverse, getInverseOptions()),
        ];
    }
}