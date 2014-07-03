<?php

namespace ImagickDemo\Tutorial;



class compressImages extends \ImagickDemo\Example {

    function render() {
        return "Compression examples go here.";
    }
    
    function renderDead() {

        $imagick = $this->getJpg();

        $qualityReduction = clone $imagick;
        
        $standardSize = strlen($imagick->getimageblob());
        $imagick->blurimage(3, 1);
        $blurredSize = strlen($imagick->getimageblob());

        $qualityReduction->setimagecompressionquality(50);
        $reducedQualitySize = strlen($qualityReduction->getimageblob());

//        Blurred size = 
//    <img src='/subimage/Example/compressImages/jpg' />
//    <img src='/subimage/Example/compressImages/jpgWithBlur' />

        
        $url = "/subimage/Example/compressImages/jpgWithBlur";
        
        $markdown = <<< END


=== JPG

    Standard image size = $standardSize <br/>
    Blurring image size = $blurredSize <br/>
    Reduced image size = $reducedQualitySize <br/>
    


    ![Blurred jped]($url)
    

=== PNG 



=== GIF
        
        
END;
        
        //new Markdown()
        
        return $markdown;
    }


    function renderSubImage($subImageType) {

        $binding = [
            'jpg' => 'compressJpg',
            'jpgWithBlur' => 'compressJpgWithBlur',
        ];
        
        if (array_key_exists($subImageType, $binding) == false) {
            throw new \Exception("Unknown type $subImageType");
        }
        
        call_user_func([$this, $binding[$subImageType]]);
    }
    
    
    function getJpg() {
        $imagick = new \Imagick(realpath("../images/Biter.jpg"));
        $imagick->setimagecompressionquality(90);
        
        return $imagick;
    }
    
    function compressJpg() {
        $imagick = $this->getJpg();
        header("Content-Type: image/jpg");
        echo $imagick->getimageblob();
    }

    function compressJpgWithBlur() {
        $imagick = $this->getJpg();
        $imagick->blurimage(3, 1);
        header("Content-Type: image/jpg");
        echo $imagick->getimageblob();
    }

    function renderDescription2() {
        $imagick = new \Imagick(realpath("../images/bugs/asdsd.jpg"));
        $imagick->setImageFormat('jpg');

        $imagick->setimagecompressionquality(30);
        $output = $imagick->getimageblob();
        return "image size is ".strlen($output);
    }

    function renderImage() {
        
        $imagick = new \Imagick(realpath("../images/Biter_500.jpg"));
        //$imagick->setOption('jpeg:extent', '20kb');
        //$imagick->setcompressionquality(30);
        $imagick->setimagecompressionquality(30);
        
        header("Content-Type: image/jpg");
        echo $imagick->getimageblob();
    }

}