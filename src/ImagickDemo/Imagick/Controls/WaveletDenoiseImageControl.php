<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Threshold;
use ImagickDemo\Params\ZeroOrAboveFloat;

class WaveletDenoiseImageControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Threshold(5, 'threshold')]
        private float $threshold,
        #[ZeroOrAboveFloat(1, 100, 'softness')]
        private float $softness,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'threshold' => $this->threshold,
            'softness' => $this->softness,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}