<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use DataType\DataType;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Radius;
use ImagickDemo\Params\Sigma;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\ZeroOrAboveFloat;

class BilateralBlurImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Radius(10, 'radius')]
        private float $radius,
        #[Sigma(3, 'sigma')]
        private float $sigma,
        #[ZeroOrAboveFloat(30, 100, 'intensity_sigma')]
        private float $intensity_sigma,
        #[ZeroOrAboveFloat(30, 100, 'spatial_sigma')]
        private float $spatial_sigma,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'radius' => $this->radius,
            'sigma' => $this->sigma,
            'intensity_sigma' => $this->intensity_sigma,
            'spatial_sigma' => $this->spatial_sigma,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}