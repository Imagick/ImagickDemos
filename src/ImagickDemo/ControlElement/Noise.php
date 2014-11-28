<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class Noise implements ControlElement {

    private $noiseType;
    
    const noiseVar = 'noise';
    
    private $noiseName = 'Laplacian';

    private $noiseTypes = [
        \Imagick::NOISE_UNIFORM => 'Uniform',
        \Imagick::NOISE_GAUSSIAN => 'Gaussian',
        \Imagick::NOISE_MULTIPLICATIVEGAUSSIAN => 'Multiplicative gaussian',
        \Imagick::NOISE_IMPULSE => 'Impulse',
        \Imagick::NOISE_LAPLACIAN => 'Laplacian',
        \Imagick::NOISE_POISSON => 'Poisson',
        \Imagick::NOISE_RANDOM => 'Random',

    ];
    
    function __construct(Request $request) {
        $this->noiseName = $request->getVariable(self::noiseVar, $this->noiseName);
        
        foreach ($this->noiseTypes as $noiseType => $value) {
            if (strcmp($this->noiseName, $value) === 0 || $this->noiseName == null) {
                $this->noiseType = $noiseType;
            }
        }
        //zendcode eats braces
    }

    /**
     * @return array
     */
    function getParams() {
        return [self::noiseVar => $this->noiseName];
    }

    /**
     * @return string
     */
    function renderFormElement() {

        $select = '';

        foreach ($this->noiseTypes as $noiseType => $noiseName) {
            $selected = '';
            if (strcmp($noiseName, $this->noiseName) === 0) {
                $selected = "selected='selected'";
            }
            $select .= "<option value='".$noiseName."' $selected>$noiseName</option>";
        }

        $text = <<< END
<div class='row'>
    <div class='col-sm-%d'>
        Noise type
    </div>
    <div class='col-sm-%d'>
        <select name='%s'>
            %s
        </select>
    </div>
</div>
END;

        return sprintf(
            $text,
            self::FIRST_ELEMENT_SIZE,
            self::MIDDLE_ELEMENT_SIZE,
            self::noiseVar,
            $select
        );
    }

    function getNoiseType() {
        return $this->noiseType;
    }
}

 