<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class R implements ControlElement {

    private $r = "100";

//    private $errors = [];

    function __construct(Request $request) {
        $this->r = $request->getVariable('r', $this->r);
        $this->r = intval($this->r);
        if ($this->r < 0) {
            $this->r = 0;
        }
        if ($this->r > 255) {
            $this->r = 255;
        }
        //zendcode eats braces
    }

    function getParams() {
        return [
            'r' => $this->r,
        ];
    }

    function renderFormElement() {
        $sR = safeText($this->r);
   
//        if (count($this->errors)) {
//            foreach ($this->errors as $error) {
//                $output .= $error."<br/>";
//            }
//        }

        $output = "
            <tr>
                <td class='standardCell'>
                    Red
                </td>
                <td class='standardCell'>
                    <input type='text' name='r' value='$sR'/>
                </td>
            </tr>";

        return $output;
    }

    /**
     * @return string
     */
    public function getR() {
        return $this->r;
    }
}

 