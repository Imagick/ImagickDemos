
## Imagick-demos

An example of all the Imagick functions. Or at least most of them. The site is hosted at http://phpimagick.com/

This is currently being refactored to be easier to maintain and add examples to.
 

## PHPStorm stub file

PHPStorm ships with a stub file for Imagick, however this sometimes gets out of date. To use the Imagick extension stub file in the doc directory.

1. Go to the directory that contains the php.jar file. On a Mac this is usually:

cd "/Applications/PhpStorm EAP.app/Contents/plugins/php/lib"

2. Delete the stub file from the zip file by running the command `zip -d php.jar com/jetbrains/php/lang/psi/stubs/data/imagick.php`

3. To use it in other project, you should probably copy the file to a common location, and then add it as an external library.



## Installing Image Magick

Compiling Image Magick from source is almost certainly the best way to install it

    ./configure --enable-hdri --with-quantum-depth=32
    make install
