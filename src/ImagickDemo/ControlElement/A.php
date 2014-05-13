<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class A implements ControlElement {

    private $a = "100";

//    private $errors = [];

    function __construct(Request $request) {
        $this->a = $request->getVariable('a', $this->a);
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
            'a' => $this->a,
        ];
    }

    function renderFormElement() {
        $sA = safeText($this->a);
   
//        if (count($this->errors)) {
//            foreach ($this->errors as $error) {
//                $output .= $error."<br/>";
//            }
//        }

        $output = "
            <tr>
                <td class='standardCell'>
                    Alpha
                </td>
                <td class='standardCell'>
                    <input type='text' name='b' value='$sA'/>
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

 