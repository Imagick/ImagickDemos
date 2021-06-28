<?php

namespace ImagickDemo\Controller;

use \SlimAuryn\Response\JsonResponse;
use Auryn\Injector;

use ImagickDemo\ImageCachePath;
use ImagickDemo\Helper\PageInfo;
use ImagickDemo\Example;
use ImagickDemo\Control;
use SlimAuryn\Response\ImageResponse;
use ImagickDemo\Navigation\CategoryInfo;

function getKnownExtensions()
{
    return ['gif', 'jpg', 'png', 'webp'];
}

/**
 * Used to generate a list function calls for testing offline
 * @param $imageFunction
 * @param $category
 * @param $example
 */
function logCallable(
    $imageFunction,
    $category,
    $example,
    $params
) {
    if (file_exists("test.data.php") == false) {
        file_put_contents("test.data.php", "<?php \n\n\$data = [];\n\n", FILE_APPEND);
    }

    $string = "\$data[] = [\n";
    $string .= var_export($imageFunction, true);
    $string .= ",\n";
    $string .= var_export($params, true);
    $string .= ",\n";
    $string .= "];\n\n";

    file_put_contents("test.data.php", $string, FILE_APPEND);
}


/**
 * Class Image
 * @package ImagickDemo\Controller
 */
class Image
{
    /**
     * @var PageInfo
     */
    private $pageInfo;
    
    public function __construct(PageInfo $pageInfo)
    {
        $this->pageInfo = $pageInfo;
    }

    public function getOriginalImage(Example $example)
    {
        $filename = $example->getOriginalFilename();

        return new ImageResponse(
            file_get_contents($filename),
            ImageResponse::TYPE_JPG
        );
    }
    
    /**
     * @param $category
     * @param $example
     * @param $imageFunction
     * @param \ImagickDemo\Control $control
     * @param \ImagickDemo\Example $exampleController
     * @internal param array $customImageParams
     * @return JsonResponse
     */
    public function getImageJobStatus(
        ImageCachePath $imageCachePath,
        PageInfo $pageInfo,
        Control $control,
        Example $exampleController
    ) {
        $data = [];
        $customImageParams = $exampleController->getCustomImageParams();
        $fullParams = $control->getFullParams($customImageParams);
        $filename = $imageCachePath->getImageCacheFilename($pageInfo, $fullParams);

        $data['filename'] = $filename;
        $data['finished'] = false;
        $data['params'] = $fullParams;

        foreach (getKnownExtensions() as $extension) {
            if (file_exists($filename.'.'.$extension) == true) {
                $data['finished'] = true;
                break;
            }
        }

        return new \SlimAuryn\Response\JsonResponse($data);
//        return new JsonBody($data);
    }

    /**
     * @param \Auryn\Injector $injector
     * @param $customImageFunction
     * @param \ImagickDemo\Example $exampleController
     * @param \ImagickDemo\Control $control
     * @return mixed
     * @throws \Exception
     */
    public function getCustomImageResponse(
        Example $exampleController,
        Control $control,
        Injector $injector,
        $category
    ) {
        $params = $control->getFullParams([]);
        $params['customImage'] = true;
        $injector->defineParam('customImage', true);
        $injector->defineParam('params', $params);

        $result = $injector->execute('ImagickDemo\ImageGenerator::cachedImageCallable');
        if ($result !== null) {
            return $result;
        }

        $result = $injector->execute('ImagickDemo\ImageGenerator::createImageTask');
        if ($result !== null) {
            return $result;
        }

        return $injector->execute('ImagickDemo\ImageGenerator::directCustomImageCallable');
    }


    public function getImageResponse(
        \ImagickDemo\Control $control,
        Injector $injector,
        $category
    ) {
        $params = $control->getFullParams([]);
        $params['customImage'] = false;

        $mappedParams = [
            "background_color" => "backgroundColor",
            "stroke_color" => "strokeColor",
            "fill_color" => "fillColor",
        ];

        foreach ($mappedParams as $src => $dest) {
            if (array_key_exists($src, $params) === true) {
                $params[$dest] = $params[$src];
            }
        }

        foreach ($params as $key => $value) {
            $injector->defineParam($key, $value);
        }
//        exit(0);

        $injector->defineParam('customImage', false);
        $injector->defineParam('params', $params);

//        array(7) {
//            ["background_color"]=> string(18)           "rgb(225, 225, 225)"
//            ["stroke_color"]=> string(12)"rgb(0, 0, 0)"
//            ["fill_color"]=> string(11) "DodgerBlue2"
//            ["customImage"]=> bool(false)
//            ["backgroundColor"]=> string(18) "rgb(225, 225, 225)"
//            ["strokeColor"]=> string(12) "rgb(0, 0, 0)"
//            ["fillColor"]=> string(11) "DodgerBlue2"
//        }
//
//        $fn = function ($strokeColor)
//        {
//            echo "strokeColor is $strokeColor";
//        };
//
//        $injector->execute($fn);
//        exit(0);


//        $result = $injector->execute('ImagickDemo\ImageGenerator::cachedImageCallable');
//        if ($result !== null) {
//            return $result;
//        }
//
//        $result = $injector->execute('ImagickDemo\ImageGenerator::createImageTask');
//        if ($result !== null) {
//            return $result;
//        }

        return $injector->execute('ImagickDemo\ImageGenerator::directImageCallable');
    }
}
