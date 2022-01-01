<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\Params\InterpolateType;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

use ImagickDemo\Params\Image;
use ImagickDemo\Params\Swirl;

class SwirlImageWithMethodControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Swirl('swirl')]
        private string $swirl,
        #[InterpolateType('interpolate_method')]
        private int $interpolate_method,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'swirl' => $this->swirl,
            'interpolate_method' => getOptionFromOptions($this->interpolate_method, getInterpolateOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}