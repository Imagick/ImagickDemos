<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\Params\Channel;
use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\UnitRange;
use ImagickDemo\Params\Inverse;
use ImagickDemo\Params\PictureX;
use ImagickDemo\Params\PictureY;



class FloodFillPaintImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[UnitRange(0.1, 'fuzz')]
        private string $fuzz,
        #[PictureX(20, 'x')]
        private string $x,
        #[PictureY(20, 'y')]
        private string $y,

        #[ImagickColorParam('rgb(58, 192, 255)', 'target_color')]
        private string $target_color,
        #[ImagickColorParam('rgb(128, 0, 0)', 'fill_color')]
        private string $fill_color,
        #[Channel('channel')]
        private string $channel,
        #[Inverse('inverse')]
        private string $inverse,
    ) {
    }


    public function getValuesForForm(): array
    {
        return [
            'fuzz' => $this->fuzz,
            'x' => $this->x,
            'y' => $this->y,
            'fill_color' => $this->fill_color,
            'target_color' => $this->target_color,
            'channel' => getOptionFromOptions($this->channel, getChannelOptions()),
            'inverse' => getOptionFromOptions($this->inverse, getInverseOptions()),
        ];
    }
}