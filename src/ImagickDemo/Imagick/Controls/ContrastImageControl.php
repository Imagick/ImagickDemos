<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\ContrastType;

class ContrastImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Image('image_path')]
        private string $image_path,
        #[ContrastType('contrast_type')]
        private string $contrast_type,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'contrast_type' => getOptionFromOptions($this->contrast_type, getContrastOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}