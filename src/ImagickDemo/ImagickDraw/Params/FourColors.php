<?php

declare(strict_types = 1);

namespace ImagickDemo\ImagickDraw\Params;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

class FourColors implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[ImagickColorParam('rgb(225, 225, 225)', 'background_color')]
        private string $background_color,
        #[ImagickColorParam('rgb(0, 0, 0)', 'stroke_color')]
        private string $stroke_color,
        #[ImagickColorParam('DodgerBlue2', 'fill_color')]
        private string $fill_color,
        #[ImagickColorParam('LightCoral', 'fill_modified_color')]
        private string $fill_modified_color,
    ) {
    }
}