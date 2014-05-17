<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class W20 implements ControlElement {

    private $w20 = "5";

    const w20Name = 'w20';

    function __construct(Request $request) {
        $this->w20 = $request->getVariable(self::w20Name, $this->w20);
        $this->w20 = intval($this->w20);
        if ($this->w20 < 0) {
            $this->w20 = 0;
        }
        if ($this->w20 > 20) {
            $this->w20 = 20;
        }
        //zendcode eats braces
    }

    function getParams() {
        return [
            self::w20Name => $this->w20,
        ];
    }

    function renderFormElement() {
        $sWidth = safeText($this->w20);
   
        $output = "
            <tr>
                <td class='standardCell'>
                    Width
                </td>
                <td class='standardCell'>
                    <input type='text' name='".self::w20Name."' value='$sWidth'/>
                </td>
            </tr>";

        return $output;
    }

    /**
     * @return string
     */
    public function getW20() {
        return $this->w20;
    }
}

 