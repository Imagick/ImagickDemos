<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\LayerMethodType;

class MergeImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[LayerMethodType('layer_method')]
        private string $layer_method,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'layer_method' => getOptionFromOptions($this->layer_method, getLayerMethodOptions()),
        ];
    }
}