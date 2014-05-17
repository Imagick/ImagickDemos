<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class A implements ControlElement {

    private $a = "100";

    const aName = 'a';
//    private $errors = [];

    function __construct(Request $request) {
        $this->a = $request->getVariable(self::aName, $this->a);
        $this->a = intval($this->a);
        if ($this->a < 0) {
            $this->a = 0;
        }
        if ($this->a > 255) {
            $this->a = 255;
        }
        //zendcode eats braces
    }

    function getParams() {
        return [
            self::aName => $this->a,
        ];
    }

    function renderFormElement() {
        $sA = safeText($this->a);
   
        $output = "
            <tr>
                <td class='standardCell'>
                    Alpha
                </td>
                <td class='standardCell'>
                    <input type='text' name='".self::aName."' value='$sA'/>
                </td>
            </tr>";

        return $output;
    }

    /**
     * @return string
     */
    public function getA() {
        return $this->a;
    }
}

 