
## Imagick-demos

An example of all the Imagick functions. Or at least most of them. The site is hosted at http://phpimagick.com/

This application uses [Tier](http://www.github.com/danack/tier) as it's 'framework'*. 

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


* It's not actually a framework, it's just an application bootstrap...the difference is that it doesn't support plugins, but does allow a response time