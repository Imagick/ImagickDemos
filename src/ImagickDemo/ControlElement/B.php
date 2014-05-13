<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class B implements ControlElement {

    private $b = "100";

//    private $errors = [];

    function __construct(Request $request) {
        $this->b = $request->getVariable('b', $this->b);
        $this->b = intval($this->b);
        if ($this->b < 0) {
            $this->b = 0;
        }
        if ($this->b > 255) {
            $this->b = 255;
        }
        //zendcode eats braces
    }

    function getParams() {
        return [
            'b' => $this->b,
        ];
    }

    function renderFormElement() {
        $sB = safeText($this->b);
   
//        if (count($this->errors)) {
//            foreach ($this->errors as $error) {
//                $output .= $error."<br/>";
//            }
//        }

        $output = "
            <tr>
                <td class='standardCell'>
                    Blue
                </td>
                <td class='standardCell'>
                    <input type='text' name='b' value='$sB'/>
                </td>
            </tr>";

        return $output;
    }

    /**
     * @return string
     */
    public function getB() {
        return $this->b;
    }
}

 