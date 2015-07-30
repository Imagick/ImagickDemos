<?php

namespace ImagickDemo\Imagick;

class setImageTicksPerSecond extends \ImagickDemo\Example
{
    public function renderDescription()
    {
        $output = <<< END
        Adjusts the amount of time that a frame of an animated image is displayed for.

For animated GIFs, this function does not change the number of 'image ticks' per second, which is always defined as 100. Instead it adjusts the amount of time that the frame is displayed for to simulate the change in 'ticks per second'.

        e.g Say you have an animated GIF where each frame is displayed for 20 ticks (aka 1/5 of a second) and then called setImageTicksPerSecond(50) on each frame of that image, you are effectively telling Imagick to adjust those frames to be played at half speed. After the function call each frame would be displayed for 40 ticks (aka 2/5 of a second).

Modify an animated gif so the first half of the gif is played
        at half the speed it currently is, and the second half to be 
        played at double the speed it currently is
        
END;

        return nl2br($output);
    }


    public function render()
    {
        $output = '';
        $output .= $this->renderImageURL();
        return $output;
    }
}
