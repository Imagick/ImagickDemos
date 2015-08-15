<?php

namespace ImagickDemo\ControlElement;

class TranslateY extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }

    protected function getDefault()
    {
        return 75;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 500;
    }

    protected function getVariableName()
    {
        return 'translateY';
    }

    protected function getDisplayName()
    {
        return 'Translate Y';
    }

    public function getTranslateY()
    {
        return $this->getValue();
    }
}
