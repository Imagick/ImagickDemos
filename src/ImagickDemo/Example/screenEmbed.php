<?php

namespace ImagickDemo\Example;


class screenEmbed extends \ImagickDemo\Example {

    function render() {
        $output = "";
        $output .= $this->renderImageURL();
        return $output;
    }
}