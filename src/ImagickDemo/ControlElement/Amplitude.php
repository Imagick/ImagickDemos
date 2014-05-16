<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class Amplitude implements ControlElement {

    private $amplitude = 0;

    const name = 'amplitude';
    
    function __construct(Request $request) {
        $this->amplitude = floatval($request->getVariable(self::name, $this->amplitude));
        
        if ($this->amplitude < 0) {
            $this->amplitude = 0;
        }
        if ($this->amplitude > 20) {
            $this->amplitude = 20;
        }
        //Zendcode eats braces
    }

    function getParams() {
        return [self::name => $this->amplitude];
    }

    function renderFormElement() {
        $output = '';
        $sAmplitude = safeText($this->amplitude);

        $output .= "
            <tr>
                <td class='standardCell'>
                    ".self::name."
                </td>
                <td class='standardCell'>
                    <input type='text' name='".self::name."' value='$sAmplitude'/>
                </td>
            </tr>
";

        return $output;
    }

    /**
     * @return string
     */
    public function getAmplitude() {
        return $this->amplitude;
    }
}

 