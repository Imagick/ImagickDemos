<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;


//class H20 extends ValueElement {
//
//    function getDefault() {
//        return 5;
//    }
//    function getMin() {
//        return 0;
//    }
//    
//    function getMax() {
//        return 20;
//    }
//    function getVariableName() {
//        return 'h20';
//    }
//    
//    function getDisplayName() {
//        return 'Height';
//    }
//
//    function getH20() {
//        return $this->getValue();
//    }

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
                <td class='standardCell'>
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

 