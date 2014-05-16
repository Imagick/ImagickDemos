<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class Swirl implements ControlElement {

    private $swirl = 100;

    const name = 'swirl';
    
    function __construct(Request $request) {
        $this->swirl = floatval($request->getVariable(self::name, $this->swirl));
        
        if ($this->swirl < 0) {
            $this->swirl = 0;
        }
        if ($this->swirl > 3600) {
            $this->swirl = 3600;
        }
        //zendcode eats braces
    }

    function getParams() {
        return [self::name => $this->swirl];
    }

    function renderFormElement() {
        $output = '';
        $swirl = safeText($this->swirl);

        $output .= "
            <tr>
                <td class='standardCell'>
                    ".self::name."
                </td>
                <td class='standardCell'>
                    <input type='text' name='".self::name."' value='$swirl'/>
                </td>
            </tr>
";

        return $output;
    }

    /**
     * @return string
     */
    public function getSwirl() {
        return $this->swirl;
    }
}

 