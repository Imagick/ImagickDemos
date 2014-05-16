<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class Angle implements ControlElement {

    private $angle = 45;

    const name = 'angle';
    
    function __construct(Request $request) {
        $this->angle = floatval($request->getVariable(self::name, $this->angle));
        
        if ($this->angle < 0) {
            $this->angle = 0;
        }
        if ($this->angle > 360) {
            $this->angle = 360;
        }
    }

    function getParams() {
        return [self::name => $this->angle];
    }


    function renderFormElement() {
        $output = '';
        $sAngle = safeText($this->angle);

        $output .= "
            <tr>
                <td class='standardCell'>
                    ".self::name."
                </td>
                <td class='standardCell'>
                    <input type='text' name='".self::name."' value='$sAngle'/>
                </td>
            </tr>
";

        return $output;
    }

    /**
     * @return string
     */
    public function getAngle() {
        return $this->angle;
    }
}

 