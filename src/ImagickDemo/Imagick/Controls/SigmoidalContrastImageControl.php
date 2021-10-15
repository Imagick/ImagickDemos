<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Midpoint;
use ImagickDemo\Params\SigmoidalContrast;
use ImagickDemo\Params\Sharpening;

class SigmoidalContrastImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Sharpening('sharpening')]
        private string $sharpening,
        #[Midpoint('midpoint')]
        private string $midpoint,
        #[SigmoidalContrast(0.5, 'sigmoidal_contrast')]
        private string $sigmoidal_contrast,

        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'midpoint' => $this->midpoint,
            'sigmoidal_contrast' => $this->sigmoidal_contrast,
            'sharpening' => getOptionFromOptions($this->sharpening, getSharpeningOptions()),

            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}