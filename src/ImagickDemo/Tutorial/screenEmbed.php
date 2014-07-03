<?php

namespace ImagickDemo\Tutorial;


class screenEmbed extends \ImagickDemo\Example {

    function render() {
        $output = "";
        $output .= $this->renderImageURL();
        return $output;
    }
}