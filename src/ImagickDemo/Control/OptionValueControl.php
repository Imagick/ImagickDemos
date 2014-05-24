<?php


namespace ImagickDemo\Control;

abstract class OptionValueControl implements \ImagickDemo\Control {

    protected $option = null;
    
    private $imageBaseURL;

    abstract function getName();
    abstract function getDefaultOption();
    abstract function getOptions();

    function __construct(\Intahwebz\Request $request, $imageBaseURL) {
        $this->option = $this->getDefaultOption();
        $newOption = $request->getVariable($this->getName(), $this->option);

        $needle = array_search($newOption, $this->getOptions());
        if ($needle !== null) {
            $this->value =  $needle;
            $this->option = $newOption;
        }

        $this->imageBaseURL = $imageBaseURL;
    }

    function getOption() {
        return $this->option;
    }

    function getURL() {
        return sprintf("%s?%s", $this->imageBaseURL, $this->getParamString() );
    }

    function getParams() {
        return [$this->getName() => $this->option];
    }

    function getParamString() {
        return $this->getName()."=".$this->option;
    }

    
    //Call this from the extended class to give a 
    //real name to the variable
    protected function getOptionValue() {
        return $this->value;
    }
    
    function isDisplaySelect() {
        return false;
    }
    
    function renderFormElement() {
        $output = '';
        $output .= "<select name='".$this->getName()."'>";
        $images = $this->getOptions();

        foreach ($images as $key => $image) {
            $selected = '';
            if (strcmp($key, $this->option) === 0) {
                $selected = "selected='selected'";
            }

            $output .= "<option value='".$image."' $selected>$image</option>";
        }

        $output .= "</select>";
        
        return $output;
    }

    function renderForm() {
        $output = "";
        $output .= "<form method='GET' accept-charset='utf-8'>";
        $output .= $this->renderFormElement();
        $output .= "<br/>&nbsp;<br/>";
        $output .= "<button type='submit' class='btn btn-default'>Update</button>";
        $output .= "</form>";

        return $output;
    }
}

 