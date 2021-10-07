<?php

declare(strict_types=1);

namespace ImagickDemo;

use ImagickDemo\Helper\PageInfo;

class DocHelper
{
    public function showDescription(PageInfo $pageInfo)
    {
        $filepath = sprintf(
            __DIR__ . '/../../doc/%s/%s.txt',
            strtolower($pageInfo->getCategory()),
            strtolower($pageInfo->getExample())
        );

        if (file_exists($filepath) === false) {
            return null;
        }

        $contents = @file_get_contents($filepath);

        if ($contents === false) {
            return null;
        }

        return $contents . "<br/>";
    }
}