
## Imagick-demos


An example of all the Imagick functions. Or at least most of them.


## PHPStorm stub file

PHPStorm ships with a stub file for Imagick, however this sometimes gets out of date. To use the Imagick extension stub file in the doc directory.

1. go to the directory that contains the php.jar file. On a Mac this is usually:

cd "/Applications/PhpStorm EAP.app/Contents/plugins/php/lib"

2. Delete the stub file from the zip file by running the command `zip -d php.jar com/jetbrains/php/lang/psi/stubs/data/imagick.php`

3. To use it in other project, you should probably copy the file to a common location, and then add it as an external library.



## Installing Image Magick

Compiling Image Magick from source is almost certainly the best way to install it

    ./configure --enable-hdri --with-quantum-depth=32
    make install



## Developer notes


### Adding a control

The controls use [Weaver](http://www.github.com/Danack/Weaver) to produce a composite control from the control elements. The steps required to add a control are:

1) In tools/weaveControls.php define what the composite class name will be and what control elements it requires e.g. 

    'ImagickDemo\Imagick\Control\rollImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\RollX',
        'ImagickDemo\ControlElement\RollY',
    ],

2) Run weaveControls.php which will produce the class.

3) In src/ImagickDemo/Navigation/CategoryNav.php edit the entry for the example

    'rollImage' => [  //The rollImage example 
        'rollImage',    //Is displayed by the \ImagickDemo\Imagick\rollImage class
        \ImagickDemo\Imagick\Control\rollImage::class  //And requires this control.
    ],


4) If you have added a new control element that handles a new parameter you will need to fixup up the DI. In the function `delegateAllTheThings()` in bootstrap.php add the new parameter to the huge list of parameters. The parameter will now automatically be available to the function call for the example.

