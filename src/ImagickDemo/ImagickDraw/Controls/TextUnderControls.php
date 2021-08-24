<?php

declare(strict_types = 1);

namespace ImagickDemo\ImagickDraw\Controls;

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
        #[ImagickColorParam('rgb(225, 225, 225)', 'background_color')]
        private string $background_color,
        #[ImagickColorParam('rgb(0, 0, 0)', 'stroke_color')]
        private string $stroke_color,
        #[ImagickColorParam('DodgerBlue2', 'fill_color')]
        private string $fill_color,
        #[ImagickColorParam('LightCoral', 'text_under_color')]
        private string $text_under_color,
    ) {
    }
}