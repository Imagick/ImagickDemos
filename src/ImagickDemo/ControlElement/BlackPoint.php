<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class BlackPoint implements ControlElement {

    private $blackPoint = 10;

    const blackPointName = 'blackPoint';
    
    function __construct(Request $request) {
        $this->blackPoint = $request->getVariable(self::blackPointName, $this->blackPoint);
        $this->blackPoint = intval($this->blackPoint);
        if ($this->blackPoint < 0) {
            $this->blackPoint = 0;
        }
        if ($this->blackPoint > 255) {
            $this->blackPoint = 255;
        }
        //zendcode eats braces
    }

    function getParams() {
        return [
            self::blackPointName => $this->blackPoint,
        ];
    }

    function renderFormElement() {
        $sBlackPoint = safeText($this->blackPoint);
   
//        if (count($this->errors)) {
//            foreach ($this->errors as $error) {
//                $output .= $error."<br/>";
//            }
//        }

        $output = "
            <tr>
                <td class='standardCell'>
                    Black point
                </td>
                <td class='standardCell'>
                    <input type='text' name='".self::blackPointName."' value='$sBlackPoint'/>
                </td>
            </tr>";

        return $output;
    }

    /**
     * @return string
     */
    public function getBlackPoint() {
        return $this->blackPoint;
    }
}

 