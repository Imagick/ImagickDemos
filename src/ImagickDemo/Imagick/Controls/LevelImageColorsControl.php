<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\Params\Inverse;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Height;
use ImagickDemo\Params\Width;
use ImagickDemo\Params\Image;

class LevelImageColorsControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[ImagickColorParam('rgb(10, 10, 10)', 'black_color')]
        private string $black_color,
        #[ImagickColorParam('rgb(230, 230, 230)', 'white_color')]
        private string $white_color,
        #[Inverse('invert')]
        private string $invert,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
            'black_color' => $this->black_color,
            'invert' => getOptionFromOptions($this->invert, getInverseOptions()),
            'white_color' => $this->white_color,
        ];
    }
}