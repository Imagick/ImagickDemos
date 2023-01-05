<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;

use ImagickDemo\Params\Dither;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\ColorSpace;
use ImagickDemo\Params\NumberColors;
use ImagickDemo\Params\TreeDepth;

class QuantizeImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[ColorSpace('colorspace')]
        private string $colorspace,
        #[NumberColors('number_colors')]
        private string $number_colors,
        #[TreeDepth('tree_depth')]
        private string $tree_depth,
        #[Dither('dither')]
        private string $dither,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'colorspace' => getOptionFromOptions($this->colorspace, getColorSpaceOptions()),
            'number_colors' => $this->number_colors,
            'tree_depth' => $this->tree_depth,
            'dither' => getOptionFromOptions($this->dither, getDitherOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}