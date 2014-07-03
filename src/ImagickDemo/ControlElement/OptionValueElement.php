<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

abstract class OptionValueElement implements ControlElement {

    abstract protected function getDefault();
    abstract protected function getVariableName();
    abstract protected function getDisplayName();
    abstract protected function getOptions();

    protected $key;
    protected $value;

    function __construct(Request $request) {
        $value = $this->getDefault();
        $newValue = $request->getVariable($this->getVariableName(), $value);

        $needle = array_search($newValue, $this->getOptions());
        if ($needle !== null) {
            $this->key =  $needle;
            $this->value = $newValue;
        }
    }

    protected function getOptionKey() {
        return $this->key;
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
                <td class='standardCell' style='text-align: right;'> ";

        $output .= "<select name='".$this->getVariableName()."'>";

        foreach ($this->getOptions() as $key => $value) {
            $selected = '';
            if ($value == $this->value) { //Unsafe compare?
                $selected = "selected='selected'";
            }
            $output .= "<option value='".$value."' $selected>$value</option>";
        }

        $output .= "</select>
                    </td>
                <td class='standardCell'>
                </td>
            </tr>";

        return $output;
    }
}



 