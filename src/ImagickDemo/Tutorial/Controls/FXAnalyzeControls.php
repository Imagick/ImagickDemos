<?php

declare(strict_types = 1);

namespace ImagickDemo\Tutorial\Controls;


use ImagickDemo\Params\FXAnalyzeOption;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

class FXAnalyzeControls implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

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