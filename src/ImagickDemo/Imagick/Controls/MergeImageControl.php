<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\LayerMethodType;

class MergeImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

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