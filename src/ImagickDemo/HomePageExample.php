<?php

namespace ImagickDemo;

use ImagickDemo\Config;

class HomePageExample extends \ImagickDemo\Example
{
    /**
     * Get number of bootstrap columns the content should be offset by
     * @return int
     */
    public function getColumnOffset()
    {
        return 2;
    }

    public function getColumnRightOffset()
    {
        return 2;
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        $output = <<< END
   
<p>
This site is an attempt to provide a working example of every function in the <a href='http://www.php.net/manual/en/book.imagick.php'>Imagick</a> extension library. The examples are split into the categories:
</p>

<p>
    <ul>
        <li><a href='/Imagick'>Imagick</a> - covers all the methods of the Imagick class which how to modify pixel based images.</li>

        <li><a href='/ImagickDraw'>ImagickDraw</a> - covers the ImagickDraw class which allows drawing vector based images.</li>
        
        <li><a href='/ImagickPixel'>ImagickPixel</a> - the ImagickPixel class represents colors, and this category shows how colors are represented in Imagick.</li>
        
        <li><a href='/ImagickPixelIterator'>ImagickPixelOperator</a> - allows accessing and modifying the pixels directly from PHP.</li>
        
        <li><a href='/ImagickKernel'>ImagickKernel</a> - used by morphology and filter functions.</li>

        <li><a href='/Tutorial'>Tutorial</a> - a set of more advanced examples that show how some complex effects can be achieved with Imagick. </li>
    </ul>
</p>

 <p>
    All of the source code for this site is available on <a href='https://github.com/Danack/Imagick-demos' target='_blank'>Github</a>, with most of the examples split by category
     
     <a href='https://github.com/Danack/Imagick-demos/blob/master/src/ImagickDemo/Imagick/functions.php' target='_blank'>Imagick
     </a>,
     
     <a href='https://github.com/Danack/Imagick-demos/blob/master/src/ImagickDemo/ImagickDraw/functions.php' target='_blank'>ImagickDraw</a>,
     
     <a href='https://github.com/Danack/Imagick-demos/blob/master/src/ImagickDemo/ImagickPixel/functions.php' target='_blank'>ImagickPixel</a>, <a href='https://github.com/Danack/Imagick-demos/tree/master/src/ImagickDemo/ImagickPixelIterator' target='_blank'>ImagickPixelIterator</a> and 
     
     <a href='https://github.com/Danack/Imagick-demos/blob/master/src/ImagickDemo/Example/functions.php'>tutorials.</a> The code for the more complicated examples has it's source in the controller
</p>

<p>If you find any issues with this site, or if you find any example missing, or think something needs covering in more detail, please raise it as an issue on Github.
</p>

<hr/>

<p>
This site uses ImageMagick 7 by default. But the sub-domains <a href="https://im6.phpimagick.com">im6.phpimagick.com</a> and <a href="https://im7.phpimagick.com">im7.phpimagick.com</a> allow you to choose which version of ImageMagick to use.
</p> 

<hr/>

END;

        $output .= "Site version is: " . Config::getVersion() . "<br/>";
        $output .= "Site deployed at: " . Config::getDeployTime() . "<br/>";

        $version = phpversion("Imagick");
        if ($version === "@PACKAGE_VERSION@") {
            $version = "built from git.";
        }

        $output .= "Imagick version is: " . $version . "<br/>";

        $output .= "ImageMagick version info is:<br/>";

        $versionInfo = \Imagick::getVersion();
        $output .= sprintf(
            "<span class='tab'>versionNumber = 0x%x</span><br/>",
            $versionInfo['versionNumber']
        );
        $output .= "<span class='tab'>versionString = " . $versionInfo['versionString'] . "</span><br/>";

        return $output;
    }

    public function renderTitle(): string
    {
        return "PHP Imagick by example";
    }

    public function renderImage()
    {
    }
}
