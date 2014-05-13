<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class G implements ControlElement {

    private $g = "100";

//    private $errors = [];

    function __construct(Request $request) {
        $this->g = $request->getVariable('g', $this->g);
        $this->g = intval($this->g);
        if ($this->g < 0) {
            $this->g = 0;
        }
        if ($this->g > 255) {
            $this->g = 255;
        }
        //zendcode eats braces
    }

    function getParams() {
        return [
            'g' => $this->g,
        ];
    }

    function renderFormElement() {
        $sG = safeText($this->g);
   
//        if (count($this->errors)) {
//            foreach ($this->errors as $error) {
//                $output .= $error."<br/>";
//            }
//        }

        $output = "
            <tr>
                <td class='standardCell'>
                    Green
                </td>
                <td class='standardCell'>
                    <input type='text' name='g' value='$sG'/>
                </td>
            </tr>";

        return $output;
    }

    /**
     * @return string
     */
    public function getG() {
        return $this->g;
    }
}

 