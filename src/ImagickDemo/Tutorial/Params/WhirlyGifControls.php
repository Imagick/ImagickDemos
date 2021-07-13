<?php

declare(strict_types = 1);

namespace ImagickDemo\Tutorial\Params;

use ImagickDemo\Params\BackgroundColorChoice;
use ImagickDemo\Params\LoopTime;
use ImagickDemo\Params\NumberDots;
use ImagickDemo\Params\NumberFrames;
use ImagickDemo\Params\PhaseDivider;
use ImagickDemo\Params\PhaseMultiplier;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;


class WhirlyGifControls implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[BackgroundColorChoice()]
        private string $background_color,
        #[NumberDots()]
        private $numberDots,
        #[NumberFrames()]
        private $numberFrames,
        #[LoopTime()]
        private $loopTime,
        #[PhaseMultiplier()]
        private $phaseMultiplier,
        #[PhaseDivider()]
        private $phaseDivider,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'background_color' => getOptionFromOptions($this->background_color, getBackgroundColorChoiceOptions()),
            "numberDots" => $this->numberDots,
            "numberFrames" => $this->numberFrames,
            "loopTime" => $this->loopTime,
            "phaseMultiplier" => $this->phaseMultiplier,
            "phaseDivider" => $this->phaseDivider,
        ];
    }
}