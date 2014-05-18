<?php


namespace ImagickDemo\ImagickPixelIterator;


use ImagickDemo\Navigation\NavOption;

class ExampleList implements \ImagickDemo\ExampleList {


    function getExamples() {

        $imagickPixelIteratorExamples = array(
            new NavOption('clear'),
            new NavOption('construct'),
            //'getCurrentIteratorRow',
            //'getIteratorRow' => 'setIteratorRow',
            new NavOption('getNextIteratorRow'),
            //'getPreviousIteratorRow',
            //'newPixelIterator', deprecated
            //'newPixelRegionIterator', deprecated
            new NavOption('resetIterator'),
            //'setIteratorFirstRow',
            //'setIteratorLastRow',
            new NavOption('setIteratorRow'),
            new NavOption('syncIterator', 'construct'),// => '__construct',
        );

        return $imagickPixelIteratorExamples;
    }
    
}

 