<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class H20 implements ControlElement {

    private $h20 = "5";

    const h20Name = 'h20';

    function __construct(Request $request) {
        $this->h20 = $request->getVariable(self::h20Name, $this->h20);
        $this->h20 = intval($this->h20);
        if ($this->h20 < 0) {
            $this->h20 = 0;
        }
        if ($this->h20 > 20) {
            $this->h20 = 20;
        }
        //zendcode eats braces
    }

    function getParams() {
        return [
            self::h20Name => $this->h20,
        ];
    }

    function renderFormElement() {
        $sWidth = safeText($this->h20);
   
        $output = "
            <tr>
                <td class='standardCell'>
                    Height
                </td>
                <td class='standardCell'>
                    <input type='text' name='".self::h20Name."' value='$sWidth'/>
                </td>
            </tr>";

        return $output;
    }

    /**
     * @return string
     */
    public function getH20() {
        return $this->h20;
    }
}

 