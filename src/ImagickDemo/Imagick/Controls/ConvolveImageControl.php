<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Bias;
use ImagickDemo\Params\ConvolveMatrix;


class ConvolveImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Image('image_path')]
        private string $image_path,
        #[Bias('bias')]
        private float $bias,
        #[ConvolveMatrix('convolve_matrix')]
        private array $convolve_matrix,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
            'bias' => $this->bias,
            'convolve_matrix' => $this->convolve_matrix
        ];
    }
}