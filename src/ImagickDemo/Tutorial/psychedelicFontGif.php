<?php

namespace ImagickDemo\Tutorial;

class psychedelicFontGif extends \ImagickDemo\Example {


    function renderDescription() {

        $output = <<< END
Rendering a peice of text, starting with a large stroke width and gradually reducing the stroke width can produces a pleasing visual effect.

And animating it makes it look a little bit even more awesome.
END;

        return nl2br($output);
    }

    function render() {
        return $this->renderImageURL();
    }
}