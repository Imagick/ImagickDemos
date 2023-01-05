<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\Params\ShearX;
use ImagickDemo\Params\ShearY;
use ImagickDemo\Params\Image;

class ShearImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[ImagickColorParam('pink', 'color')]
        private string $color,
        #[ShearX('shear_x')]
        private string $shear_x,
        #[ShearY('shear_y')]
        private string $shear_y,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }


    public function getValuesForForm(): array
    {
        return [
            'color' => $this->color,
            'shear_x' => $this->shear_x,
            'shear_y' => $this->shear_y,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}