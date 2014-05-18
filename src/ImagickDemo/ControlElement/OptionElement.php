<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

abstract class OptionElement implements ControlElement {

    abstract protected function getDefault();
    abstract protected function getVariableName();
    abstract protected function getDisplayName();
    abstract protected function getOptions();

    protected $value;
    protected $display;

    function __construct(Request $request) {
        $value = $this->getDefault();
        $newValue = $request->getVariable($this->getVariableName(), $value);

        foreach ($this->getOptions() as $value => $displayName) {
            if (strcmp($newValue, $value) === 0 || $this->value == null) {
                $this->value = $newValue;
                $this->display = $displayName;
                break;
            }
        }
        //blah 
    }

    protected function getValue() {
        return $this->value;
    }
    
    function getParams() {
        return [
            $this->getVariableName() => $this->value,
        ];
    }

    /**
     * @return string
     */
    function renderFormElement() {
        $output = "<tr>
                <td class='standardCell'>
                ".$this->getDisplayName()."
                </td>
                <td class='standardCell'> ";

        $output .= "<select name='".$this->getVariableName()."'>";

        foreach ($this->getOptions() as $value => $displayName) {
            $selected = '';
            if ($value == $this->value) { //Unsafe compare?
                $selected = "selected='selected'";
            }
            $output .= "<option value='".$value."' $selected>$displayName</option>";
        }

        $output .= "</select>
                    </td>
            </tr>";

        return $output;
    }
}



 