<?php




$imageURLs = [
    'ImagickDraw.setFillRule',
    'ImagickDraw.setStrokeMiterLimit',
    'ImagickDraw.setGravity',
];

$baseURL = 'http://vagrant.basereality.test:8080/imagick/';


foreach($imageURLs as $imageURL) {
    $url = $baseURL.$imageURL.'.php';
    
    $imagick = new Imagick($url);

    $imagick->resizeimage(
        $imagick->getImageWidth() / 2,
        $imagick->getImageHeight() / 2,
        \Imagick::FILTER_LANCZOS,
        1
    );
    
    $imagick->getImageWidth();
    $imagick->getImageHeight();

    $imagick->setImageFormat("png");
    $imagick->setImageType(\Imagick::IMGTYPE_PALETTE);
    $imagick->setImageCompressionQuality(100);
    $imagick->stripImage();

    $filename = $imageURL.'.png';
    $imagick->writeimage("./$filename");
    
    //$imagick->destroy();
}