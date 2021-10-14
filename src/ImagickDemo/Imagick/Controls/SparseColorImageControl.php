<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

use ImagickDemo\Params\Channel;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Radius;
use ImagickDemo\Params\SparseColorType;

class SparseColorImageControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
//        #[Radius('radius')]
//        private string $radius,
//        #[Sigma('sigma')]
//        private string $sigma,
        #[SparseColorType('sparse_color_type')]
        private string $sparseColorType,

    ) {
    }

    public function getValuesForForm(): array
    {
        return [
//            'radius' => $this->radius,
//            'sigma' => $this->sigma,
            'sparse_color_type' => getOptionFromOptions($this->sparseColorType, getSparseColorOptions()),
        ];
    }

    /**
     * @return string
     */
    public function getSparseColorType(): string
    {
        return $this->sparseColorType;
    }
}