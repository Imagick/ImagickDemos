<?php

declare(strict_types = 1);

namespace ImagickDemo\ImagickDraw\Params;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\PaintType;

class MatteControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[PaintType()]
        private int $paint_type,
        #[ImagickColorParam('rgb(225, 225, 225)')]
        private string $background_color,
        #[ImagickColorParam('rgb(0, 0, 0)')]
        private string $stroke_color,
        #[ImagickColorParam('DodgerBlue2')]
        private string $fill_color
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'paint_type' => getOptionFromOptions($this->paint_type, getPaintTypeOptions()),
            'background_color'  => $this->background_color,
            'stroke_color' => $this->stroke_color,
            'fill_color' => $this->fill_color,
        ];
    }


    public function getPaintType(): int
    {
        return $this->paint_type;
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
