<?php

namespace ImagickDemo\Tutorial;

class fxAnalyzeImage extends \ImagickDemo\Example
{
    public function renderDescription()
    {

        $output = <<< END
Gradients are key to producing complicated effects in Imagick.

However it is not very easily to visualise exactly what is happening in them, as 
your eyes are just not very good at comparing shades of gray.

The code below takes a gradient and produces an easy to visualise graph from the gradient. 

END;

        return nl2br($output);
    }

    public function render()
    {
        return $this->renderCustomImageURL();
    }

    public function renderCustomImage($fxAnalyzeExample)
    {
        $methods = [
            'example1' => 'example1',
            'example2' => 'example2',
            'example3' => 'example3',
            'example4' => 'example4',
        ];

        if (array_key_exists($fxAnalyzeExample, $methods) == false) {
            throw new \Exception("Unknown fxanalyze example $fxAnalyzeExample");
        }

        $method = $methods[$fxAnalyzeExample];
        $this->{$method}();
    }

//Example Tutorial::fxAnalyzeImage
    public function example1()
    {
        $graphWidth = 256;
        $imagick = new \Imagick();
        $imagick->newPseudoImage($graphWidth, 1, 'gradient:black-white');
        $arguments = array(9, -90);
        $imagick->functionImage(\Imagick::FUNCTION_SINUSOID, $arguments);
        fxAnalyzeImage($imagick);
    }
//Example end

//Example Tutorial::fxAnalyzeImage
    public function example2()
    {
        $graphWidth = 256;
        $imagick = new \Imagick();
        $imagick->newPseudoImage($graphWidth, 1, 'gradient:black-white');
        fxAnalyzeImage($imagick);
    }
//Example end

//Example Tutorial::fxAnalyzeImage
    public function example3()
    {
        $graphWidth = 256;
        $imagick = new \Imagick();
        $imagick->newPseudoImage($graphWidth, 1, 'gradient:black-white');
        $imagick->gammaimage(2);
        fxAnalyzeImage($imagick);
    }
//Example end

//Example Tutorial::fxAnalyzeImage
    public function example4()
    {
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
