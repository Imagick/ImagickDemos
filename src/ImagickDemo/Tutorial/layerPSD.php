<?php

namespace ImagickDemo\Tutorial;

class layerPSD extends \ImagickDemo\Example {
    
    function renderTitle() {
        return "";
    }


    function getCustomImageParams() {
        return $this->control->getParams();
    }


    function render() {
        $output = $this->renderDescription();
        $output .= $this->renderCustomImageURL();

        return $output;
    }

    function renderCustomImageURL() {
        return sprintf(
            "<img src='%s' />",
            $this->control->getCustomImageURL()
        );
    }

    function renderDescription() {
        $output = <<< END
<p>
    When you have an image file that has multiple layers in it, it is possible to specify which layer you want to load by appending the image layer in square brackets after the file name e.g.
    </p>

<pre>
\$files = [
    realpath("images/LayerTest.psd")."[1]",
    realpath("images/LayerTest.psd")."[2]",
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
            realpath("images/LayerTest.psd")."[1]",
            realpath("images/LayerTest.psd")."[2]",
        ];

        $imagick = new \Imagick($files);
        $merged = @$imagick->mergeImageLayers(\Imagick::LAYERMETHOD_COALESCE);
        $merged->setImageFormat('png');
        header("Content-Type: image/png");
        echo $merged->getimageblob();
    }
//Example end
}


//	const LAYERMETHOD_UNDEFINED = 0;
//	const LAYERMETHOD_COALESCE = 1;
//	const LAYERMETHOD_COMPAREANY = 2;
//	const LAYERMETHOD_COMPARECLEAR = 3;
//	const LAYERMETHOD_COMPAREOVERLAY = 4;
//	const LAYERMETHOD_DISPOSE = 5;
//	const LAYERMETHOD_OPTIMIZE = 6;
//	const LAYERMETHOD_OPTIMIZEPLUS = 8;
//	const LAYERMETHOD_OPTIMIZETRANS = 9;
//	const LAYERMETHOD_COMPOSITE = 12;
//	const LAYERMETHOD_OPTIMIZEIMAGE = 7;
//	const LAYERMETHOD_REMOVEDUPS = 10;
//	const LAYERMETHOD_REMOVEZERO = 11;