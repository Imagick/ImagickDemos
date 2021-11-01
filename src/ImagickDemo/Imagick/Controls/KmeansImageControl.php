<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\PositiveInt;
use ImagickDemo\Params\ZeroOrAboveFloat;

class KmeansImageControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

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