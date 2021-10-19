<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

use ImagickDemo\Params\Channel;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Saturation;
use ImagickDemo\Params\Brightness;
use ImagickDemo\Params\Hue;

class ModulateImageControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Brightness('brightness')]
        private string $brightness,
        #[Saturation('saturation')]
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