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

        $select = '';
        
        foreach ($this->getOptions() as $key => $value) {
            $selected = '';
            if ($key == $this->key) {
                $selected = "selected='selected'";
            }
            $select .= "<option value='".$key."' $selected>$value</option>";
        }
        
        
        $text = <<< END
<div class='row'>
    <div class='col-sm-%d'>
        %s
    </div>    
    <div class='col-sm-%d'>
        <select name='%s'>
            %s
        </select>
    </div>
</div>
END;

        return sprintf(
            $text,
            self::FIRST_ELEMENT_SIZE,
            $this->getDisplayName(),
            self::MIDDLE_ELEMENT_SIZE,
            $this->getVariableName(),
            $select
        );
    }
}



 