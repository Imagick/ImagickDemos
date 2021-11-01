<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\ZeroOrAboveFloat;

class RangeThresholdImageControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[ZeroOrAboveFloat(0.2, 100, 'low_black')]
        private float $low_black,
        #[ZeroOrAboveFloat(0.7, 100, 'low_white')]
        private float $low_white,
        #[ZeroOrAboveFloat(0.8, 100, 'high_white')]
        private float $high_white,
        #[ZeroOrAboveFloat(0.9, 100, 'high_black')]
        private float $high_black,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'low_black' => $this->low_black,
            'low_white' => $this->low_white,
            'high_white' => $this->high_white,
            'high_black' => $this->high_black,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}