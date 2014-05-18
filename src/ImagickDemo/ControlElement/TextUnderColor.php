<?php


namespace ImagickDemo\ControlElement;


class TextUnderColor extends ColorElement {

    function getDefault() {
        return 'DeepPink2';
    }

    function getVariableName() {
        return 'textUnderColor';
    }
    
    function getDisplayName() {
        return 'Text under color';
    }

    function getTextUnderColor() {
        return $this->getValue();
    }
}