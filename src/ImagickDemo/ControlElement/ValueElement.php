<?php

namespace ImagickDemo\ControlElement;

use ImagickDemo\Framework\VariableMap;

abstract class ValueElement implements ControlElement
{
    abstract protected function getDefault();

    abstract protected function getMin();

    abstract protected function getMax();

    abstract protected function getVariableName();

    abstract protected function getDisplayName();

    abstract protected function filterValue($value);
    
    private $value;

    public function __construct(VariableMap $variableMap)
    {
        $value = $this->getDefault();

        if ($value !== false) {
            if ($this->getDefault() > $this->getMax()) {
                trigger_error("Default is bigger than max in " . get_class($this) . ", someone has dun goofed", E_USER_NOTICE);
            }

            if ($this->getDefault() < $this->getMin()) {
                trigger_error("Default is smaller than min in " . get_class($this) . ", someone has dun goofed", E_USER_NOTICE);
            }
        }

        $value = $variableMap->getVariable($this->getVariableName(), $value);

        if (($value !== false) && (strlen(trim($value) != 0))) {
            if ($value < $this->getMin()) {
                $value = $this->getMin();
            }
            if ($value > $this->getMax()) {
                $value = $this->getMax();
            }
        }

        $this->value = $this->filterValue($value);
    }

    protected function getValue()
    {
        return $this->value;
    }

    public function getParams()
    {
        return [
            $this->getVariableName() => $this->value,
        ];
    }

    public function getInjectionParams()
    {
        return $this->getParams();
    }

    public function renderFormElement()
    {
        $sValue = safeText($this->value);

        $text = "<div class='row controlRow'>
    <div class='col-sm-" . self::FIRST_ELEMENT_SIZE . " controlCell'>
        %s
    </div>    
    <div class='col-sm-" . self::MIDDLE_ELEMENT_SIZE . " controlCell'>
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
