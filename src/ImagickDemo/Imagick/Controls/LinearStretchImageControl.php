<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;

use ImagickDemo\Params\Threshold;
use ImagickDemo\Params\Image;

class LinearStretchImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Threshold(0.2, 'black_threshold')]
        private string $black_threshold,
        #[Threshold(0.8, 'white_threshold')]
        private string $white_threshold,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'black_threshold' => $this->black_threshold,
            'white_threshold' => $this->white_threshold,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}