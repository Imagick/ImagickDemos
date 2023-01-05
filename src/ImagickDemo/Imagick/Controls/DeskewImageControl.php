<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\SafeAccess;
use ImagickDemo\Params\ComponentRangeFloat;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;

class DeskewImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[ComponentRangeFloat(0.5, 'threshold')]
        private string $threshold,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'threshold' => $this->threshold,
        ];
    }
}