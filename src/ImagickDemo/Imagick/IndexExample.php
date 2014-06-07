<?php

namespace ImagickDemo\Imagick;

class IndexExample extends \ImagickDemo\Example {

    function renderTitle() {
        return "Imagick";
    }

    function render() {
        $output = <<< END
            <p>This is the Imagick index.</p>

        <p>
        Please choose an example from the list.
        </p>
        

END;
  
            
        return $output;
    }

    function renderImage() {
    }
}