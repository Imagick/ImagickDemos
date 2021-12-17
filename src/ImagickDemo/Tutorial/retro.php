<?php

namespace ImagickDemo\Tutorial;

use ImagickDemo\Tutorial\Controls\RetroControls;

class retro extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "retro";
    }

    public function renderDescription()
    {
        $text = <<< END
retro generator
END;

        return nl2br($text);
    }

    public static function getParamType(): string
    {
        return RetroControls::class;
    }
}
