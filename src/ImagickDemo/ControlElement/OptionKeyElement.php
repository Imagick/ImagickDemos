<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

abstract class OptionKeyElement implements ControlElement {

    abstract protected function getDefault();
    abstract protected function getVariableName();
    abstract protected function getDisplayName();
    abstract protected function getOptions();

    protected $key;
    protected $value;

    function __construct(Request $request) {
        $this->key = $this->getDefault();
        $newKey = $request->getVariable($this->getVariableName(), $this->key);

        foreach ($this->getOptions() as $key => $value) {
            if (strcmp($newKey, $key) === 0) {
                $this->key = $key;
                $this->value = $value;
                break;
            }
        } 
    }

    protected function getKey() {
        return $this->key;
    }

    protected function getValue() {
        return $this->value;
    }
    
    function getParams() {
        return [
            $this->getVariableName() => $this->key,
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

        foreach ($this->getOptions() as $key => $value) {
            $selected = '';
            if ($key == $this->key) { //Unsafe compare?
                $selected = "selected='selected'";
            }
            $output .= "<option value='".$key."' $selected>$value</option>";
        }

        $output .= "</select>
                    </td>
                    
                <td class='standardCell'>
                </td>
            </tr>";

        return $output;
    }
}



 