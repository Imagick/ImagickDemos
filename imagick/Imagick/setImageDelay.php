<?php

$imagick = new Imagick(realpath("Test.gif"));
$imagick = $imagick->coalesceImages();

$frameCount = 0;

foreach ($imagick as $frame) {

    $imagick->setImageDelay((($frameCount % 11) * 5));
    $frameCount++;
}

$imagick = $imagick->deconstructImages();

$imagick->writeImages("/path/to/save/output.gif", true);


?>

<refsect1 role="examples">
  &reftitle.examples;
  <para>
   <example>
    <title>Modify animated Gif with <function>Imagick::setImageDelay</function></title>
    <programlisting role="php">
<![CDATA[
<?php
//Modify an animated Gif so that it's frames are played at
//a variable speed, varying between being shown for 50milliseconds
//down to 0ms, which will cause the frame to be skipped in 
//most browsers.
$imagick = new Imagick(realpath("Test.gif"));
$imagick = $imagick->coalesceImages();

$frameCount = 0;

foreach ($imagick as $frame) {
    $imagick->setImageDelay((($frameCount % 11) * 5));
    $frameCount++;
}

$imagick = $imagick->deconstructImages();

$imagick->writeImages("/path/to/save/output.gif", true);

?>
]]>
</programlisting>
</para>
</refsect1>





