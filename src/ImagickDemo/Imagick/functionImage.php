<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Control\ReactControls;
use ImagickDemo\Image;
use ImagickDemo\Imagick\Controls\FunctionImageControl;
use VarMap\VarMap;

class functionImage extends \ImagickDemo\Example
{
    private FunctionImageControl $functionImageControl;

    private $polynomial = "FUNCTION_POLYNOMIAL 

Each value will be used as a coefficient from the highest order to the lowest, to produce a polynomial with the number of terms given.
 
f1.x + f2

f1.x^3 + f2.x^2 + f3.x + f4";

    private $sinusoid = "FUNCTION_SINUSOID Intensity = f3 * sin(f1 * (x + f2)) + f4

value = amplitude * sin(2*PI( freq*value + phase/360 ) ) + bias

f1 - Frequency of wave
f2 - Start angle, default = 0
f3 - Amplitude, default = 0.5
f4 - Constant waves are applied to, default = 0.5";

    private $arctan = "FUNCTION_ARCTAN intensity = f3 * atan((f1 * x) + f2 )

 value = range/PI * atan(slope*PI*( value - center ) ) + bias

f1 - Horizontal scale, 1 is nice
f2 - Middle offset, default 0.5
f3 - Vertical scale, default 1
f4 - Vertical offset, default 0.5";


    private $arcsin = "FUNCTION_ARCSIN Intensity = (f3 * asin(f1 * (x + f2))) + f4
  value = range/PI * asin(2/width*( value - center ) ) + bias

f1 - How fast the transition occurs, lower = faster
f2 - Offset of the transition, default = 0;
f3 - Amplitude, default 1
f4 - Constant vertical offset, default 0.5";


    public function __construct(VarMap $varMap)
    {
        $this->functionImageControl = FunctionImageControl::createFromVarMap($varMap);
    }

    public function renderTitle(): string
    {
        return "Imagick::functionImage";
    }


    public function hasCustomImage(): bool
    {
        return true;
    }

    public function renderDescription()
    {
        $descriptions = [
            'renderImagePolynomial' => $this->polynomial,
            'renderImageSinusoid' => $this->sinusoid,
            'renderImageArctan' => $this->arctan,
            'renderImageArcsin' => $this->arcsin,
        ];

        $output = "FunctionImage applies one of the following functions to an image: Polynomial, Sinusoid, Arctan, Arcsin to generate a gradient image with varying intensity. The image below shows the generated gradient, and an analysis of the image generated (the red line) to make it easier to see the gradient <br/>";

        $functionType = $this->functionImageControl->getFunctionType();

        if (array_key_exists($functionType, $descriptions)) {
            $output .= nl2br($descriptions[$functionType]);
        }
        else {
            $output .= "Unknown function type.";
        }

        $output .= "<br/>";

        return $output;
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    ) {
        return customImage(
            $activeCategory,
            $activeExample,
            $this->functionImageControl->getValuesForForm(),
            $this
        );
    }

    /**
     *
     */
    public function renderCustomImage()
    {
        $function = $this->functionImageControl->getFunctionType();

        if (method_exists($this, $function)) {
            call_user_func([$this, $function]);
            return;
        }

        $this->renderImagePolynomial();
    }

    /**
     *
     */
    public function renderImagePolynomial()
    {
//Example Imagick::functionImage Polynomial
        $imagick = new \Imagick();
        $imagick->newPseudoImage(500, 500, 'gradient:black-white');
        $arguments = array(
            $this->functionImageControl->getFirstTerm(),
        );

        $secondTerm = $this->functionImageControl->getSecondTerm();
        $thirdTerm = $this->functionImageControl->getThirdTerm();
        $fourthTerm = $this->functionImageControl->getFourthTerm();
        if (strlen($secondTerm)) {
            $arguments[] = $secondTerm;
            if (strlen($thirdTerm)) {
                $arguments[] = $thirdTerm;
                if (strlen($fourthTerm)) {
                    $arguments[] = $fourthTerm;
                }
            }
        }

        $imagick->functionImage(\Imagick::FUNCTION_POLYNOMIAL, $arguments);
        $imagick->setimageformat('png');

        Image::analyzeImage($imagick, 512, 256);
//Example end
    }

    /**
     *
     */
    public function renderImageSinusoid()
    {
//Example Imagick::functionImage Sinusoid
        $imagick = new \Imagick();
        $imagick->newPseudoImage(500, 500, 'gradient:black-white');
        $arguments = array(
            $this->functionImageControl->getFirstTerm(),
        );

        $secondTerm = $this->functionImageControl->getSecondTerm();
        $thirdTerm = $this->functionImageControl->getThirdTerm();
        $fourthTerm = $this->functionImageControl->getFourthTerm();
        if (strlen($secondTerm)) {
            $arguments[] = $secondTerm;
            if (strlen($thirdTerm)) {
                $arguments[] = $thirdTerm;
                if (strlen($fourthTerm)) {
                    $arguments[] = $fourthTerm;
                }
            }
        }

        $imagick->functionImage(\Imagick::FUNCTION_SINUSOID, $arguments);
        $imagick->setimageformat('png');

        Image::analyzeImage($imagick, 512, 256);
//Example end
    }

    public function renderImageArctan()
    {
//Example Imagick::functionImage ArcTan
        $imagick = new \Imagick();
        $imagick->newPseudoImage(500, 500, 'gradient:black-white');
        $arguments = array(
            $this->functionImageControl->getFirstTerm(),
        );

        $secondTerm = $this->functionImageControl->getSecondTerm();
        $thirdTerm = $this->functionImageControl->getThirdTerm();
        $fourthTerm = $this->functionImageControl->getFourthTerm();
        if (strlen($secondTerm)) {
            $arguments[] = $secondTerm;
            if (strlen($thirdTerm)) {
                $arguments[] = $thirdTerm;
                if (strlen($fourthTerm)) {
                    $arguments[] = $fourthTerm;
                }
            }
        }

        $imagick->functionImage(\Imagick::FUNCTION_ARCTAN, $arguments);
        $imagick->setimageformat('png');

        Image::analyzeImage($imagick, 512, 256);
//Example end
    }

    public function renderImageArcsin()
    {
//Example Imagick::functionImage ArcSin 
        $imagick = new \Imagick();
        $imagick->newPseudoImage(500, 500, 'gradient:black-white');
        $arguments = array(
            $this->functionImageControl->getFirstTerm(),
        );

        $secondTerm = $this->functionImageControl->getSecondTerm();
        $thirdTerm = $this->functionImageControl->getThirdTerm();
        $fourthTerm = $this->functionImageControl->getFourthTerm();
        if (strlen($secondTerm)) {
            $arguments[] = $secondTerm;
            if (strlen($thirdTerm)) {
                $arguments[] = $thirdTerm;

                if (strlen($fourthTerm)) {
                    $arguments[] = $fourthTerm;
                }
            }
        }

        $imagick->functionImage(\Imagick::FUNCTION_ARCSIN, $arguments);
        $imagick->setimageformat('png');

        Image::analyzeImage($imagick, 512, 256);
//Example end
    }


    public static function getParamType(): string
    {
        return FunctionImageControl::class;
    }

    public function needsFullPageRefresh(): bool
    {
        return true;
    }
}
