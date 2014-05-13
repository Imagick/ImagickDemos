<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class Radius implements ControlElement {

    private $radius = 5;

    function __construct(Request $request) {
        $this->radius = floatval($request->getVariable('radius', $this->radius));
        
        if ($this->radius < 0) {
            $this->radius = 0;
        }
        if ($this->radius > 10) {
            $this->radius = 10;
        }
        //blah
    }

    function getParams() {
        return ['radius' => $this->radius];
    }


    function renderFormElement() {
        $output = '';
        $sRadius = safeText($this->radius);

        $output .= "
            <tr>
                <td class='standardCell'>
                    Radius
                </td>
                <td class='standardCell'>
                    <input type='text' name='radius' value='$sRadius'/>
                </td>
            </tr>
";

        return $output;
    }

    /**
     * @return string
     */
    public function getRadius() {
        return $this->radius;
    }

}

 