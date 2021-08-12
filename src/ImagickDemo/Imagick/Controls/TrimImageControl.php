<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\UnitRange;

class TrimImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[UnitRange(0.1, 'fuzz')]
        private string $fuzz,
        #[ImagickColorParam('rgb(39, 194, 255)', 'color')]
        private string $color,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'fuzz' => $this->fuzz,
            'color' => $this->color,
        ];
    }
}