<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class SolarizeThreshold implements ControlElement {

    private $solarizeThreshold = 0;

    const name = 'solarizeThreshold';
    
    function __construct(Request $request) {
        $this->solarizeThreshold = floatval($request->getVariable(self::name, $this->solarizeThreshold));
        
        if ($this->solarizeThreshold < 0) {
            $this->solarizeThreshold = 0;
        }
        if ($this->solarizeThreshold > (pow(2, 16) - 1)) {
            $this->solarizeThreshold = pow(2, 16) - 1;
        }
        //zendcode eats braces
    }

    function getParams() {
        return [self::name => $this->solarizeThreshold];
    }


    function renderFormElement() {
        $output = '';
        $sSolarizeThreshold = safeText($this->solarizeThreshold);

        $output .= "
            <tr>
                <td class='standardCell'>
                    ".self::name."
                </td>
                <td class='standardCell'>
                    <input type='text' name='".self::name."' value='$sSolarizeThreshold'/>
                </td>
            </tr>
";

        return $output;
    }

    /**
     * @return string
     */
    public function getSolarizeThreshold() {
        return $this->solarizeThreshold;
    }
}

 