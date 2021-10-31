<?php

namespace ImagickDemo\Navigation;

use ImagickDemo\Helper\PageInfo;

class CategoryInfo
{
    protected $currentExample;

    public function getCurrentName(PageInfo $pageInfo)
    {
        $exampleList = getCategoryList($pageInfo->getCategory());
        $currentExample = $pageInfo->getExample();

        foreach ($exampleList as $exampleName => $exampleDefinition) {
            if (strcasecmp($currentExample, $exampleName) === 0) {
                return $exampleName;
            }
        }

        return null;
    }

    public static function getImageFunctionName(PageInfo $pageInfo)
    {
        $category = $pageInfo->getCategory();
        if ($category == null) {
            return 'ImagickDemo\HomePageExample';
        }

        $example = $pageInfo->getExample();
        if ($example == null) {
            return sprintf('ImagickDemo\%s\IndexExample', $category);
        }

        $exampleToRun = self::getExampleToRun($category, $example);

        return sprintf('ImagickDemo\%s\%s', $category, $exampleToRun);
    }

    public static function getCustomImageFunctionName(PageInfo $pageInfo)
    {
        $category = $pageInfo->getCategory();
        $example = $pageInfo->getExample();
        $function = self::getExampleToRun($category, $example);

        return [sprintf('ImagickDemo\%s\%s', $category, $function), 'renderCustomImage'];
    }

    public static function getExampleToRun($category, $example): string
    {
        $examples = getCategoryList($category);

        if ($example === 'debug') {
            return 'debug';
        }

        if (!isset($examples[$example])) {
            throw new \Exception("Somethings borked: example [$category][$example] doesn't exist.");
        }

        return $examples[$example];
    }
}
