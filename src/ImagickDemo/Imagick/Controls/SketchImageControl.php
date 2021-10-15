<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\Params\Radius;
use ImagickDemo\Params\Sigma;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Angle;
use ImagickDemo\Params\SigmoidalContrast;
use ImagickDemo\Params\Sharpening;

class SketchImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Radius('radius')]
        private string $radius,
        #[Sigma(4, 'sigma')]
        private string $sigma,
        #[Angle('angle')]
        private string $angle,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'radius' => $this->radius,
            'sigma' => $this->sigma,
            'angle' => $this->angle,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}