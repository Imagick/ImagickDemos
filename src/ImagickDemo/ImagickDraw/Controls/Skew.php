<?php

declare(strict_types = 1);

namespace ImagickDemo\ImagickDraw\Controls;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\Params\StartX;
use ImagickDemo\Params\StartY;
use ImagickDemo\Params\EndX;
use ImagickDemo\Params\EndY;
use ImagickDemo\Params\SkewAmount;


use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

class Skew implements InputParameterList
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
        #[StartX(50, 'start_x')]
        private string $startX,
        #[StartY(50, 'start_y')]
        private string $startY,
        #[EndX(400, 'end_x')]
        private string $endX,
        #[EndY(400, 'end_y')]
        private string $endY,
        #[SkewAmount('skew')]
        private string $skew
    ) {
    }
}