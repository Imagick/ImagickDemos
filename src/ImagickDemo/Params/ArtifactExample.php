<?php

namespace ImagickDemo\Params;

#[\Attribute]
class ArtifactExample extends OptionKeyElement
{
    // TODO - I have no idea.

    public function getVariableName()
    {
        return 'artifactExample';
    }

    public function getDefault()
    {
        return 'screenGradients';
    }

    public function getDisplayName()
    {
        return "Artifact example";
    }

    public function getOptions()
    {
        return [];//\ImagickDemo\Imagick\setImageArtifact::getExamples();
    }

    public function getArtifactExample()
    {
        return $this->getKey();
    }
}
