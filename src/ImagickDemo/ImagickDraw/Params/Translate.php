<?php

declare(strict_types = 1);

namespace ImagickDemo\ImagickDraw\Params;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\Params\StartX;
use ImagickDemo\Params\StartY;
use ImagickDemo\Params\EndX;
use ImagickDemo\Params\EndY;
use ImagickDemo\Params\TranslateX;
use ImagickDemo\Params\TranslateY;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

class Translate implements InputParameterList
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
        private string $fill_modified_color,
        #[StartX]
        private string $startX,
        #[StartY]
        private string $startY,
        #[EndX]
        private string $endX,
        #[EndY]
        private string $endY,
        #[TranslateX]
        private string $translate_x,
        #[TranslateY]
        private string $translate_y
    ) {
    }
}