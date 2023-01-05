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

class ClaheImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[PositiveInt(10, 50, 'width')]
        private float $width,
        #[PositiveInt(10, 50,  'height')]
        private float $height,
        #[PositiveInt(32, 256,  'number_bins')]
        private float $number_bins,
        #[ZeroOrAboveFloat(100, 10000, 'clip_limit')]
        private float $clip_limit,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'width' => $this->width,
            'height' => $this->height,
            'number_bins' => $this->number_bins,
            'clip_limit' => $this->clip_limit,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}