<?php

declare(strict_types = 1);

namespace ImagickDemo\Tutorial\Controls;

use ImagickDemo\Params\BackgroundColorChoice;
use ImagickDemo\Params\LoopTime;
use ImagickDemo\Params\NumberDots;
use ImagickDemo\Params\NumberFrames;
use ImagickDemo\Params\PhaseDivider;
use ImagickDemo\Params\PhaseMultiplier;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;

class WhirlyGifControls implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[BackgroundColorChoice('background_color')]
        private string $background_color,
        #[NumberDots('number_dots')]
        private $numberDots,
        #[NumberFrames('number_frames')]
        private $numberFrames,
        #[LoopTime('loop_time')]
        private $loopTime,
        #[PhaseMultiplier('phase_multiplier')]
        private $phaseMultiplier,
        #[PhaseDivider('phase_divider')]
        private $phaseDivider,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'background_color' => getOptionFromOptions($this->background_color, getBackgroundColorChoiceOptions()),
            "number_dots" => $this->numberDots,
            "number_frames" => $this->numberFrames,
            "loop_time" => $this->loopTime,
            "phase_multiplier" => $this->phaseMultiplier,
            "phase_divider" => $this->phaseDivider,
        ];
    }
}