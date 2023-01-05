<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\DistortionType;
use ImagickDemo\Params\Image;

class DistortImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[DistortionType('distortion_type')]
        private string $distortion_type,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'distortion_type' => getOptionFromOptions($this->distortion_type, getDistortionOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    public function getDistortionType(): string
    {
        return $this->distortion_type;
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}