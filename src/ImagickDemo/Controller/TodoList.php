<?php

namespace ImagickDemo\Controller;

use ImagickDemo\Helper\PageInfo;
use ImagickDemo\NavigationBar;


function getMissingMethods(string $classname, $imagickDrawExamples): string
{
    $missing_methods = [];
    $rc = new \ReflectionClass($classname);
    $methods = $rc->getMethods();
    foreach ($methods as $method) {
        $method_name = $method->getName();
        if (array_key_exists($method_name, $imagickDrawExamples) === false) {
            $missing_methods[] = $method_name;
        }
    }

    $html = "<h2>Missing $classname methods - " . count($missing_methods) . "</h2>";
    $html .= implode("<br/>", $missing_methods);

    return $html;
}

class TodoList
{
    public function createResponse(
        PageInfo $pageInfo,
        NavigationBar $navBar
    ) {

        $html = '';
        $html .= getMissingMethods(
            \Imagick::class,
            getImagickExamples()
        );

        $html .= getMissingMethods(
            \ImagickDraw::class,
            getImagickDrawExamples()
        );

        $html .= getMissingMethods(
            \ImagickPixel::class,
            getImagickPixelExamples()
        );

        $html .= getMissingMethods(
            \ImagickPixelIterator::class,
            getImagickPixelIteratorExamples()
        );

        $html .= getMissingMethods(
            \ImagickKernel::class,
            getImagickKernelExamples()
        );

        return renderTextPage(
            $pageInfo,
            $navBar,
            $html
        );
    }
}
