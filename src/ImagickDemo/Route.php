<?php


namespace ImagickDemo;

class Route
{
    public static function getImageURL($activeCategory, $activeExample)
    {
        return '/image/'.$activeCategory.'/'.$activeExample;
    }
        
    public static function getOriginalImageURL($activeCategory, $activeExample)
    {
        return '/imageOriginal/'.$activeCategory.'/'.$activeExample;
    }

    public static function getCustomImageURL($activeCategory, $activeExample)
    {
        return '/customImage/'.$activeCategory.'/'.$activeExample;
    }
    
    public static function getImageStatusURL($activeCategory, $activeExample)
    {
        return '/imageStatus/'.$activeCategory.'/'.$activeExample;
    }
    
    
    public static function renderImageURL(
        $taskQueueIsActive,
        $imgURL,
        $originalImageURL,
        $statusURL
    ) {
        $useAsyncLoading = $taskQueueIsActive;
    
        $imageRender = new \ImagickDemo\Helper\ImageRender(
            $useAsyncLoading,
            $imgURL,
            $originalImageURL,
            $statusURL
        );
    
        return $imageRender->render();
    }
    

    public static function routesFunction(\FastRoute\RouteCollector $r)
    {
        $categories = '{category:Imagick|ImagickDraw|ImagickPixel|ImagickPixelIterator|ImagickKernel|Tutorial}';
    
        //Category indices
        $r->addRoute(
            'GET',
            "/$categories",
            ['ImagickDemo\Controller\Page', 'renderCategoryIndex']
        );
    
        //Category + example
        $r->addRoute(
            'GET',
            "/$categories/{example:[a-zA-Z]+}",
            ['ImagickDemo\Controller\Page', 'renderExamplePage']
        );
    
        //Images
        $r->addRoute(
            'GET',
            "/imageStatus/$categories/{example:[a-zA-Z]+}",
            ['ImagickDemo\Controller\Image', 'getImageJobStatus']
        );
    
        //Images
        $r->addRoute(
            'GET',
            "/image/$categories/{example:[a-zA-Z]+}",
            ['ImagickDemo\Controller\Image', 'getImageResponse']
        );
        
        //Original image
        $r->addRoute(
            'GET',
            "/imageOriginal/$categories/{example:[a-zA-Z]+}",
            ['ImagickDemo\Controller\Image', 'getOriginalImage']
        );
    
        //Custom images
        $r->addRoute(
            'GET',
            "/customImage/$categories/{example:[a-zA-Z]*}",
            ['ImagickDemo\Controller\Image', 'getCustomImageResponse']
        );
    
        $r->addRoute('GET', '/info', ['ImagickDemo\Controller\ServerInfo', 'createResponse']);
        $r->addRoute('GET', '/queueinfo', ['ImagickDemo\Controller\QueueInfo', 'createResponse']);
        $r->addRoute('GET', '/queuedelete', ['ImagickDemo\Controller\QueueInfo', 'deleteQueue']);
        $r->addRoute('GET', '/opinfo', ['ImagickDemo\Controller\ServerInfo', 'renderOPCacheInfo']);
        $r->addRoute('GET', '/settingsCheck', ['ImagickDemo\Controller\ServerInfo', 'serverSettings']);
        $r->addRoute('GET', '/', ['ImagickDemo\Controller\Page', 'renderTitlePage']);
        
        $r->addRoute('GET', "/css/{commaSeparatedFilenames}", ['ScriptHelper\Controller\ScriptServer', 'serveCSS']);
        $r->addRoute('GET', '/js/{commaSeparatedFilenames}', ['ScriptHelper\Controller\ScriptServer', 'serveJavascript']);
    }
}
