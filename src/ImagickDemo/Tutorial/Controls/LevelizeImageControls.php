<?php

declare(strict_types = 1);

namespace ImagickDemo\Tutorial\Controls;

use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\ComponentRangeFloat;
use ImagickDemo\Params\Gamma;

class LevelizeImageControls implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[ComponentRangeFloat(50, 'black_point')]
        private string $black_point,
        #[ComponentRangeFloat(100, 'white_point')]
        private string $white_point,
        #[Gamma(2.2, 'gamma')]
        private string $gamma,
    ) {
    }
}