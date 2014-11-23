<?php

namespace ImagickDemo\Tutorial;


class fxAnalyzeImage extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\CompositeExampleControl
     */
    private $fxAnalyzeControl;

    function __construct(\ImagickDemo\Control\FXAnalyze $fxAnalyzeControl) {
        $this->fxAnalyzeControl = $fxAnalyzeControl;
    }

    function renderDescription() {

        $output = <<< END
Gradients are key to producing complicated effects in Imagick.

However it is not very easily to visualise exactly what is happening in them, as your eyes are just not very good at comparing shades of gray.

The code below takes a gradient and produces an easy to visualise graph from the gradient. 

END;

        
        return nl2br($output);
    }
    
    function render() {
        return sprintf(
            "<img src='%s' />",
            $this->fxAnalyzeControl->getCustomImageURL()
        );
    }

    function renderCustomImage() {
        $methods = [
            'example1' => 'example1',
            'example2' => 'example2',
            'example3' => 'example3',
            'example4' => 'example4',
        ];

        $customImage  = $this->fxAnalyzeControl->getCompositeExampleType();

        if (array_key_exists($customImage, $methods) == false) {
            throw new \Exception("Unknown fxanalyze example $customImage");
        }

        $method = $methods[$customImage];
        $this->{$method}();
    }

//Example Tutorial::fxAnalyzeImage
    function example1() {
        $graphWidth = 256; 
        $imagick = new \Imagick();
        $imagick->newPseudoImage($graphWidth, 1, 'gradient:black-white');
        $arguments = array(9, -90);
        $imagick->functionImage(\Imagick::FUNCTION_SINUSOID, $arguments);
        fxAnalyzeImage($imagick);
    }
//Example end

//Example Tutorial::fxAnalyzeImage
    function example2() {
        $graphWidth = 256;
        $imagick = new \Imagick();
        $imagick->newPseudoImage($graphWidth, 1, 'gradient:black-white');
        fxAnalyzeImage($imagick);
    }
//Example end

//Example Tutorial::fxAnalyzeImage
    function example3() {
        $graphWidth = 256;
        $imagick = new \Imagick();
        $imagick->newPseudoImage($graphWidth, 1, 'gradient:black-white');
        $imagick->gammaimage(2);
        fxAnalyzeImage($imagick);
    }
//Example end

//Example Tutorial::fxAnalyzeImage
    function example4() {
        $graphWidth = 256;
        $imagick = new \Imagick();
        $imagick->newPseudoImage($graphWidth, 1, 'gradient:black-white');
        $arguments = array(9, -90);
        $imagick->functionImage(\Imagick::FUNCTION_SINUSOID, $arguments);
        $fx = "(1.0/(1.0+exp(10.0*(0.5-u)))-0.006693)*1.0092503";
        $fxImage = $imagick->fxImage($fx);
        fxAnalyzeImage($fxImage);
    }
//Example end
}