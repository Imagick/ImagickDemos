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
use ImagickDemo\Params\SaturationForModulate;
use ImagickDemo\Params\BrightnessForModulate;
use ImagickDemo\Params\Hue;

class ModulateImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[BrightnessForModulate('brightness')]
        private string $brightness,
        #[SaturationForModulate('saturation')]
        private string $saturation,
        #[Hue('hue')]
        private string $hue,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'hue' => $this->hue,
            'brightness' => $this->brightness,
            'saturation' => $this->saturation,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}