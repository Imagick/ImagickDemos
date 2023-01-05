<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use DataType\DataType;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\PositiveInt;
use ImagickDemo\Params\ZeroOrAboveFloat;

class KmeansImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[PositiveInt(32, 1024, 'number_colors')]
        private float $number_colors,
        #[PositiveInt(8, 512,  'max_iterations')]
        private float $max_iterations,
        #[ZeroOrAboveFloat(10, 100, 'tolerance')]
        private float $tolerance,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'number_colors' => $this->number_colors,
            'max_iterations' => $this->max_iterations,
            'tolerance' => $this->tolerance,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}