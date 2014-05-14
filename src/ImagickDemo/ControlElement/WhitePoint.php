<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class WhitePoint implements ControlElement {

    private $whitePoint = 200;

    const whitePointName = 'whitePoint';
    
    function __construct(Request $request) {
        $this->whitePoint = $request->getVariable(self::whitePointName, $this->whitePoint);
        $this->whitePoint = intval($this->whitePoint);
        if ($this->whitePoint < 0) {
            $this->whitePoint = 0;
        }
        if ($this->whitePoint > 255) {
            $this->whitePoint = 255;
        }
        //zendcode eats braces
    }

    function getParams() {
        return [
            self::whitePointName => $this->whitePoint,
        ];
    }

    function renderFormElement() {
        $sBlackPoint = safeText($this->whitePoint);
   
//        if (count($this->errors)) {
//            foreach ($this->errors as $error) {
//                $output .= $error."<br/>";
//            }
//        }

        $output = "
            <tr>
                <td class='standardCell'>
                    White point
                </td>
                <td class='standardCell'>
                    <input type='text' name='".self::whitePointName."' value='$sBlackPoint'/>
                </td>
            </tr>";

        return $output;
    }

    /**
     * @return string
     */
    public function getWhitePoint() {
        return $this->whitePoint;
    }
}

 