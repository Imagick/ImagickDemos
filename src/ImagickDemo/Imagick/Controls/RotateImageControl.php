<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Crop;
use ImagickDemo\Params\Sigma;
use ImagickDemo\Params\Angle;
//$image_path, $angle, $color, $crop

class RotateImageControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Angle('angle')]
        private string $angle,
        #[Crop('crop')]
        private string $crop,
        #[ImagickColorParam('red', 'color')]
        private string $color,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'angle' => $this->angle,
            'color' => $this->color,
            'crop' => getOptionFromOptions($this->crop, getCropOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}