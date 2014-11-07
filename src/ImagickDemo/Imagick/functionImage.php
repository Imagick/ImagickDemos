<?php

namespace ImagickDemo\Imagick;


class functionImage extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\ImagickFunctionControl
     */
    private $functionControl;


    function __construct(\ImagickDemo\Control\ImagickFunctionControl $control) {
        $this->functionControl = $control;
    }


    function getCustomImageParams() {
        return $this->functionControl->getParams();
    }

    function renderDescription() {
        
        $output = <<< END

FUNCTION_POLYNOMIAL 

Each value will be used as a coefficient from the highest order to the lowest, to produce a polynomial with the number of terms given.
 
f1.x + f2

f1.x^3 + f2.x^2 + f3.x + f4
 

FUNCTION_SINUSOID Intensity = f3 * sin(f1 * (x + f2)) + f4

value = ampl * sin(2*PI( freq*value + phase/360 ) ) + bias

f1 - Frequency of wave
f2 - Start angle, default = 0
f3 - Amplitude, default = 0.5
f4 - Constant waves are applied to, default = 0.5


FUNCTION_ARCTAN intensity = f3 * atan((f1 * x) + f2 )

 value = range/PI * atan(slope*PI*( value - center ) ) + bias

f1 - Horizontal scale, 1 is nice
f2 - Middle offset, default 0.5
f3 - Vertical scale, default 1
f4 - Vertical offset, default 0.5


FUNCTION_ARCSIN Intensity = (f3 * asin(f1 * (x + f2))) + f4
  value = range/PI * asin(2/width*( value - center ) ) + bias

f1 - How fast the transition occurs, lower = faster
f2 - Offset of the transition, default = 0;
f3 - Amplitude, default 1
f4 - Constant vertical offset, default 0.5


END;
        $output = nl2br($output);
        $output .= "<br/>";
        
        return $output;
    }

    /**
     * @return string
     */
    function render() {
        $output = $this->renderDescription();
        $output .= sprintf("<img src='%s' />", $this->functionControl->getCustomImageURL());

        return $output;
    }

    /**
     * 
     */
    function renderCustomImage() {
        $function = $this->functionControl->getFunctionType();

        if (method_exists($this, $function)) {
            call_user_func([$this, $function]);
            return;
        }

        $this->renderImagePolynomial();
    }

    /**
     * 
     */
    function renderImagePolynomial() {
        $imagick = new \Imagick();
        $imagick->newPseudoImage(500, 500, 'gradient:black-white');
        $arguments = array(
            $this->functionControl->getFirstTerm(),
        );

        $secondTerm = $this->functionControl->getSecondTerm();
        $thirdTerm = $this->functionControl->getThirdTerm();
        $fourthTerm = $this->functionControl->getFourthTerm();
        if (strlen($secondTerm)) {
            $arguments[] = $secondTerm;
            if (strlen($thirdTerm)) {
                $arguments[] = $thirdTerm;
                if(strlen($fourthTerm)) {
                    $arguments[] = $fourthTerm;
                }
            }
        }

        $imagick->functionImage(\Imagick::FUNCTION_POLYNOMIAL, $arguments);
        $imagick->setimageformat('png');

        analyzeImage($imagick, 512, 256);
    }

    /**
     * 
     */
    function renderImageSinusoid() {
        $imagick = new \Imagick();
        $imagick->newPseudoImage(500, 500, 'gradient:black-white');
        $arguments = array(
            $this->functionControl->getFirstTerm(),
        );

        $secondTerm = $this->functionControl->getSecondTerm();
        $thirdTerm = $this->functionControl->getThirdTerm();
        $fourthTerm = $this->functionControl->getFourthTerm();
        if (strlen($secondTerm)) {
            $arguments[] = $secondTerm;
            if (strlen($thirdTerm)) {
                $arguments[] = $thirdTerm;
                if(strlen($fourthTerm)) {
                    $arguments[] = $fourthTerm;
                }
            }
        }


        $imagick->functionImage(\Imagick::FUNCTION_SINUSOID, $arguments);
        $imagick->setimageformat('png');
//        header("Content-Type: image/png");
//        echo $imagick->getImageBlob();

        analyzeImage($imagick, 512, 256);
    }

    function renderImageArctan() {
        $imagick = new \Imagick();
        $imagick->newPseudoImage(500, 500, 'gradient:black-white');
        $arguments = array(
            $this->functionControl->getFirstTerm(),
        );

        $secondTerm = $this->functionControl->getSecondTerm();
        $thirdTerm = $this->functionControl->getThirdTerm();
        $fourthTerm = $this->functionControl->getFourthTerm();
        if (strlen($secondTerm)) {
            $arguments[] = $secondTerm;
            if (strlen($thirdTerm)) {
                $arguments[] = $thirdTerm;
                if(strlen($fourthTerm)) {
                    $arguments[] = $fourthTerm;
                }
            }
        }
        
        
        $imagick->functionImage(\Imagick::FUNCTION_ARCTAN, $arguments);
        $imagick->setimageformat('png');
//        header("Content-Type: image/png");
//        echo $imagick->getImageBlob();

        analyzeImage($imagick, 512, 256);
    }


    function renderImageArcsin() {
        $imagick = new \Imagick();
        $imagick->newPseudoImage(500, 500, 'gradient:black-white');
        $arguments = array(
            $this->functionControl->getFirstTerm(),
//            $this->functionControl->getSecondTerm(),
//            $this->functionControl->getThirdTerm(),
//            $this->functionControl->getFourthTerm(),
        );

        $secondTerm = $this->functionControl->getSecondTerm();
        $thirdTerm = $this->functionControl->getThirdTerm();
        $fourthTerm = $this->functionControl->getFourthTerm();
        if (strlen($secondTerm)) {
            $arguments[] = $secondTerm;
            if (strlen($thirdTerm)) {
                $arguments[] = $thirdTerm;
    
                if(strlen($fourthTerm)) {
                    $arguments[] = $fourthTerm;
                }
            }
        }

        $imagick->functionImage(\Imagick::FUNCTION_ARCSIN, $arguments);
        $imagick->setimageformat('png');

        analyzeImage($imagick, 512, 256);
    }



    
}