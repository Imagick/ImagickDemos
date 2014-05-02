<?php


namespace ImagickDemo;




class ImageExampleCache {

    /** @var  \ImagickDemo\Example */
    private $example;
    
    private $imageCachePath;
    
    function __construct(\ImagickDemo\Example $example, $imageCachePath) {
        $this->example = $example;
        $this->imageCachePath = $imageCachePath;
    }


    function renderImageSafe() {
        $this->renderImage();
    }

    function renderImage() {

        @mkdir($this->imageCachePath, 0755, true);
        
        //generate the filename for the output image
        $filename = $this->imageCachePath.$this->example->getFilename();

        $extension = "jpg";
        $filenameWithExtension = $filename.".".$extension;

         if (file_exists($filenameWithExtension) == true) {
             \header("Content-Type: image/".$extension);
             readfile($filenameWithExtension);
             return; 
        }
        
        ob_start();
        $this->example->renderImage();
        $image = ob_get_contents();
        file_put_contents($filename.".jpg", $image);
        ob_end_flush();
    }
    
}

 