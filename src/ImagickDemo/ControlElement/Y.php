<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class Y implements ControlElement {

    private $y = 10;

    const yName = 'y';
    
    function __construct(Request $request) {
        $this->y = $request->getVariable(self::yName, $this->y);
        $this->y = intval($this->y);
        if ($this->y < 0) {
            $this->y = 0;
        }
        if ($this->y > 255) {
            $this->y = 255;
        }
        //zendcode eats braces
    }

    function getParams() {
        return [
            self::yName => $this->y,
        ];
    }

    function renderFormElement() {
        $sY = safeText($this->y);
   
//        if (count($this->errors)) {
//            foreach ($this->errors as $error) {
//                $output .= $error."<br/>";
//            }
//        }

        $output = "
            <tr>
                <td class='standardCell'>
                    Y
                </td>
                <td class='standardCell'>
                    <input type='text' name='".self::yName."' value='$sY'/>
                </td>
            </tr>";

        return $output;
    }

    /**
     * @return string
     */
    public function getY() {
        return $this->y;
    }
}

 