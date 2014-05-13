<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class Sigma implements ControlElement { 

    private $sigma = 1;

    function __construct(Request $request) {
        $this->sigma = floatval($request->getVariable('sigma', $this->sigma));

        if ($this->sigma < 0) {
            $this->sigma = 0;
        }
        if ($this->sigma > 100) {
            $this->sigma = 100;
        }
        //blah
    }

    function getParams() {
        return ['sigma' => $this->sigma];
    }
    
    function renderFormElement() {

        $output = '';

        $sSigma = safeText($this->sigma);

        $output .= "
            <tr>
                <td class='standardCell'>
                    Sigma
                </td>
                <td class='standardCell'>
                    <input type='text' name='sigma' value='$sSigma'/>
                </td>
            </tr>
";

        return $output;
    }

    /**
     * @return string
     */
    public function getSigma() {
        return $this->sigma;
    }
}

 