<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class Length implements ControlElement {

    private $length = 20;

    const lengthName = 'length';
    
    function __construct(Request $request) {
        $this->length = floatval($request->getVariable(self::lengthName, $this->length));
        
        if ($this->length < 0) {
            $this->length = 0;
        }
        if ($this->length > 50) {
            $this->length = 50;
        }
        //Zend code eats braces
    }

    function getParams() {
        return [self::lengthName => $this->length];
    }

    function renderFormElement() {
        $output = '';
        $sLength = safeText($this->length);

        $output .= "
            <tr>
                <td class='standardCell'>
                    ".self::lengthName."
                </td>
                <td class='standardCell'>
                    <input type='text' name='".self::lengthName."' value='$sLength'/>
                </td>
            </tr>
";

        return $output;
    }

    /**
     * @return string
     */
    public function getLength() {
        return $this->length;
    }
}

 