<?php

namespace ImagickDemo\Tutorial;

class IndexExample extends \ImagickDemo\Example {
    
    function renderTitle() {
        return "Tutorial";
    }
    
    function render() {

        $output = <<< END
<p>
    The examples in this section are a selection of examples with more advanced behaviour, that show either how simple Imagick functions can be used together to make images, or other topic that don't are easily demonstrateable inside a simple function.
</p>


END;

        
        
        return $output;
    }
}