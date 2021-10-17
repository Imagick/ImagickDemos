<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

use ImagickDemo\Params\Threshold;
use ImagickDemo\Params\Image;

class LinearStretchImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Threshold(0.2, 'black_threshold')]
        private string $black_threshold,
        #[Threshold(0.8, 'white_threshold')]
        private string $white_threshold,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'black_threshold' => $this->black_threshold,
            'white_threshold' => $this->white_threshold,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}