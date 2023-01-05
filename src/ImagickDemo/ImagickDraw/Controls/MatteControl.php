<?php

declare(strict_types = 1);

namespace ImagickDemo\ImagickDraw\Controls;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\PaintType;
use DataType\DataType;

class MatteControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[PaintType('paint_type')]
        private int $paint_type,
        #[ImagickColorParam('rgb(225, 225, 225)', 'background_color')]
        private string $background_color,
        #[ImagickColorParam('rgb(0, 0, 0)', 'stroke_color')]
        private string $stroke_color,
        #[ImagickColorParam('DodgerBlue2', 'fill_color')]
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
