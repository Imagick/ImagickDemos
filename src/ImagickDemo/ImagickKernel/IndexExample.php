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
        ImagickKernel is the class that represents 'kernel' in the underlying ImageMagick library. Kernels are used in the <a href='/Imagick/filter'>filter</a> and <a href='/Imagick/morphology'>morphology</a> functions.</p>
        
<p>
The values in the kernel can be either:
<ul>
<li>float - the scaling value to be used against a pixel when the kernel is applied. Negative values are allowed.</li>
<li>false - the pixel at this position should not be considered in either the filter or morphology function.</li>
</ul>

Exactly how the values in a kernel are used depends on the morphology type being used.
        </p>  

END;

//        setImageArtifact("morphology:compose")
        return $output;
    }
}