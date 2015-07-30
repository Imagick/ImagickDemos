<?php

namespace ImagickDemo\ControlElement;

use ImagickDemo\Framework\VariableMap;

abstract class OptionKeyElement implements ControlElement
{
    abstract protected function getDefault();

    abstract protected function getVariableName();

    abstract protected function getDisplayName();

    abstract protected function getOptions();

    protected $key;
    protected $value;

    public function __construct(VariableMap $variableMap)
    {
        $this->key = $this->getDefault();
        $newKey = $variableMap->getVariable($this->getVariableName(), $this->key);

        foreach ($this->getOptions() as $key => $value) {
            if (strcmp($newKey, $key) === 0) {
                $this->key = $key;
                $this->value = $value;
                break;
            }
        }
    }

    protected function getKey()
    {
        return $this->key;
    }

    protected function getValue()
    {
        return $this->value;
    }

    public function getParams()
    {
        return [
            $this->getVariableName() => $this->key,
        ];
    }

    public function getInjectionParams()
    {
        return $this->getParams();
    }

    /**
     * @return string
     */
    public function renderFormElement()
    {
        $select = '';

        foreach ($this->getOptions() as $key => $value) {
            $selected = '';
            if ($key == $this->key) {
                $selected = "selected='selected'";
            }
            $select .= "<option value='" . $key . "' $selected>$value</option>";
        }


        $text = <<< END
<div class='row controlRow'>
    <div class='col-sm-%d controlCell'>
        %s
    </div>    
    <div class='col-sm-%d controlCell'>
        <select name='%s' class='inputSelect'>
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
