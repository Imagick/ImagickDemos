<?php






/* Implement word wrapping... Ughhh... why is this NOT done for me!!!
    OK... I know the algorithm sucks at efficiency, but it's for short messages, okay?

    Make sure to set the font on the ImagickDraw Object first!
    @param image the Imagick Image Object
    @param draw the ImagickDraw Object
    @param text the text you want to wrap
    @param maxWidth the maximum width in pixels for your wrapped "virtual" text box
    @return an array of lines and line heights
*/
function wordWrapAnnotation(\Imagick $imagick, $draw, $text, $maxWidth)
{
    $words = explode(" ", $text);
    $lines = array();
    $i = 0;
    $lineHeight = 0;
    while($i < count($words) )
    {
        $currentLine = $words[$i];
        if($i+1 >= count($words))
        {
            $lines[] = $currentLine;
            break;
        }
        //Check to see if we can add another word to this line
        $metrics = $imagick->queryFontMetrics($draw, $currentLine . ' ' . $words[$i+1]);
        while($metrics['textWidth'] <= $maxWidth)
        {
            //If so, do it and keep doing it!
            $currentLine .= ' ' . $words[++$i];
            if($i+1 >= count($words))
                break;
            $metrics = $imagick->queryFontMetrics($draw, $currentLine . ' ' . $words[$i+1]);
        }
        //We can't add the next word to this line, so loop to the next line
        $lines[] = $currentLine;
        $i++;
        //Finally, update line height
        if($metrics['textHeight'] > $lineHeight)
            $lineHeight = $metrics['textHeight'];
    }
    return array($lines, $lineHeight);
}






$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$draw = new ImagickDraw();

$darkColor = new \ImagickPixel('brown');
$lightColor = new \ImagickPixel('LightCoral');

$draw->setStrokeColor($darkColor);
$draw->setFillColor($lightColor);

$draw->setStrokeWidth(2);
$draw->setFontSize(36);

$draw->setFont("../fonts/Arial.ttf");
$draw->annotation(50, 50, "Lorem Ipsum!");

//$imagick->blurImage(5, 5);

$msg = "go home yankees";

$xpos = 0;
$ypos = 0;

list($lines, $lineHeight) = wordWrapAnnotation($imagick, $draw, $msg, 140);


for($i = 0; $i < count($lines); $i++) {
    $imagick->annotateImage($draw, $xpos, $ypos + $i*$lineHeight, 0, $lines[$i]);
}



header("Content-Type: image/jpg");
echo $imagick->getImageBlob();