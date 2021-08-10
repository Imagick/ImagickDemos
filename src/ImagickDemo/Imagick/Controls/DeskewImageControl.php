<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\SafeAccess;
use ImagickDemo\Params\ComponentRangeFloat;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;

class DeskewImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

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