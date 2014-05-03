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

        global $imageType;

        //generate the filename for the output image
        $filename = $this->imageCachePath.$this->example->getFilename();

        $extensions = ["jpg", "gif", "png"];
        
        foreach ($extensions as $extension) {
            $filenameWithExtension = $filename.".".$extension;
             if (file_exists($filenameWithExtension) == true) {
                 \header("Content-Type: image/".$extension);
                 readfile($filenameWithExtension);
                 return; 
            }
        }

        ob_start();

        $this->example->renderImage();

        if ($imageType == null) {
            throw new \Exception("imageType not set, can't cache image correctly.");
        }

        $image = ob_get_contents();
        @mkdir(dirname ($filename), 0755, true);
        file_put_contents($filename.".".strtolower($imageType), $image);
        ob_end_flush();
    }
    
}

 