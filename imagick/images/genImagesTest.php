<?php




$imageURLs = [
    'Source1.png',
    'Source2.png',
];

//$baseURL = 'http://vagrant.basereality.test:8080/imagick/';

foreach($imageURLs as $imageURL) {

    $imagick = new Imagick(realpath($imageURL));

    $imagick->setImageFormat("png");
    $imagick->setImageType(\Imagick::IMGTYPE_PALETTE);
    $imagick->setImageCompressionQuality(100);
    $imagick->stripImage();


    $imagick->writeimage("./Backup.$imageURL");

    //$imagick->destroy();
}