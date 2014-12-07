<?php


namespace ImagickDemo\ControlElement;


class ArtifactExample extends OptionKeyElement {

    function getVariableName() {
        return 'artifactExample';
    }

    function getDefault() {
        return 'screenGradients';
    }

    function getDisplayName() {
        return "Artifact example";
    }

    function getOptions() {
        return \ImagickDemo\Imagick\setImageArtifact::getExamples();
    }

    function getArtifactExample() {
        return $this->getKey();
    }
}

 