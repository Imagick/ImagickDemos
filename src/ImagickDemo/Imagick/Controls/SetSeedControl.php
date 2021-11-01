<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Radius;
use ImagickDemo\Params\Sigma;
use ImagickDemo\Params\UnitRange;
use ImagickDemo\Params\PositiveInt;
use ImagickDemo\Params\ComponentRangeFloat;

class SetSeedControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[PositiveInt(1, 100000, 'seed')]
        private string $seed,

    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'seed' => $this->seed,
        ];
    }
}