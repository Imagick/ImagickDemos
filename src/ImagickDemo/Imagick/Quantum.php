<?php


namespace ImagickDemo\Imagick;


class Quantum extends \ImagickDemo\ExampleWithoutControlOrImage {

    function renderImageURL() {
        return "";
    }

    function renderDescription() {
        $imagick = new \Imagick();
        $quantumRange = $imagick->getQuantumRange();
        print_r($quantumRange);
        $quantumDepth = $imagick->getQuantumDepth();
        print_r($quantumDepth);
    }
}