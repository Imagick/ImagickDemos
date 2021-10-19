<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\RotationAngle;
use Params\Create\CreateFromVarMap;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

class RotationalBlurImageControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[RotationAngle('rotation_angle')]
        private string $rotation_angle,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'rotation_angle' => $this->rotation_angle,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    /**
     * @return string
     */
    public function getRotationAngle(): string
    {
        return $this->rotation_angle;
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}