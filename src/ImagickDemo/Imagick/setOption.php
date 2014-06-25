<?php


namespace ImagickDemo\Imagick;


class setOption extends \ImagickDemo\Example {

    /**
     * @var Control\setOption
     */
    private $setOptionControl;
    
    function __construct(\ImagickDemo\Imagick\Control\setOption $control) {
        $this->setOptionControl = $control;
    }

    function getCustomImageParams() {
        return $this->setOptionControl->getParams();
    }


    function render() {
        return $this->renderCustomImageURL();
    }


    function renderCustomImageURL() {
        return sprintf(
            "<img src='%s' />",
            $this->setOptionControl->getCustomImageURL()
        );
    }
    
    function renderCustomImage() {
        
        switch($this->setOptionControl->getImageOption()) {

            case (0): {
                $this->renderJPG('10kb');
                break;
            }
            case (1): {
                $this->renderJPG('60kb');
                break;
            }
            case (2): {
                $this->renderPNG('png00');
                break;
            }
            case (3): {
                $this->renderPNG('png64');
                break;
            }
            case (4): {
                $this->renderCustomBitDepthPNG();
                 break;
            }
        }
    }

//Example Imagick::setOption
    function renderJPG($extent) {
        $imagePath = $this->setOptionControl->getImagePath();
        $imagick = new \Imagick(realpath($imagePath));
        $imagick->setImageFormat('jpg');
        $imagick->setOption('jpeg:extent', $extent);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
//Example end

//Example Imagick::setOption
    function renderPNG($format) {
        $imagePath = $this->setOptionControl->getImagePath();
        $imagick = new \Imagick(realpath($imagePath));
        $imagick->setImageFormat('png');
        $imagick->setOption('png:format', $format);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
//Example end

    // color types.  Note that not all combinations are legal
    #define PNG_COLOR_TYPE_GRAY         0
    #define PNG_COLOR_TYPE_RGB          2
    #define PNG_COLOR_TYPE_PALETTE      3
    #define PNG_COLOR_TYPE_GRAY_ALPHA   4
    #define PNG_COLOR_TYPE_RGB_ALPHA    6
//Example Imagick::setOption
    function renderCustomBitDepthPNG() {
        $imagePath = $this->setOptionControl->getImagePath();
        $imagick = new \Imagick(realpath($imagePath));
        $imagick->setImageFormat('png');
        
        $imagick->setOption('png:bit-depth', '16');
        $imagick->setOption('png:color-type', 6);
        header("Content-Type: image/png");
        $crash = true;
        if ($crash) {
            echo $imagick->getImageBlob();
        }
        else {
            $tempFilename = tempnam('./', 'imagick');
            $imagick->writeimage(realpath($tempFilename));
            echo file_get_contents($tempFilename);
        }
    }
//Example end
}




/*




//$imagick->setOption('png:format', 'png32');
////$imagick->setOption('png:format', 'png00');
//
////png8, png24, png32, png48, png64, and png00.


Set a definition for coders and decoders to use while reading and writing image data. Definitions are generally used to control image file format coder modules, and image processing operations, beyond what is provided by normal means.

See [also](http://www.imagemagick.org/script/command-line-options.php#define) for the full list of options.


<refsect1 role="examples">
    &reftitle.examples;
    <para>
        <example>
            <title>Set the max file size to save an JPEG image with <function>Imagick::setOption</function></title>
            <programlisting role="php">
                <![CDATA[
<?php

$imagick = new \Imagick(realpath($this->imagePath));
$imagick->setImageFormat('jpg');
$imagick->setOption('jpeg:extent', '40kb');

$tempFilename = tempnam('./', 'imagick');
$imagick->writeimage(realpath($tempFilename));
header("Content-Type: image/jpg");
echo file_get_contents($tempFilename);

]]>
</programlisting>
</example>
</para>
</refsect1>


 <refsect1 role="notes">
    &reftitle.notes;
    <note>
     <title>getImageBlob not possible after setOption('jpeg:extent', $size);</title>
     <para>
      This function does not return the alpha value of the color.
    Calling \Imagick::getImageBlob() on a JPG image that has the 'jpeg:extent' option set may cause a segault in the Image Magick library. Saving to a file does not show this issue.
     </para>
    </note>
   </refsect1>
*/


/*

*** glibc detected *** /usr/local/bin/php: double free or corruption (!prev): 0x0000000002671ce0 ***
======= Backtrace: =========
/lib64/libc.so.6(+0x760e6)[0x7f285292c0e6]
/lib64/libc.so.6(+0x78c13)[0x7f285292ec13]
/usr/lib64/libjpeg.so.62(+0x2919a)[0x7f285613519a]
/usr/lib64/libjpeg.so.62(jpeg_abort+0x15)[0x7f285611e185]
/usr/local/lib/libMagickCore-6.Q16.so.1(+0x25142b)[0x7f2848a3e42b]
/usr/local/lib/libMagickCore-6.Q16.so.1(+0x24f9fb)[0x7f2848a3c9fb]
/usr/local/lib/libMagickCore-6.Q16.so.1(WriteImage+0x5fc)[0x7f2848883e5c]
/usr/local/lib/libMagickCore-6.Q16.so.1(ImageToBlob+0x154)[0x7f28488530d4]
/usr/local/lib/php/extensions/no-debug-zts-20121212/imagick.so(zim_imagick_getimageblob+0x83)[0x7f28490ab8a3]
/usr/local/bin/php[0x7beaf2]
/usr/local/bin/php(execute_ex+0x4b)[0x7aec0b]
/usr/local/bin/php(zend_execute_scripts+0x1e7)[0x72ebb7]
/usr/local/bin/php(php_execute_script+0x1fb)[0x6c3b4b]
/usr/local/bin/php[0x7f1024]
/usr/local/bin/php[0x7f18ad]
/lib64/libc.so.6(__libc_start_main+0xfd)[0x7f28528d4cdd]
/usr/local/bin/php[0x4337a9]
*/

