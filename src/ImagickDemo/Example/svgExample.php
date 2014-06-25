<?php


namespace ImagickDemo\Example;


use Imagick;

class svgExample extends \ImagickDemo\Example {


    function render() {
        $output = "This is a description. <br/>";
        $output .= $this->renderImageURL();
        return $output;
    }

    
    function renderImage() {

        $svg = <<< END
<svg version='1.0' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='746' height='742' viewBox='-362 -388 746 742' encoding='UTF-8' standalone='no'>
    <defs>
        <ellipse id='ellipse' cx='36' cy='-56' rx='160' ry='320' />
        <g id='ellipses'>
            <use xlink:href='#ellipse' fill='#0000ff' />
            <use xlink:href='#ellipse' fill='#0099ff' transform='rotate(72)' />
        </g>
    </defs>
</svg>

END;

        $image = new \Imagick();
        $image->readImageBlob($svg);
        $image->setImageFormat("jpg");
        header("Content-Type: image/jpg");
        echo $image;

    }
    
    function renderImage2() {
            $SVG = '<?xml version="1.0" encoding="utf-8"?>';
            $SVG .= '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">';
            $SVG .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="158px" height="92px" viewBox="0 0 158 92" enable-background="new 0 0 158 92" xml:space="preserve">';
            $SVG .= '<text transform="matrix(1 0 0 1 32 58)" font-family="Lobster" font-style="normal" font-size="20px" font-weight="400">Lobster</text>';
            $SVG .= '</svg>';
    
            $image = new \Imagick();
            $image->readImageBlob($SVG);
            $image->setImageFormat("jpg");
            header("Content-Type: image/jpg");
            echo $image;
    }
}

 