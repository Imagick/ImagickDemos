<?php

namespace ImagickDemo\Example;


class screenEmbed extends \ImagickDemo\Example {

    function render() {
        $output = "This is a description. <br/>";
        $output .= $this->renderImageURL();
        return $output;
    }
}