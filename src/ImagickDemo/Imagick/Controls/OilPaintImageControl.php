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

class OilPaintImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Radius(5, 'radius')]
        private string $radius,
        #[Sigma(1, 'sigma')]
        private string $sigma,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'radius' => $this->radius,
            'sigma' => $this->sigma,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    public function getRadius(): string
    {
        return $this->radius;
    }

    public function getSigma(): string
    {
        return $this->sigma;
    }

    public function getChannel(): string
    {
        return $this->channel;
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}