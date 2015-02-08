<?php



require __DIR__.'/../vendor/autoload.php';


use ImagickDemo\DocHelperDisplay;


require_once "../imagick/test.data.php";

$filecount = 27;

foreach ($data as $exampleData) {

    $callLine = null;
    list($function, $params) = $exampleData;
    

    
    if (is_array($function) == true) {
        if (is_array($function[0])) {
            $function = $function[0][0];
        }
        else {
            $function = $function[0];
        }
    }

    $parts = explode('\\', $function);

    if (count($parts) == 3) {
        $category = $parts[1];
        $name = $parts[2];
    }
    else {
        echo "failed to parse ".var_export($function, true);
        exit(-1);
    }

    $docHelper = new DocHelperDisplay($category, $name);
    $examples = $docHelper->getExamples();

    $count = 0;
    
    foreach ($examples as $example) {
        $count += 1;

        $codeExample = unserialize($example);
        /** @var $codeExample \ImagickDemo\CodeExample */
        
        if (count($examples) == 1) {
            $caseName = 'basic';
        }
        else {
            $caseName = $codeExample->getDescription();
            $caseName = trim($caseName);
            if (strlen($caseName) == 0) {
                $caseName = "case$count";
            }
        }
        
        $filename = sprintf(
            "gentests/%03d_%s_%s_%s.phpt",
            $filecount,
            $category,
            $name,
            $caseName
        );

        $filecount++;

$startStub = <<< END
--TEST--
Test $category, $name
--SKIPIF--
<?php require_once(dirname(__FILE__) . '/skipif.inc'); ?>
--FILE--
<?php


END;

        
        
$endStub = <<< END
echo "Ok";
?>
--EXPECTF--
Ok
END;

        $lines = explode("\n", $codeExample->getLines());
        $testCode = '';

        foreach ($lines as $line) {
            if (strpos(trim($line), 'header("Content') === 0) {
                continue;
            }
            $echoStart = strpos($line, 'echo $');
            if ($echoStart !== false) {
                $remain = substr($line, $echoStart + strlen('echo $'));
                $testCode .= '    $bytes = $'.$remain."\n";
                $testCode .= '    if (strlen($bytes) <= 0) { echo "Failed to generate image.";} '."\n";
                continue;
            }

            
            $fontStart = strpos($line, "../fonts/Arial.ttf");
            if ($fontStart !== false) {
                continue;
            }

            $fontStart = strpos($line, "../fonts/CANDY.TTF");
            if ($fontStart !== false) {
                continue;
            }

            if (strpos($line, 'function') !== false) {
                $callLine = $line;
                $callLine = str_replace('function', '', $callLine);
                $callLine = str_replace('{', ';', $callLine);
                $callLine = trim($callLine);
            }

            $testCode .= $line."\n";
        }


//        if($filecount == 50) {
//            echo "jjjj";
//        }
//        
        
        $content  = $startStub;

        foreach ($params as $key => $value) {
            if ($key === 'imagePath') {
                continue;
            }
            
            if (is_array($value)) {
                $value = var_export($value, true);
            }
            
            $content .= sprintf(
                "\$%s = %s;\n",
                $key,
                $value
            );
        }
        $content .= "\n";
        $content .= $testCode;

        if ($callLine) {
            $content .= $callLine . "\n";
        }
        $content .= $endStub;

$searchReplace = [
    '$img1->readImage(realpath("images/Biter_500.jpg"));' => 
    '$img1->newPseudoImage(640, 480, "magick:logo");',
    //
    '$img2->readImage(realpath("images/Skyline_400.jpg"));' => 
    '$img2->newPseudoImage(640, 480, "magick:logo"); 
    $img2->negateImage(false);
    $img2->blurimage(10, 5);
',
    //////////
    '$imagePath, ' => '',
    '$channel = 134217727;' => '$channel = Imagick::CHANNEL_DEFAULT;',
    /////
    '$imagick = new \Imagick(realpath($imagePath));' => 
    '$imagick = new \Imagick();
    $imagick->newPseudoImage(640, 480, "magick:logo");',
    ////
    
    'new \Imagick(realpath("images/NYTimes-Page1-11-11-1918.jpg"));' =>
    '$imagick = new \Imagick();
    $imagick->newPseudoImage(640, 480, "magick:logo");',
    
    //

    '$imagick = new \Imagick(realpath($this->control->getImagePath()));' =>
    '$imagick = new \Imagick();
    $imagick->newPseudoImage(640, 480, "magick:logo");',


    '$texture = new \Imagick(realpath());' =>
    '$texture = new \Imagick();
    $texture->newPseudoImage(640, 480, "magick:logo");',
    
    
    
    '$clutImagick = new \Imagick(realpath("images/webSafe.png"));' =>
    '$clutImagick = new \Imagick();
    $clutImagick->newPseudoImage(640, 480, "magick:NETSCAPE");',

        ///
    
    
    '= rgb(225, 225, 225);' => "= 'rgb(225, 225, 225)';", 
    '= rgb(0, 0, 0);' => "= 'rgb(0, 0, 0)';",
    '= DodgerBlue2;' => "= 'DodgerBlue2';",
    '= DeepPink2;' => "= 'DeepPink2';",
    '= LightCoral;' => "= 'LightCoral';",


    '= rgb(232, 227, 232);' => "= 'rgb(232, 227, 232)';",
    '= rgb(127, 127, 127);' => "= 'rgb(127, 127, 127)';",

    '= gradient:;' => "= 'gradient:';",
    '= o8x8;' => '= "o8x8";', 
    
    
    
    'IMAGE_WIDTH' => '500',
    'IMAGE_HEIGHT' => '500',
    
    '($imagePath)' => '()',

];


        $content = str_replace(array_keys($searchReplace), array_values($searchReplace), $content);
        

        file_put_contents(
            $filename,
            $content
        );
        
    }
}
