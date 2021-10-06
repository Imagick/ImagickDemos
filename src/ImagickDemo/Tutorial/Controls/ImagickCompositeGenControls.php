<?php

declare(strict_types = 1);

namespace ImagickDemo\Tutorial\Controls;

//use ImagickDemo\Params\BlendMidpoint;
use ImagickDemo\Params\UnitRange;
use ImagickDemo\Params\Contrast;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;


class ImagickCompositeGenControls implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Contrast(10, 'contrast')]
        private string $contrast,
        #[UnitRange(0.5, 'blend_midpoint')]
        private string $blendMidpoint,
    ) {
    }
}