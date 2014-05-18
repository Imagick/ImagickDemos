<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

abstract class ValueElement implements ControlElement {

    abstract protected function getDefault();
    abstract protected function getMin();
    abstract protected function getMax();
    abstract protected function getVariableName();
    abstract protected function getDisplayName();

    private $value;

    function __construct(Request $request) {
        
        $value = $this->getDefault();

        $value = $request->getVariable($this->getVariableName(), $value);
        
        if ($value < $this->getMin()) {
            $value = $this->getMin();
        }
        if ($value  > $this->getMax()) {
            $value  = $this->getMax();
        }
        
        $this->value = $value;
        //zendcode eats braces
    }

    protected function getValue() {
        return $this->value;
    }
    
    function getParams() {
        return [
            $this->getVariableName() => $this->value,
        ];
    }

    function renderFormElement() {
        $sValue = safeText($this->value);

        $output = "
            <tr>
                <td class='standardCell'>
                    ".$this->getDisplayName()."
                </td>
                <td class='standardCell'>
                    <input type='text' name='".$this->getVariableName()."' value='$sValue'/>
                </td>
            </tr>";

        return $output;
    }
}



 