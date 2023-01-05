<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Amplitude;
use ImagickDemo\Params\Length;

class WaveImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Amplitude('amplitude')]
        private string $amplitude,
        #[Length('length')]
        private string $length,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'amplitude' => $this->amplitude,
            'length' => $this->length,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}