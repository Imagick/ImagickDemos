<?php

namespace Osf\Route;



// Each row of this array should return an array of:
// - The path to match
// - The method to match
// - The route info
// - (optional) A setup callable to add middleware/DI info specific to that route
//
$categories = '{category:Imagick|ImagickDraw|ImagickPixel|ImagickPixelIterator|ImagickKernel|Tutorial}';

// This allows use to configure data per endpoint e.g. the endpoints that should be secured by
// an api key, should call an appropriate callable.
return [

    [
        "/$categories",
        'GET',
        ['ImagickDemo\Controller\Page', 'renderCategoryIndex']
    ],

    [
        "/imagick",
        'GET',
        ['ImagickDemo\Controller\Page', 'renderCategoryIndex']
    ],

    //Category + example
    [
        "/$categories/{example:[a-zA-Z]+}",
        'GET',
        ['ImagickDemo\Controller\Page', 'renderExamplePage']
    ],

    //Images
    [
        "/imageStatus/$categories/{example:[a-zA-Z]+}",
        'GET',
        ['ImagickDemo\Controller\Image', 'getImageJobStatus']
    ],

    //Images
    [
        "/image/$categories/{example:[a-zA-Z]+}",
        'GET',
        ['ImagickDemo\Controller\Image', 'getImageResponse']
    ],

    //Original image
    [
        "/imageOriginal/$categories/{example:[a-zA-Z]+}",
        'GET',
        ['ImagickDemo\Controller\Image', 'getOriginalImage']
    ],

    //Custom images
    [
        "/customImage/$categories/{example:[a-zA-Z]*}",
        'GET',
        ['ImagickDemo\Controller\Image', 'getCustomImageResponse']
    ],

    ['/notes', 'GET',  ['ImagickDemo\Controller\Notes', 'getNotesPage']],

    ['/info', 'GET', ['ImagickDemo\Controller\ServerInfo', 'createResponse']],
    ['/queueinfo', 'GET',  ['ImagickDemo\Controller\QueueInfo', 'createResponse']],
    ['/queuedelete', 'GET',  ['ImagickDemo\Controller\QueueInfo', 'deleteQueue']],
    ['/opinfo', 'GET',  ['ImagickDemo\Controller\ServerInfo', 'renderOPCacheInfo']],
    ['/settingsCheck', 'GET', ['ImagickDemo\Controller\ServerInfo', 'serverSettings']],


    ["/css/{commaSeparatedFilenames}", 'GET', ['ScriptHelper\Controller\ScriptServer', 'serveCSS']],
    ['/js/{commaSeparatedFilenames}', 'GET', ['ScriptHelper\Controller\ScriptServer', 'serveJavascript']],

    ['/wat', 'GET', 'Osf\AppControlaler\Pages::index'],
    ['/wat/', 'GET', 'Osf\AppControasddaller\Pages::index'],

    ['/', 'GET', ['ImagickDemo\Controller\Page', 'renderTitlePage']],

//    // TODO - actually make a 404 page
//    ['/{any:.*}', 'GET', 'Osf\AppController\Pages::index'],
];

