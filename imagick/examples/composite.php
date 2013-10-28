<?php


$listOfExamples = [
  ['multiplyGradients', 'Multiply two gradients'],

  ['screenGradients', 'Screen two gradients'],

  ['divide', 'Divide image'],
];

if (array_key_exists('example', $_REQUEST)) {
    showExample($_REQUEST['example'], $listOfExamples);
    exit(0);
}


showPage($listOfExamples);

function showExample($exampleName, $listOfExamples) {

    foreach ($listOfExamples as $example) {
        if($example[0] == $exampleName) {
            $example[0](500, 500);
            exit(0);
        }
    }
}



function showPage($examples) {

    echo "<html>
        <body>";

    echo "Select a demo:<br/>";

    echo "<select onchange='setExample(this);'>";

    echo "<option value='-1' >Choose a demo</option>";

    foreach($examples as $example) {

        echo "<option value='".$example[0]."'>".$example[1]."</option>";
    }

    echo "</select>";

    echo "<br/>";

    echo "<img src='' id='exampleImage'/>";

    //style='diplay: hidden'


    echo "</body>

    <script src='/js/jquery-1.9.1.min.js'></script>
    <script src='/js/jquery-ui-1.10.0.custom.min.js'></script>

    <script type='text/javascript'>

    function setExample(dropdown) {
        var value = $(dropdown).val();

        var url = '/examples/composite.php?example=' + encodeURIComponent(value);

        var image = $('#exampleImage');

        if (image) {
            image.attr('src', url);
            image.css('display', 'inline-block');
        }
        else {
            alert('image not found');
        }
    }

    </script>


    </html>";
}



function multiplyGradients($width, $height) {

    $imagick = new Imagick(realpath("../images/gradientDown.png"));

    $imagick2 = new Imagick(realpath("../images/gradientRight.png"));

    $imagick->compositeimage(
        $imagick2,
        Imagick::COMPOSITE_MULTIPLY,
        0, 0
    );

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}


//Imagick::COMPOSITE_SCREEN,

function screenGradients($width, $height) {

    $imagick = new Imagick(realpath("../images/gradientDown.png"));

    $imagick2 = new Imagick(realpath("../images/gradientRight.png"));

    $imagick->compositeimage(
        $imagick2,
        Imagick::COMPOSITE_SCREEN,
        0, 0
    );

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}


function divide($width, $height) {

    $imagick = new Imagick(realpath("../images/text_scan.png"));

    $imagickCopy = clone $imagick;

    $imagickCopy->blurImage(0x20, 1);

//    convert text_scan.png \( +clone -blur 0x20 \) \
//        -compose Divide_Src -composite  text_scan_divide.png


    $imagick->compositeimage(
        $imagickCopy,
        Imagick::COMPOSITE_COLORDODGE,
        0, 0
    );

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}



//
//
//
//$compositeModes = [
//
//Imagick::COMPOSITE_NO,
//Imagick::COMPOSITE_ADD,
//Imagick::COMPOSITE_ATOP,
//Imagick::COMPOSITE_BLEND,
//Imagick::COMPOSITE_BUMPMAP,
//Imagick::COMPOSITE_CLEAR,
//Imagick::COMPOSITE_COLORBURN,
//Imagick::COMPOSITE_COLORDODGE,
//Imagick::COMPOSITE_COLORIZE,
//Imagick::COMPOSITE_COPYBLACK,
//Imagick::COMPOSITE_COPYBLUE,
//Imagick::COMPOSITE_COPY,
//Imagick::COMPOSITE_COPYCYAN,
//Imagick::COMPOSITE_COPYGREEN,
//Imagick::COMPOSITE_COPYMAGENTA,
//Imagick::COMPOSITE_COPYOPACITY,
//Imagick::COMPOSITE_COPYRED,
//Imagick::COMPOSITE_COPYYELLOW,
//Imagick::COMPOSITE_DARKEN,
//Imagick::COMPOSITE_DSTATOP,
//Imagick::COMPOSITE_DST,
//Imagick::COMPOSITE_DSTIN,
//Imagick::COMPOSITE_DSTOUT,
//Imagick::COMPOSITE_DSTOVER,
//Imagick::COMPOSITE_DIFFERENCE,
//Imagick::COMPOSITE_DISPLACE,
//Imagick::COMPOSITE_DISSOLVE,
//Imagick::COMPOSITE_EXCLUSION,
//Imagick::COMPOSITE_HARDLIGHT,
//Imagick::COMPOSITE_HUE,
//Imagick::COMPOSITE_IN,
//Imagick::COMPOSITE_LIGHTEN,
//Imagick::COMPOSITE_LUMINIZE,
//Imagick::COMPOSITE_MINUS,
//Imagick::COMPOSITE_MODULATE,
//Imagick::COMPOSITE_MULTIPLY,
//Imagick::COMPOSITE_OUT,
//Imagick::COMPOSITE_OVER,
//Imagick::COMPOSITE_OVERLAY,
//Imagick::COMPOSITE_PLUS,
//Imagick::COMPOSITE_REPLACE,
//Imagick::COMPOSITE_SATURATE,

//Imagick::COMPOSITE_SOFTLIGHT,
//Imagick::COMPOSITE_SRCATOP,
//Imagick::COMPOSITE_SRC,
//Imagick::COMPOSITE_SRCIN,
//Imagick::COMPOSITE_SRCOUT,
//Imagick::COMPOSITE_SRCOVER,
//Imagick::COMPOSITE_SUBTRACT,
//Imagick::COMPOSITE_THRESHOLD,
//Imagick::COMPOSITE_XOR,
//
//];
//
//
//
