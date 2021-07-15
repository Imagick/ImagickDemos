<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetStringOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\EnumMap;

#[\Attribute]
class NoiseType implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault('Gaussian'),
            new EnumMap(getNoiseOptions())
        );
    }

//class Noise extends OptionKeyElement
//{
//    /**
//     * @return array
//     */
//    public function getInjectionParams()
//    {
//        return ['noiseType' => $this->key];
//    }
//
//    protected function getDefault()
//    {
//        return \Imagick::NOISE_GAUSSIAN;
//    }
//
//    protected function getVariableName()
//    {
//        return 'noiseType';
//    }
//
//    protected function getDisplayName()
//    {
//        return "Noise type";
//    }
//
//    protected function getOptions()
//    {
//        return [
//            \Imagick::NOISE_UNIFORM => 'Uniform',
//            \Imagick::NOISE_GAUSSIAN => 'Gaussian',
//            \Imagick::NOISE_MULTIPLICATIVEGAUSSIAN => 'Multiplicative gaussian',
//            \Imagick::NOISE_IMPULSE => 'Impulse',
//            \Imagick::NOISE_LAPLACIAN => 'Laplacian',
//            \Imagick::NOISE_POISSON => 'Poisson',
//            \Imagick::NOISE_RANDOM => 'Random',
//        ];
//    }
//
//    public function getNoiseType()
//    {
//        return $this->key;
//    }
}
