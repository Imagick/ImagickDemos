<?php

namespace ImagickDemo\Tutorial;

class diffMarking extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Difference marking";
    }

    public function getOriginalImage()
    {
        return "/images/compare1.png";
    }


    
    public function renderDescription()
    {
        return "A very simple example to show how to find the differences between two images, mark them with a red outline, and then render the image as an animated gif so that the differences can be seen easily.";
    }
}
