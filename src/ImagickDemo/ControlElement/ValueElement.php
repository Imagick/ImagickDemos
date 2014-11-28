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
        
        if ($this->getDefault() > $this->getMax()) {
            trigger_error("Default is bigger than max in ".get_class($this).", someone has dun goofed", E_USER_NOTICE);
        }

        if ($this->getDefault() < $this->getMin()) {
            trigger_error("Default is bigger than max in ".get_class($this).", someone has dun goofed", E_USER_NOTICE);
        }
        

        $value = $request->getVariable($this->getVariableName(), $value);
        
        if ($value < $this->getMin()) {
            $value = $this->getMin();
        }
        if ($value  > $this->getMax()) {
            $value  = $this->getMax();
        }
        
        $this->value = $this->filterValue($value);
    }
    
    protected function filterValue($value) {
        return $value;
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

        $text = "<div class='row'>
    <div class='col-sm-".self::FIRST_ELEMENT_SIZE."'>
        %s
    </div>    
    <div class='col-sm-".self::MIDDLE_ELEMENT_SIZE."'>
        <input type='text' class='inputValue' name='%s' value='%s'/>
    </div>
</div>";

        return sprintf(
            $text,
            $this->getDisplayName(),
            $this->getVariableName(),
            $sValue
        );
    }
}



 