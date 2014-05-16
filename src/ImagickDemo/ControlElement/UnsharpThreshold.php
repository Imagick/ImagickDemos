<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class UnsharpThreshold implements ControlElement {

    private $unsharpThreshold = 0;

    const unsharpThresholdName = 'unsharpThreshold';
    
    function __construct(Request $request) {
        $this->unsharpThreshold = floatval($request->getVariable(self::unsharpThresholdName, $this->unsharpThreshold));
        
        if ($this->unsharpThreshold < 0) {
            $this->unsharpThreshold = 0;
        }
        if ($this->unsharpThreshold > 20) {
            $this->unsharpThreshold = 20;
        }
        //zendcode eats braces
    }

    function getParams() {
        return [self::unsharpThresholdName => $this->unsharpThreshold];
    }

    function renderFormElement() {
        $output = '';
        $sUnsharpThreshold = safeText($this->unsharpThreshold);

        $output .= "
            <tr>
                <td class='standardCell'>
                    ".self::unsharpThresholdName."
                </td>
                <td class='standardCell'>
                    <input type='text' name='".self::unsharpThresholdName."' value='$sUnsharpThreshold'/>
                </td>
            </tr>
";

        return $output;
    }

    /**
     * @return string
     */
    public function getUnsharpThreshold() {
        return $this->unsharpThreshold;
    }
}

 