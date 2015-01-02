<?php

namespace ImagickDemo\Imagick;

class getImageCompression extends \ImagickDemo\Example {


    private $imagePath;
    
    private $compressionTypes = [
        \Imagick::COMPRESSION_NO     => 'COMPRESSION_NO',
        \Imagick::COMPRESSION_BZIP   => 'COMPRESSION_BZIP',
        \Imagick::COMPRESSION_DXT1   => 'COMPRESSION_DXT1',
        \Imagick::COMPRESSION_DXT3   => 'COMPRESSION_DXT3',
        \Imagick::COMPRESSION_DXT5   => 'COMPRESSION_DXT5',
        \Imagick::COMPRESSION_FAX    => 'COMPRESSION_FAX',
        \Imagick::COMPRESSION_GROUP4 => 'COMPRESSION_GROUP4',
        \Imagick::COMPRESSION_JPEG   => 'COMPRESSION_JPEG',
        \Imagick::COMPRESSION_JPEG2000     => 'COMPRESSION_JPEG2000',
        \Imagick::COMPRESSION_LOSSLESSJPEG => 'COMPRESSION_LOSSLESSJPEG',
        \Imagick::COMPRESSION_LZW => 'COMPRESSION_LZW',
        \Imagick::COMPRESSION_RLE => 'COMPRESSION_RLE',
        \Imagick::COMPRESSION_ZIP => 'COMPRESSION_ZIP',
    ];

    function __construct($imagePath) {
        $this->imagePath = $imagePath;
    }
    
    function renderDescription() {
        $output = implode("<br/>", $this->compressionTypes);
        
        return $output;
    }

    function render() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $typeString = "An unknown compression type";
        $compressionType = $imagick->getImageCompression();
        
        if (array_key_exists($compressionType, $this->compressionTypes)) {
            $typeString = " which is type '".$this->compressionTypes[$compressionType]."'";
        }

        return "Image compression is '".$compressionType. "' ".$typeString ;
    }
}