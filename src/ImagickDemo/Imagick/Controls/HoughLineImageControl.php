<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use DataType\DataType;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Radius;
use ImagickDemo\Params\Sigma;
use ImagickDemo\Params\UnitRange;
use ImagickDemo\Params\PositiveInt;
use ImagickDemo\Params\ComponentRangeFloat;

class HoughLineImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Radius(0.1, 'radius', 50)]
        private string $radius,
        #[Sigma(1, 'sigma')]
        private string $sigma,
        #[UnitRange(0.1, 'lower_percent')]
        private string $lower_percent,
        #[UnitRange(0.5, 'upper_percent')]
        private string $upper_percent,
        #[Image('image_path')]
        private string $image_path,
        #[PositiveInt(5, 1000, 'width')]
        private string $width,
        #[PositiveInt(5, 1000, 'height')]
        private string $height,
        #[ComponentRangeFloat(50, 'threshold')]
        private string $threshold,

    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'radius' => $this->radius,
            'sigma' => $this->sigma,
            'lower_percent' => $this->lower_percent,
            'upper_percent' => $this->upper_percent,
            'width' => $this->width,
            'height' => $this->height,
            'threshold' => $this->threshold,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}