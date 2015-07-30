<?php

namespace ImagickDemo\ControlElement;

class ClusterThreshold extends ValueElement
{
    protected function getDefault()
    {
        return 5;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 255;
    }

    protected function getVariableName()
    {
        return 'clusterThreshold';
    }

    protected function getDisplayName()
    {
        return 'Cluster threshold';
    }

    public function getClusterThreshold()
    {
        return $this->getValue();
    }
}
