<?php




$imageURLs = [

    'Imagick/newPseudoImage2',
    'Imagick/sparseColorImage_barycentric',
    'Imagick/sparseColorImage_barycentric2',

    'ImagickDraw/setFillRule',
    'ImagickDraw/setStrokeMiterLimit',
    'ImagickDraw/setGravity',
];

$baseURL = 'http://imagick.intahwebz.test:8080/';


foreach($imageURLs as $imageURL) {
    $url = $baseURL.$imageURL.'.php';

    echo "Fetching $url \n";

    $imagick = new Imagick($url);

    if (false) {
        $imagick->resizeimage(
            $imagick->getImageWidth() / 2,
            $imagick->getImageHeight() / 2,
            \Imagick::FILTER_LANCZOS,
            1
        );

    //    $imagick->getImageWidth();
    //    $imagick->getImageHeight();
    }

    $imagick->setImageFormat("png");
    //$imagick->setImageType(\Imagick::IMGTYPE_PALETTE);
    //$imagick->setImageCompressionQuality(100);
    $imagick->stripImage();

    $filename = str_replace('/', '_', $imageURL).'.png';
    $imagick->writeimage("./generated/$filename");
    
    //$imagick->destroy();
}