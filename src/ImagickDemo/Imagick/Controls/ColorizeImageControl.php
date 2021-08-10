<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\Image;

class ColorizeImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Image('image_path')]
        private string $image_path,
        #[ImagickColorParam('rgb(255, 255, 0)', 'color')]
        private string $color,
        #[ImagickColorParam('rgb(127, 127, 127)', 'opacity_color')]
        private string $opacity_color,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'color' => $this->color,
            'opacity_color' => $this->opacity_color,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}