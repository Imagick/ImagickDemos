<?php

declare(strict_types = 1);

namespace ImagickDemo\Tutorial\Controls;


use ImagickDemo\Params\FXAnalyzeOption;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;

class FXAnalyzeControls implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[FXAnalyzeOption('fx_analyze_option')]
        private string $fx_analyze_option
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'fx_analyze_option' => getOptionFromOptions($this->fx_analyze_option, getFXAnalyzeOptions()),
        ];
    }

    /**
     * @return string
     */
    public function getFxAnalyzeOption(): string
    {
        return $this->fx_analyze_option;
    }
}