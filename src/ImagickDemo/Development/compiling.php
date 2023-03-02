<?php

namespace ImagickDemo\Development;



function getWords()
{

    $html = <<< 'HTML'

<h2>Imagick</h2>

In a perfect world, the only commands needed to compile Imagick are:

<pre>
phpize
./configure
make install
</pre>

<ul>
 <li>phpize - uses the scripts supplied by PHP to generate a make file</li>
 <li>./configure - checks where all the headers are</li>
 <li>make install - makes and install</li>

</ul>


If you do run into problems, there are some options available through the configure program:

<pre>
./configure --help
</pre>


Probably the most useful one is being able to point where the ImageMagick headers + libraries live:

<pre>
./configure --with-imagick=/opt/danack
</pre>

<pre>
./configure \
  --with-php-config=/opt/danack/bin/php-config \
  --with-imagick=/opt/danack
</pre>



<h3>CFLAGS</h3>

<pre>
export CFLAGS=-Wno-deprecated-declarations
</pre>

<h2>OSX + Brew</h2>

<h3>PHP</h3>

<p>
Brew deliberately doesn't expose the OpenSSL package to avoid programs finding it by accident, so to get PHP to find it you need to do something like:
</p>

<pre>
export PKG_CONFIG_PATH="/opt/homebrew/Cellar/openssl@1.1/1.1.1s/lib/pkgconfig:$PKG_CONFIG_PATH"
</pre>


<p>ImageMagick apparently has difficulty locating the JPEG libraries installed by Brew. Although I'm sure you can pass their location 'properly', you can also do it by hard-coding them in your bash (or ZSH) shell settings.</p>

<pre>
cat ~/.zshrc
export PATH="/opt/homebrew/opt/bison/bin:/opt/danack/bin:/Users/danack/Library/Python/3.9/bin/:$PATH"
export CFLAGS="-I/opt/homebrew/Cellar/jpeg/9e/include -I/opt/danack/include/ImageMagick-7 -I/opt/danack/php"
export CPPFLAGS="-I/opt/homebrew/Cellar/jpeg/9e/include -I/opt/danack/include/ImageMagick-7 -I/opt/danack/php"
export LDFLAGS="-L/opt/homebrew/Cellar/jpeg/9e/lib -ljpeg"
</pre>


<p>You probably don't want to install PHP into a system directory, as that requires super-user permissions. Instead of that, you can configure PHP with --prefix and --exec-prefix pointing to somewhere in the /opt directory, and add the relevant bin paths to the PATH variable:</p>

<pre>
./configure \
  --enable-mbstring \
  --without-iconv \
  --with-curl \
  --disable-phpdbg \
  --prefix=/opt/danack \
  --exec-prefix=/opt/danack \
  --with-openssl \
  --enable-debug \
  --enable-debug-assertions
</pre>


<h3>ImageMagick</h3>

<pre>
./configure \
  --disable-docs \
  --with-quantum-depth=16 \
  --with-fftw \
  --with-fontconfig=yes \
  --with-jpeg=yes \
  --with-magick-plus-plus=no \
  --with-png=yes \
  --with-tiff=yes \
  --with-webp=yes \
  --without-perl \
  --without-zstd \
  --enable-hdri=yes \
  --prefix=/opt/danack \
  --exec-prefix=/opt/danack
</pre>



<pre>
Delegate library configuration:
  BZLIB             --with-bzlib=yes		yes
  Autotrace         --with-autotrace=no		no
...
  HEIC              --with-heic=yes		no
  JBIG              --with-jbig=yes		no
  JPEG v1           --with-jpeg=yes		yes
  JPEG XL           --with-jxl=yes		no
...
  PERL              --with-perl=no		no
  PNG               --with-png=yes		yes
...
  TIFF              --with-tiff=yes		no
  WEBP              --with-webp=yes		yes

</pre>


HTML;

    return $html;
}


class compiling extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Various compiling notes";
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    ) {

        return getWords();
    }


    public function renderDescription()
    {
        return "These are some notes on how to compile Imagick. They are probably going to be slightly disorganised for a while.";
    }
}
