<?php

declare(strict_types = 1);

namespace ImagickDemo\ImagickDraw\Params;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use ImagickDemo\Params\TextDecoration;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;

use Params\SafeAccess;

class TextUnderControls implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[ImagickColorParam('rgb(225, 225, 225)')]
        private string $background_color,
        #[ImagickColorParam('rgb(0, 0, 0)')]
        private string $stroke_color,
        #[ImagickColorParam('DodgerBlue2')]
        private string $fill_color,
        #[ImagickColorParam('LightCoral')]
        private string $text_under_color,
    ) {
    }
}