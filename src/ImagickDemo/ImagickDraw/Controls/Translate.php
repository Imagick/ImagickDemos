<?php

declare(strict_types = 1);

namespace ImagickDemo\ImagickDraw\Controls;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\Params\StartX;
use ImagickDemo\Params\StartY;
use ImagickDemo\Params\EndX;
use ImagickDemo\Params\EndY;
use ImagickDemo\Params\TranslateX;
use ImagickDemo\Params\TranslateY;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;

class Translate implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[ImagickColorParam('rgb(225, 225, 225)', 'background_color')]
        private string $background_color,
        #[ImagickColorParam('rgb(0, 0, 0)', 'stroke_color')]
        private string $stroke_color,
        #[ImagickColorParam('DodgerBlue2', 'fill_color')]
        private string $fill_color,
        #[ImagickColorParam('LightCoral', 'fill_modified_color')]
        private string $fill_modified_color,
        #[StartX(50, 'start_x')]
        private string $start_x,
        #[StartY(50, 'start_y')]
        private string $start_y,
        #[EndX(400, 'end_x')]
        private string $end_x,
        #[EndY(400, 'end_y')]
        private string $end_y,
        #[TranslateX('translate_x')]
        private string $translate_x,
        #[TranslateY('translate_y')]
        private string $translate_y
    ) {
    }
}