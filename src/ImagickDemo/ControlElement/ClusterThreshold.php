<?php


namespace ImagickDemo\ControlElement;




class ClusterThreshold extends ValueElement {

    protected function getDefault() {
        return 0.2;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 255;
    }

    protected function getVariableName() {
        return 'clusterThreshold';
    }

    protected function getDisplayName() {
        return 'Cluster threshold';
    }

    function getClusterThreshold() {
        return $this->getValue();
    }
}



 