<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;

use ImagickDemo\Params\Image;
use ImagickDemo\Params\ComponentRangeFloat;
use ImagickDemo\Params\X;
use ImagickDemo\Params\Y;

class VignetteImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[ComponentRangeFloat(10, 'black_point')]
        private string $black_point,
        #[ComponentRangeFloat(10, 'white_point')]
        private string $white_point,
        #[X('x')]
        private string $x,
        #[Y('y')]
        private string $y,
        #[Image('image_path')]
        private string $image_path
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'black_point' => $this->black_point,
            'white_point' => $this->white_point,
            'x' => $this->x,
            'y' => $this->y,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}