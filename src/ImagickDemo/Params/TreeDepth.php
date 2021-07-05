<?php


namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

ComponentRangeInt default of 0

class TreeDepth extends ValueElement
{
    protected function getDefault()
    {
        return 0;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 255;
    }

    protected function filterValue($value)
    {
        return intval($value);
    }

    protected function getVariableName()
    {
        return 'treeDepth';
    }

    protected function getDisplayName()
    {
        return 'Tree depth';
    }

    public function getTreeDepth()
    {
        return $this->getValue();
    }
}
