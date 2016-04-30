<?php

namespace ImagickDemo\Imagick;

class setImageCompressionQuality extends \ImagickDemo\Example
{
    function getOriginalImage()
    {
        return $this->control->getOriginalURL();
    }

    function getOriginalFilename()
    {
        return $this->control->getImagePath();
    }

    public function renderDescription()
    {


        /*
        
        //10's digit:
    //
    //        0 or omitted: Use Z_HUFFMAN_ONLY strategy with the
    //           zlib default compression level
    //
    //        1-9: the zlib compression level
    //
    //     1's digit:
    //
    //        0-4: the PNG filter method
    //
    //        5:   libpng adaptive filtering if compression level > 5
    //             libpng filter type "none" if compression level <= 5
    //or if image is grayscale or palette
    //
    //        6:   libpng adaptive filtering
    //
    //        7:   "LOCO" filtering (intrapixel differing) if writing
    //a MNG, otherwise "none".  Did not work in IM-6.7.0-9
    //and earlier because of a missing "else".
    //
    //8:   Z_RLE strategy (or Z_HUFFMAN_ONLY if quality < 10), adaptive
    //             filtering. Unused prior to IM-6.7.0-10, was same as 6
    //
    //        9:   Z_RLE strategy (or Z_HUFFMAN_ONLY if quality < 10), no PNG filters
    //             Unused prior to IM-6.7.0-10, was same as 6
    
    
    
    
    $imagick = new Imagick($inputFilename);
    
    for ($compression = 0; $compression <= 9; $compression++) {
        echo "Compression $compression \n";
        for ($filter = 0; $filter <= 9; $filter++) {
            echo "Filter $filter";
            $output = clone $imagick;
            $output->setImageFormat('png');
            $compressionType = "".intval($compression . $filter);
            echo "q = $compressionType\n";
            
            //Use this for ImageMagick releases after 6.8.7-5
            $output->setCompressionQuality($compressionType);
            
            //Use this for ImageMagick releases before 6.8.7-5 
            //$output->setImageCompressionQuality($compressionType);
    
            $outputName = "./output_"."$compression$filter.png";
            $output->writeImage($outputName);
        }
        echo "\n";
    }
    
        
        
        */

        return "";
    }
    
    public function render()
    {
        return $this->renderImageURL();
    }
}
