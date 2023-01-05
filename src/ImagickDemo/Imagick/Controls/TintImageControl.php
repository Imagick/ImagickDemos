<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Image;

use ImagickDemo\Params\R;
use ImagickDemo\Params\G;
use ImagickDemo\Params\B;
use ImagickDemo\Params\A;

class TintImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[R('r')]
        private string $r,
        #[G('g')]
        private string $g,
        #[B('b')]
        private string $b,
        #[A('a')]
        private string $a,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'r' => $this->r,
            'g' => $this->g,
            'b' => $this->b,
            'a' => $this->a,
        ];
    }
}