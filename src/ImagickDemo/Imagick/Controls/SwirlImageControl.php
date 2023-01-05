<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use DataType\DataType;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;

use ImagickDemo\Params\Channel;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Radius;
use ImagickDemo\Params\Swirl;

class SwirlImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Swirl('swirl')]
        private string $swirl,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'swirl' => $this->swirl,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    /**
     * @return string
     */
    public function getSwirl(): string
    {
        return $this->swirl;
    }



    public function getImagePath(): string
    {
        return $this->image_path;
    }
}