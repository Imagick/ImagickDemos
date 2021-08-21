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
use ImagickDemo\Params\OriginX;
use ImagickDemo\Params\OriginY;
use ImagickDemo\Params\EndX;
use ImagickDemo\Params\EndY;


class CircleControls implements InputParameterList
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

        #[OriginX(250, 'origin_x')]
        private float $origin_x,
        #[OriginY(250, 'origin_y')]
        private float $origin_y,
        #[EndX(400, 'end_x')]
        private float $end_x,
        #[EndY(400, 'end_y')]
        private float $end_y,

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