<?php


namespace ImagickDemo\Tutorial;


class whirlyGif extends \ImagickDemo\Example {

    function renderDescription() {
        $output = "
Rendering animated gifs that loop is fun!
        
Top-tip, you probably want 'Number of dots' % 'Phase divider' to be zero.";

        return nl2br($output);
    }
    
    function render() {
        return $this->renderImageURL();
    }

}