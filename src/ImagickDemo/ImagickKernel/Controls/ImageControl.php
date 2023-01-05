<?php

declare(strict_types = 1);

namespace ImagickDemo\ImagickKernel\Controls;

use ImagickDemo\Params\Image;

use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;

class ImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Image('image_path')]
        private string $image_path
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}