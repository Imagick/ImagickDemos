<?php

namespace ImagickDemo\Controller;

use Auryn\Injector;
use ImagickDemo\Control;
use ImagickDemo\Example;
use ImagickDemo\Helper\PageInfo;
use ImagickDemo\ImageCachePath;
use SlimAuryn\Response\ImageResponse;
use SlimAuryn\Response\JsonResponse;

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
//        $customImageParams = $exampleController->getCustomImageParams();
        $fullParams = $control->getFullParams([]);
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

        // TODO - re-enable queueing image generation.
//        $result = $injector->execute('ImagickDemo\ImageGenerator::cachedImageCallable');
//        if ($result !== null) {
//            return $result;
//        }
//
//        $result = $injector->execute('ImagickDemo\ImageGenerator::createImageTask');
//        if ($result !== null) {
//            return $result;
//        }

        return $injector->execute('ImagickDemo\ImageGenerator::directCustomImageCallable');
    }


    public function getImageResponse(
        \ImagickDemo\Control $control,
        Injector $injector,
        $category
    ) {
        $params = $control->getFullParams([]);

        $params['customImage'] = false;

        // I strongly believe apis should use snake_case
        // but most people in PHPland like camelCase
        $mappedParams = [
            'adaptive_offset' => 'adaptiveOffset',
            'background_color' => "backgroundColor",
            'best_fit' => "bestFit",
            'black_point' => "blackPoint",
            'blue_shift' => "blueShift",
            'canvas_type' => "canvasType",
            "color_space" => "colorSpace",
            'end_angle' => 'endAngle',
            'end_x' => 'endX',
            'end_y' => 'endY',
            'fill_color' => "fillColor",
            'fill_modified_color' => "fillModifiedColor",
            'first_term' => 'kernelFirstTerm',
            'gray_only' => 'grayOnly',
            'hald_clut_type' => 'haldClutType',
            'kernel_render' => "kernelRender",
            'kernel_type' => 'kernelType',
            'noise_type' => 'noiseType',
            'origin_x' => 'originX',
            'origin_y' => 'originY',
            'paint_type' => "paintType",
            'round_x' => 'roundX',
            'round_y' => 'roundY',
            'second_term' => 'kernelSecondTerm',
            'sigmoidal_contrast' => 'sigmoidalContrast',
            'start_angle' => 'startAngle',
            'start_x' => 'startX',
            'start_y' => 'startY',
            'statistic_type' => 'statisticType',
            'stroke_color' => "strokeColor",
            'text_decoration' => 'textDecoration',
            'text_under_color' => "textUnderColor",
            'third_term' => 'kernelThirdTerm',
            'translate_x' => "translateX",
            'translate_y' => "translateY",
            'threshold_color' => 'thresholdColor',
            'unsharp_threshold' => 'unsharpThreshold',
            'white_point' => "whitePoint",
        ];

//        var_dump($params);
//        exit(0);

        foreach ($mappedParams as $src => $dest) {
            if (array_key_exists($src, $params) === true) {
                $params[$dest] = $params[$src];
            }
        }

        foreach ($params as $key => $value) {
            $injector->defineParam($key, $value);
        }

        $injector->defineParam('customImage', false);
        $injector->defineParam('params', $params);

        return $injector->execute('ImagickDemo\ImageGenerator::directImageCallable');
    }
}
