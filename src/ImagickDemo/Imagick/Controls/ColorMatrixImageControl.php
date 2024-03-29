<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\ColorMatrix;

class ColorMatrixImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[ColorMatrix('color_matrix')]
        private array $color_matrix,
        #[Image('image_path')]
        private string $image_path,
    ) {

    }

    public function getValuesForForm(): array
    {
        return [
            'color_matrix' => $this->color_matrix,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    /**
     * @return array
     */
    public function getColorMatrix(): array
    {
        return $this->color_matrix;
    }

    /**
     * @return string
     */
    public function getImagePath(): string
    {
        return $this->image_path;
    }


}