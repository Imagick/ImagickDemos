<?php

namespace ImagickDemo\ImagickKernel;

class IndexExample extends \ImagickDemo\Example {

    function getColumnRightOffset() {
        return 2;
    }


    function renderTitle() {
        return "ImagickKernel";
    }
    
    function render() {
        $output = <<< END
<p>
        ImagickKernel is the class that represents 'kernel' in the underlying ImageMagick library,.</p>
        
        <p>
        The values in the kernel can be either:
<ul>
<li>float - </li>
<li>false - the pixel at this position should not be considered</li>
</ul>
        
        </p>  

END;

        return $output;
    }
}