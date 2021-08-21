<?php

declare(strict_types = 1);

namespace ImagickDemo\ImagickDraw\Controls;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

use ImagickDemo\Params\AngleRange;
use ImagickDemo\Params\StartX;
use ImagickDemo\Params\StartY;
use ImagickDemo\Params\EndX;
use ImagickDemo\Params\EndY;


class ArcControls implements InputParameterList
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

        #[StartY(50, 'start_x')]
        private float $start_x,
        #[StartY(50, 'start_y')]
        private float $start_y,
        #[EndX(400, 'end_x')]
        private float $end_x,
        #[EndY(400, 'end_y')]
        private float $end_y,

        #[AngleRange(0, 'start_angle')]
        private float $start_angle,
        #[AngleRange(270, 'end_angle')]
        private float $end_angle,
    ) {
    }

    public function getBackgroundColor(): string
    {
        return $this->background_color;
    }

    public function getStrokeColor(): string
    {
        return $this->stroke_color;
    }

    public function getFillColor(): string
    {
        return $this->fill_color;
    }
}