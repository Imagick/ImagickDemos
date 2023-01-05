<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Sepia;
use ImagickDemo\Params\Implode;

class ImplodeImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Implode('implode')]
        private string $implode,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'implode' => $this->implode,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    /**
     * @return string
     */
    public function getImagePath(): string
    {
        return $this->image_path;
    }
}