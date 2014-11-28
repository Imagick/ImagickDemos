<?php


namespace ImagickDemo\Imagick;


class Quantum extends \ImagickDemo\Example {

    
    function renderDescription() {

    }
    
    function render() {
        
        
        $imagick = new \Imagick();

//Example Imagick::Quantum
        $quantumRange = $imagick->getQuantumRange();
        print_r($quantumRange);
        
        
        $quantumDepth = $imagick->getQuantumDepth();
        print_r($quantumDepth);

//Example end
    }
}