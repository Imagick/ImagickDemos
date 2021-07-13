<?php

declare(strict_types = 1);

namespace ImagickDemo\Tutorial\Params;

use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\ComponentRangeFloat;
use ImagickDemo\Params\Gamma;

class LevelizeImageControls implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[ComponentRangeFloat(50)]
        private string $black_point,
        #[ComponentRangeFloat(100)]
        private string $white_point,
        #[Gamma()]
        private string $gamma,
    ) {
    }
}