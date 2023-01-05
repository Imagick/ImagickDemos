<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use DataType\DataType;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;

use ImagickDemo\Params\CanvasType;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Radius;
use ImagickDemo\Params\Sigma;

class NewPseudoImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[CanvasType('canvas_type')]
        private string $canvas_type,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'canvas_type' => getOptionFromOptions($this->canvas_type, getCanvasOptions()),
        ];
    }
}