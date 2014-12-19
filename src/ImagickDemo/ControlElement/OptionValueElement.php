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

    function getInjectionParams() {
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
            if ($value == $this->value) { //Unsafe compare?
                $selected = "selected='selected'";
            }
            $select .= "<option value='".$value."' $selected>$value</option>";
        }

        $text = <<< END
<div class='row controlRow'>
    <div class='col-sm-%d %s controlCell'>
        %s
    </div>    
    <div class='col-sm-%d %s controlCell'>
        <select name='%s' class='inputSelect'>
            %s
        </select>
    </div>
</div>
END;

        return sprintf(
            $text,
            self::FIRST_ELEMENT_SIZE,
            self::FIRST_ELEMENT_CLASS,
            $this->getDisplayName(),
            self::MIDDLE_ELEMENT_SIZE,
            self::MIDDLE_ELEMENT_CLASS,
            $this->getVariableName(),
            $select
        );
    }
}



 