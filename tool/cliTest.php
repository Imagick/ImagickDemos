<?php



require __DIR__.'/../vendor/autoload.php';

\ImagickDemo\Imagick\functions::load();
\ImagickDemo\ImagickDraw\functions::load();
\ImagickDemo\ImagickPixel\functions::load();
\ImagickDemo\ImagickPixelIterator\functions::load();
\ImagickDemo\Tutorial\functions::load();


$examples = require_once "../imagick/test.data.php";



foreach ($examples as $example) {

    set_time_limit(30);
    
    list($function, $params) = $example;

    $injector = new Auryn\Provider();
    $lowried = [];
    
    foreach ($params as $key => $value) {
        $lowried[':'.$key] = $value;
    }
    
    try {
        echo "function $function \n";
        ob_start();
        $injector->execute($function, $lowried);
        $contents = ob_get_contents();
        ob_end_clean();
        $filename = str_replace('\\', '_', $function);

        $paramString = '';
        foreach ($params as $key => $value) {
            $paramString = md5($paramString . $key);
            $paramString = md5($paramString . $value);
        }

        global $imageType;
        $extension = $imageType;

        $fullFilename = sprintf(
            "cliTest/%s_%s.%s",
            $filename,
            $paramString,
            $extension
        );

        file_put_contents($fullFilename, $contents);
    }
    catch (\Exception $e) {
        ob_end_clean();
        echo "Excaption caught: ".$e->getMessage()."\n";
        echo "Params were:";
        var_dump($lowried);
    }
}
