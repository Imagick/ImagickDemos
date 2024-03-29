<?php

namespace ImagickDemo\Tutorial;

class psychedelicFont extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Psychedelic font";
    }

    public function renderDescription()
    {
        $output = <<< END
Rendering a peice of text, starting with a large stroke width and gradually 
reducing the stroke width can produces a pleasing visual effect. 
END;

        return nl2br($output);
    }


}
