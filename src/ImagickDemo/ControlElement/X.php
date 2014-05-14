<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class X implements ControlElement {

    private $x = 10;

    const xName = 'x';
    
    function __construct(Request $request) {
        $this->x = $request->getVariable(self::xName, $this->x);
        $this->x = intval($this->x);
        if ($this->x < 0) {
            $this->x = 0;
        }
        if ($this->x > 255) {
            $this->x = 255;
        }
        //zendcode eats braces
    }

    function getParams() {
        return [
            self::xName => $this->x,
        ];
    }

    function renderFormElement() {
        $x = safeText($this->x);
   
//        if (count($this->errors)) {
//            foreach ($this->errors as $error) {
//                $output .= $error."<br/>";
//            }
//        }

        $output = "
            <tr>
                <td class='standardCell'>
                    X
                </td>
                <td class='standardCell'>
                    <input type='text' name='".self::xName."' value='$x'/>
                </td>
            </tr>";

        return $output;
    }

    /**
     * @return string
     */
    public function getX() {
        return $this->x;
    }
}

 