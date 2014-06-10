<?php

namespace ImagickDemo\Example;

class layerPSD extends \ImagickDemo\Example {
    
    function renderTitle() {
        return "";
    }

    function render() {
        $output = $this->renderDescription();
        $output .= $this->renderCustomImageURL();

        return $output;
    }

    function renderCustomImageURL() {
        return sprintf(
            "<img src='%s' />",
            '/customImage/Example/layerPSD'
        );
    }

    function renderDescription() {
        $output = <<< END
<p>
    When you have an image file that has multiple layers in it, it is possible to specify which layer you want to load by appending the image layer in square brackets after the file name e.g.
    </p>

<pre>
\$files = [
    realpath("../images/LayerTest.psd")."[1]",
    realpath("../images/LayerTest.psd")."[2]",
];
</pre>

<p>
Will load just layers 1 and 2 from the source PSD file
</p>



END;

        
        return $output;
    }


    
    

    function renderCustomImage() {
        $files = [
            realpath("../images/LayerTest.psd")."[1]",
            realpath("../images/LayerTest.psd")."[2]",
        ];

        $imagick = new \Imagick($files);
        $merged = @$imagick->flattenimages();
        $merged->setImageFormat('png');
        header("Content-Type: image/png");
        echo $merged->getImageBlob();
    }
//Example end
}