<?php


namespace ImagickDemo\ImagickDraw;


class ImagickDraw {


    function display($example, \Auryn\Provider $provider) {

        ////$imageURL = '\ImagickDemo\ImagickDraw\'.$example;

        $classname = 'ImagickDemo\ImagickDraw\\' . $example;

        $provider->alias('ImagickDemo\Example', $classname);
    }

    function renderImage($example, \Auryn\Provider $provider) {

        $classname = '\ImagickDemo\ImagickDraw\\' . $example;
        $provider->execute([$classname, 'renderImage']);
    }

}

 