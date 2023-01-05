<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Height;
use ImagickDemo\Params\Width;
use ImagickDemo\Params\Image;

class SingleColorControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[ImagickColorParam('rgb(127, 127, 127)', 'color')]
        private string $color,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'color' => $this->color,
        ];
    }
}