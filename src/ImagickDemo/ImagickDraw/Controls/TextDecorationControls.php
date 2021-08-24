<?php

declare(strict_types = 1);

namespace ImagickDemo\ImagickDraw\Controls;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\TextDecoration;

class TextDecorationControls implements InputParameterList
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
        #[TextDecoration('text_decoration')]
        private int $text_decoration
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'text_decoration' => getOptionFromOptions($this->text_decoration, getTextDecorationOptions()),
            'background_color'  => $this->background_color,
            'stroke_color' => $this->stroke_color,
            'fill_color' => $this->fill_color,
        ];
    }

}