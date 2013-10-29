<?php

//Modify an animated gif so the first half of the gif is played
//at half the speed it currently is, and the second half to be 
//played at double the speed it currently is

$imagick = new Imagick(realpath("BloodyHell.gif"));
$imagick = $imagick->coalesceImages();

$totalFrames = $imagick->getNumberImages();

$frameCount = 0;

foreach ($imagick as $frame) {

    $imagick->setImageTicksPerSecond(50);
    
    if ($frameCount < ($totalFrames / 2)) {
        //Modify the frame to be displayed for twice as long as it currently is.
        $imagick->setImageTicksPerSecond(50);
    }
    else{
        //Modify the frame to be displayed for half as long as it currently is.
        $imagick->setImageTicksPerSecond(200);
    }
    $frameCount++;
}

$imagick = $imagick->deconstructImages();

$imagick->writeImages("/home/intahwebz/intahwebz/basereality/imagick/frameRate.gif", true);




/*

Adjusts the amount of time that a frame of an animated image is displayed for.

For animated GIFs, this function does not change the number of 'image ticks' per second, which is always defined as 100. Instead it adjusts the amount of time that the frame is displayed for to simulate the change in 'ticks per second'. 

e.g Say you have an animated GIF where each frame is displayed for 20 ticks (aka 1/5 of a second) and then called setImageTicksPerSecond(50) on each frame of that image, you are effectively telling Imagick to adjust those frames to be played at half speed. After the function call each frame would be displayed for 40 ticks (aka 2/5 of a second).



<refsect1 role="examples">
    &reftitle.examples;
    <para>
        <example>
            <title>Modify animated Gif with <function>Imagick::setImageTicksPerSecond</function></title>
            <programlisting role="php">
                <![CDATA[
<?php

//Modify an animated gif so the first half of the gif is played
//at half the speed it currently is, and the second half to be 
//played at double the speed it currently is

$imagick = new Imagick(realpath("Test.gif"));
$imagick = $imagick->coalesceImages();

$totalFrames = $imagick->getNumberImages();

$frameCount = 0;

foreach ($imagick as $frame) {

    $imagick->setImageTicksPerSecond(50);
    
    if ($frameCount < ($totalFrames / 2)) {
        //Modify the frame to be displayed for twice as long as it currently is.
        $imagick->setImageTicksPerSecond(50);
    }
    else{
        //Modify the frame to be displayed for half as long as it currently is.
        $imagick->setImageTicksPerSecond(200);
    }
    $frameCount++;
}

$imagick = $imagick->deconstructImages();

$imagick->writeImages("/path/to/save/output.gif", true);
?>
]]>
            </programlisting>
            </example>
    </para>
</refsect1>



*/

