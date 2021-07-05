<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;

class EvaluateType implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault(\Imagick::EVALUATE_ADD),
            new EnumMap([
                \Imagick::EVALUATE_ADD => 'Add',
                \Imagick::EVALUATE_AND => 'And',
                \Imagick::EVALUATE_DIVIDE => 'Divide',
                \Imagick::EVALUATE_LEFTSHIFT => 'Leftshift',
                \Imagick::EVALUATE_MAX => 'Max',
                \Imagick::EVALUATE_MIN => 'Min',
                \Imagick::EVALUATE_MULTIPLY => 'Multiply',
                \Imagick::EVALUATE_OR => 'Or',
                \Imagick::EVALUATE_RIGHTSHIFT => 'Rightshift',
                \Imagick::EVALUATE_SET => 'Set',
                \Imagick::EVALUATE_SUBTRACT => 'Subtract',
                \Imagick::EVALUATE_XOR => 'Xor',
                \Imagick::EVALUATE_POW => 'Pow',
                \Imagick::EVALUATE_LOG => 'Log',
                \Imagick::EVALUATE_THRESHOLD => 'Threshold',
                \Imagick::EVALUATE_THRESHOLDBLACK => 'Threshold black',
                \Imagick::EVALUATE_THRESHOLDWHITE => 'Threshold white',
                \Imagick::EVALUATE_GAUSSIANNOISE => 'Gaussian noise',
                \Imagick::EVALUATE_IMPULSENOISE => 'Impulse noise',
                \Imagick::EVALUATE_LAPLACIANNOISE => 'Laplacian noise',
                \Imagick::EVALUATE_MULTIPLICATIVENOISE => 'Multiplicative noise',
                \Imagick::EVALUATE_POISSONNOISE => 'Poisson noise',
                \Imagick::EVALUATE_UNIFORMNOISE => 'Uniform noise',
                \Imagick::EVALUATE_COSINE => 'Cosine',
                \Imagick::EVALUATE_SINE => 'Sine',
                \Imagick::EVALUATE_ADDMODULUS => 'Add modulus'
            ])
        );
    }

//class EvaluateType extends OptionKeyElement
//{
//    protected function getDefault()
//    {
//        return \Imagick::EVALUATE_ADD;
//    }
//
//    protected function getVariableName()
//    {
//        return 'evaluateType';
//    }
//
//    protected function getDisplayName()
//    {
//        return "Evaluate type";
//    }
//
//    public function getOptions()
//    {
//        return [
//            \Imagick::EVALUATE_ADD => 'Add',
//            \Imagick::EVALUATE_AND => 'And',
//            \Imagick::EVALUATE_DIVIDE => 'Divide',
//            \Imagick::EVALUATE_LEFTSHIFT => 'Leftshift',
//            \Imagick::EVALUATE_MAX => 'Max',
//            \Imagick::EVALUATE_MIN => 'Min',
//            \Imagick::EVALUATE_MULTIPLY => 'Multiply',
//            \Imagick::EVALUATE_OR => 'Or',
//            \Imagick::EVALUATE_RIGHTSHIFT => 'Rightshift',
//            \Imagick::EVALUATE_SET => 'Set',
//            \Imagick::EVALUATE_SUBTRACT => 'Subtract',
//            \Imagick::EVALUATE_XOR => 'Xor',
//            \Imagick::EVALUATE_POW => 'Pow',
//            \Imagick::EVALUATE_LOG => 'Log',
//            \Imagick::EVALUATE_THRESHOLD => 'Threshold',
//            \Imagick::EVALUATE_THRESHOLDBLACK => 'Threshold black',
//            \Imagick::EVALUATE_THRESHOLDWHITE => 'Threshold white',
//            \Imagick::EVALUATE_GAUSSIANNOISE => 'Gaussian noise',
//            \Imagick::EVALUATE_IMPULSENOISE => 'Impulse noise',
//            \Imagick::EVALUATE_LAPLACIANNOISE => 'Laplacian noise',
//            \Imagick::EVALUATE_MULTIPLICATIVENOISE => 'Multiplicative noise',
//            \Imagick::EVALUATE_POISSONNOISE => 'Poisson noise',
//            \Imagick::EVALUATE_UNIFORMNOISE => 'Uniform noise',
//            \Imagick::EVALUATE_COSINE => 'Cosine',
//            \Imagick::EVALUATE_SINE => 'Sine',
//            \Imagick::EVALUATE_ADDMODULUS => 'Add modulus'
//        ];
//    }
//
//    public function getEvaluateType()
//    {
//        return $this->getKey();
//    }
}
