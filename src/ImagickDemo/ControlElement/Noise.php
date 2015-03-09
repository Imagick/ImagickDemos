<?php


namespace ImagickDemo\ControlElement;



class Noise extends OptionKeyElement{

    //private $noiseType;
    
//    const noiseVar = 'noise';
//    
//    private $noiseName = 'Laplacian';

//    private $noiseTypes = [
//        \Imagick::NOISE_UNIFORM => 'Uniform',
//        \Imagick::NOISE_GAUSSIAN => 'Gaussian',
//        \Imagick::NOISE_MULTIPLICATIVEGAUSSIAN => 'Multiplicative gaussian',
//        \Imagick::NOISE_IMPULSE => 'Impulse',
//        \Imagick::NOISE_LAPLACIAN => 'Laplacian',
//        \Imagick::NOISE_POISSON => 'Poisson',
//        \Imagick::NOISE_RANDOM => 'Random',
//
//    ];
//    
//    function __construct(VariableMap $variableMap) {
//        $this->noiseName = $variableMap->getVariable(self::noiseVar, $this->noiseName);
//        
//        foreach ($this->noiseTypes as $noiseType => $value) {
//            if (strcmp($this->noiseName, $value) === 0 || $this->noiseName == null) {
//                $this->noiseType = $noiseType;
//            }
//        }
//        //zendcode eats braces
//    }

    /**
     * @return array
     */
    function getInjectionParams() {
        return ['noiseType' => $this->key];
    }

//    /**
//     * @return string
//     */
//    function renderFormElement() {
//
//        $select = '';
//
//        foreach ($this->noiseTypes as $noiseType => $noiseName) {
//            $selected = '';
//            if (strcmp($noiseName, $this->noiseName) === 0) {
//                $selected = "selected='selected'";
//            }
//            $select .= "<option value='".$noiseName."' $selected>$noiseName</option>";
//        }
//
//        $text = <<< END
//<div class='row controlRow'>
//    <div class='col-sm-%d controlCell'>
//        Noise type
//    </div>
//    <div class='col-sm-%d controlCell'>
//        <select name='%s'>
//            %s
//        </select>
//    </div>
//</div>
//END;
//
//        return sprintf(
//            $text,
//            self::FIRST_ELEMENT_SIZE,
//            self::MIDDLE_ELEMENT_SIZE,
//            self::noiseVar,
//            $select
//        );
//    }


    protected function getDefault() {
        return \Imagick::NOISE_GAUSSIAN;
    }

    protected function getVariableName() {
        return 'noiseType';
    }

    protected function getDisplayName() {
        return "Noise type";
    }

    protected function getOptions() {
        return [
            \Imagick::NOISE_UNIFORM => 'Uniform',
            \Imagick::NOISE_GAUSSIAN => 'Gaussian',
            \Imagick::NOISE_MULTIPLICATIVEGAUSSIAN => 'Multiplicative gaussian',
            \Imagick::NOISE_IMPULSE => 'Impulse',
            \Imagick::NOISE_LAPLACIAN => 'Laplacian',
            \Imagick::NOISE_POISSON => 'Poisson',
            \Imagick::NOISE_RANDOM => 'Random',

        ];
    }



    function getNoiseType() {
        return $this->noiseType;
    }
}

 