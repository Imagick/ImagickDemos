<?php


namespace ImagickDemo\Controller;

use Intahwebz\Request;
use ImagickDemo\Response\FileResponse;
use ImagickDemo\Response\RedirectResponse;
use ImagickDemo\Response\TextResponse;


function createImageTaskAndRedirectResponse(
    Request $request,
    \Auryn\Provider $injector,
    $category,
    $function,
    \ImagickDemo\Control $control
) {
    $job = $request->getVariable('job');
    if ($job === false) {
        $task = $injector->make(
            'ImagickDemo\Queue\ImagickTask',
            [
                ':category' => $category,
                ':functionName' => $function
            ]
        );

        $queue = $injector->make('ImagickDemo\Queue\RedisTaskQueue');
        $queue->pushTask($task);
        $job = 0;
    }
    else {
        $job++;
    }

    if ($job > 20) {
        //probably ought to time out at some point.
    }

    $url = $control->getURL();
    
    if (!$url) {
        echo "blah";
    }

    $url .= "&job=".$job;
        
    return new RedirectResponse($control->getURL()."&job=".$job, 500000);
}




class Page {

    function generateResponseFromTemplate(\Auryn\Provider $injector) {
        $viewModel = $injector->make(\Intahwebz\ViewModel\BasicViewModel::class);
        $jigRenderer = $injector->make(\Intahwebz\Jig\JigRender::class);
        $jigRenderer->bindViewModel($viewModel);
        $viewModel->setVariable('pageTitle', "Imagick demos");
        $output = $jigRenderer->renderTemplateFile('index', true);

        return new TextResponse($output);
    }


    function setupRootIndex(\Auryn\Provider $injector) {
        $injector->alias(\ImagickDemo\Example::class, \ImagickDemo\HomePageExample::class);

        return $this->generateResponseFromTemplate($injector);
    }

    function setupExampleDelegation(\Auryn\Provider $injector, $category, $example) {
        setupExampleInjection($injector, $category, $example);

        return $this->generateResponseFromTemplate($injector);
    }

    function setupCatergoryDelegation(\Auryn\Provider $injector, $category) {
        $validCatergories = [
            'Imagick',
            'ImagickDraw',
            'ImagickPixel',
            'ImagickPixelIterator',
            'Example',
        ];

        if (in_array($category, $validCatergories) == false) {
            throw new \Exception("Category is not valid.");
        }

        $injector->defineParam('imageBaseURL', '/image/'.$category);
        $injector->defineParam('customImageBaseURL', '/customImage/'.$category);
        $injector->defineParam('activeCategory', $category);
        $injector->defineParam('activeExample', null);

        $injector->share(\ImagickDemo\Control::class);
        $injector->alias(\ImagickDemo\Example::class, sprintf('ImagickDemo\%s\IndexExample', $category));
        $injector->alias(\ImagickDemo\Navigation\Nav::class, \ImagickDemo\Navigation\CategoryNav::class);
        $injector->define(\ImagickDemo\Navigation\CategoryNav::class, [
            ':category' => $category,
            ':example' => null
        ]);

        $injector->define(\ImagickDemo\DocHelper::class, [
            ':category' => $category,
            ':example' => null
        ]);

        return $this->generateResponseFromTemplate($injector);
    }


    /**
     * @param \Auryn\Provider $injector
     * @return FileResponse
     */
    function getOriginalImageResponse(\Auryn\Provider $injector) {
        $control = $injector->make(\ImagickDemo\Control::class);
        //TODO - this is dangerous. It assumes that image path exists on the control
        //Which isn't always true.
        $imagePath = $control->getImagePath();
        return new FileResponse($imagePath, "Content-Type: image/jpeg");
    }
    
    
    function getCachedImageResponse(\Auryn\Provider $injector, Request $request, $category, $example) {
        $control = $injector->make(\ImagickDemo\Control::class);
        $filename = getImageCacheFilename($category, $example, $control->getParams());
        $response = createFileResponseIfFileExists($filename);

        if ($response) {
            return $response;
        }

        $task = $request->getVariable('task', true);
        $function = setupExampleInjection($injector, $category, $example);

        if ($task) {
            $response = createImageTaskAndRedirectResponse($request, $injector, $category, $function, $control);
        }
        else {
            $functionFullname = 'ImagickDemo\\'.$category.'\\'.$function;
            $response = createAndCacheFile($injector, $functionFullname, $filename);
        }

        return $response;
    }
    
    function getImageResponse(\Auryn\Provider $injector, Request $request, $category, $example) {
        $namespace = sprintf('ImagickDemo\%s\functions', $category);
        $namespace::load();

        global $imageCache;
        
        $original = $request->getVariable('original', false);

        //Yay - global state.
        $function = setupExampleInjection($injector, $category, $example);
        
        if ($original) {
            return $this->getOriginalImageResponse($injector);
        }

        if ($imageCache) {
            return $this->getCachedImageResponse($injector, $request, $category, $example);
        }

        
        $functionFullname = 'ImagickDemo\\'.$category.'\\'.$function;
        $injector->execute($functionFullname);
        //TODO - capture ob_buffer and make a response.
        return null;
    }



}

 