<?php


namespace ImagickDemo\ImagickPixelIterator;


use ImagickDemo\Navigation\NavOption;

class ExampleList implements \ImagickDemo\ExampleList {


    function getExamples() {

        $imagickPixelIteratorExamples = array(
            new NavOption('clear', true ),
            new NavOption('construct', true),
            //'getCurrentIteratorRow',
            //'getIteratorRow' => 'setIteratorRow',
            new NavOption('getNextIteratorRow', true ),
            //'getPreviousIteratorRow',
            //'newPixelIterator', deprecated
            //'newPixelRegionIterator', deprecated
            new NavOption('resetIterator', true ),
            //'setIteratorFirstRow',
            //'setIteratorLastRow',
            new NavOption('setIteratorRow', true ),
            new NavOption('syncIterator', true, 'construct'),// => '__construct',
        );

        return $imagickPixelIteratorExamples;
    }
    
}

 