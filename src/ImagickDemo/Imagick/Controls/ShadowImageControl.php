<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use DataType\DataType;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;

use ImagickDemo\Params\Channel;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Radius;
use ImagickDemo\Params\Sigma;
use ImagickDemo\Params\X;
use ImagickDemo\Params\Y;
use ImagickDemo\Params\UnitRange;


class ShadowImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[X('x')]
        private string $x,
        #[Y('y')]
        private string $y,
        #[Sigma(1, 'sigma')]
        private string $sigma,
        #[UnitRange(0.5, 'opacity')]
        private string $opacity,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'x' => $this->x,
            'y' => $this->y,
            'opacity' => $this->opacity,
            'sigma' => $this->sigma,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}