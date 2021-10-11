<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

use ImagickDemo\Params\CanvasType;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Radius;
use ImagickDemo\Params\Sigma;

class NewPseudoImageControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[CanvasType('canvas_type')]
        private string $canvas_type,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'canvas_type' => getOptionFromOptions($this->canvas_type, getCanvasOptions()),
        ];
    }
}