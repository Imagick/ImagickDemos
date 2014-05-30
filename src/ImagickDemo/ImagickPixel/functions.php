<?php



namespace ImagickDemo\ImagickPixel {

    class functions {
        static function load() {
        }
    }

/**
 * Hack the header function to allow us to capture the image type,
 * while still having clean example code.
 *
 * @param $string
 * @param bool $replace
 * @param null $http_response_code
 */
function header($string, $replace = true, $http_response_code = null) {
    global $imageType;
    global $imageCache;

    if (stripos($string, "Content-Type: image/") === 0) {
        $imageType = substr($string, strlen("Content-Type: image/"));
    }

    if ($imageCache == false) {
        \header($string, $replace, $http_response_code);
    }
}

function construct() {

    $columns = 4;
    
    $exampleColors = array(
        "rgba(100%, 0%, 0%, 0.5)",
        "hsb(33.3333%, 100%,  75%)", // medium green
        "hsl(120, 255,   191.25)", //medium green
        "graya(50%, 0.5)", //  semi-transparent mid gray
        "LightCoral", "none", //"cmyk(0.9, 0.48, 0.83, 0.50)",
        "#f00", //  #rgb
        "#ff0000", //  #rrggbb
        "#ff0000ff", //  #rrggbbaa
        "#ffff00000000", //  #rrrrggggbbbb
        "#ffff00000000ffff", //  #rrrrggggbbbbaaaa
        "rgb(255, 0, 0)", //  an integer in the range 0—255 for each component
        "rgb(100.0%, 0.0%, 0.0%)", //  a float in the range 0—100% for each component
        "rgb(255, 0, 0)", //  range 0 - 255
        "rgba(255, 0, 0, 1.0)", //  the same, with an explicit alpha value
        "rgb(100%, 0%, 0%)", //  range 0.0% - 100.0%
        "rgba(100%, 0%, 0%, 1.0)", //  the same, with an explicit alpha value
    );

    $draw = new \ImagickDraw();
    $count = 0;
    $black = new \ImagickPixel('rgb(0, 0, 0)');

    foreach ($exampleColors as $exampleColor) {
        $color = new \ImagickPixel($exampleColor);

        $draw->setstrokewidth(1.0);
        $draw->setStrokeColor($black);
        $draw->setFillColor($color);
        $offsetX = ($count % $columns) * 50 + 5;
        $offsetY = intval($count / $columns) * 50 + 5;
        $draw->rectangle(0 + $offsetX, 0 + $offsetY, 40 + $offsetX, 40 + $offsetY);
        $count++;
    }

    $image = new \Imagick();
    $image->newImage(350, 350, "blue");
    $image->setImageFormat("png");
    $image->drawImage($draw);
    header("Content-Type: image/png");
    echo $image->getImageBlob();
}

function setColor() {
    $draw = new \ImagickDraw();

    $strokeColor = new \ImagickPixel('green');
    $fillColor = new \ImagickPixel();
    $fillColor->setColor('rgba(100%, 75%, 0%, 1.0)');

    $draw->setstrokewidth(3.0);
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->rectangle(200, 200, 300, 300);

    $image = new \Imagick();
    $image->newImage(500, 500, "SteelBlue2");
    $image->setImageFormat("png");

    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}


function setColorValue() {
    $image = new \Imagick();
    $draw = new \ImagickDraw();

    $color = new \ImagickPixel('blue');
    $color->setcolorValue(\Imagick::COLOR_RED, 128);

    $draw->setstrokewidth(1.0);
    $draw->setStrokeColor($color);
    $draw->setFillColor($color);
    $draw->rectangle(200, 200, 300, 300);

    $image->newImage(500, 500, "SteelBlue2");
    $image->setImageFormat("png");
    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();

    /*
    
    <refsect1 role="examples">
      &reftitle.examples;
      <para>
       <example>
        <title>Basic <function>substr</function> usage</title>
        <programlisting role="php">
    <![CDATA[
    <?php
    
    $color  = new \ImagickPixel('firebrick');
    
    $color->setColorValue(\Imagick::COLOR_ALPHA, 0.5);
    
    print_r($color->getcolor(true));
    ?>
    ]]>
        </programlisting>
        &example.outputs;
        <screen>
    <![CDATA[
    Array
    (
        [r] => 0.69803921568627
        [g] => 0.13333333333333
        [b] => 0.13333333333333
        [a] => 0.50000762951095
    )
    ]]>
        </screen>
       </example>
      </para>
     </refsect1>
*/
}


function setColorValueQuantum() {
    $image = new \Imagick();

    $quantumRange = $image->getQuantumRange();

    $draw = new \ImagickDraw();
    $color = new \ImagickPixel('blue');
    $color->setcolorValueQuantum(\Imagick::COLOR_RED, 128 * $quantumRange['quantumRangeLong'] / 256);

    $draw->setstrokewidth(1.0);
    $draw->setStrokeColor($color);
    $draw->setFillColor($color);
    $draw->rectangle(200, 200, 300, 300);

    $image->newImage(500, 500, "SteelBlue2");
    $image->setImageFormat("png");

    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}

}




 