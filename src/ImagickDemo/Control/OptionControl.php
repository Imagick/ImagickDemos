<?php


namespace ImagickDemo\Control;

abstract class OptionControl implements \ImagickDemo\Control {

    protected $image = null;
    protected $option = null;

    abstract function getName();
    abstract function getDefaultOption();
    abstract function getOptions();

    function __construct(\Intahwebz\Request $request, $imageBaseURL) {
        $this->option = $this->getDefaultOption();
        $this->option = $request->getVariable($this->getName(), $this->option);
        $images = $this->getOptions();
        foreach ($images as $key => $value) {
            if (strcmp($this->option, $value) === 0 || $this->image == null) {
                $this->image = $key;
            }
        }
        $this->imageBaseURL = $imageBaseURL;
    }

    function getOption() {
        return $this->option;
    }

    function getURL() {
        return sprintf("<img src='%s?%s' />", $this->imageBaseURL, $this->getParamString() );
    }

    function getParams() {
        return [$this->getName() => $this->option];
    }

    function getParamString() {
        return $this->getName()."=".$this->option;
    }

    function getImagePath() {
        return $this->image;
    }
    
    function getOptionValue() {
        return $this->image;
    }

    function render() {
        $output = "";
        $output .= "<form method='GET' accept-charset='utf-8'>";
        $output .= "<select name='".$this->getName()."'>";

        $images = $this->getOptions();

        foreach ($images as $key => $image) {

            $selected = '';
            if (strcmp($image, $this->option) === 0) {
                $selected = "selected='selected'";
            }
            $output .= "<option value='".$image."' $selected>$image</option>";
        }

        $output .= "</select>";
        $output .= "<button type='submit' class='btn btn-default'>Update</button>";
        $output .= "</form>";

        return $output;
    }
}

 