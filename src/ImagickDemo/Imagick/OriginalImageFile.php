<?php


namespace ImagickDemo\Imagick;


trait OriginalImageFile {

    function getOriginalImage() {
        return $this->control->getURL().'&original=true';
    }

    function renderOriginalImage() {
        \ImagickDemo\Imagick\renderFile($this->control->getImagePath());
    }
}

