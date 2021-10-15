<?php

namespace ImagickDemo\Tutorial;

use ImagickDemo\Tutorial\Controls\WhirlyGifControls;

class whirlyGif extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Whirly gif generation";
    }

    public function renderDescription()
    {
        $output = "
Rendering animated gifs that loop is fun!
        
Top-tip, you probably want 'Integer of dots' % 'Phase divider' to be zero.";

        return nl2br($output);
    }
    
    public function render()
    {
        return $this->renderImageURL();
    }

    public static function getParamType(): string
    {
        return WhirlyGifControls::class;
    }
}
