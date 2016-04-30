<?php

namespace ImagickDemo;

use ImagickDemo\Helper\PageInfo;

class ImageCachePath
{
    private $path;

    public function __construct($path)
    {
        $this->path = (string)$path;
        
        if (strlen($this->path) == 0) {
            throw new \LogicException(
                "Path must be set for ImageCachePath"
            );
        }
    }

    
    public function getImageCacheFilename(PageInfo $pageInfo, $params)
    {
        $category = $pageInfo->getCategory();
        $example = $pageInfo->getExample();

        $filename = $this->getPath()."/".$category.'/'.$example.'/'.$example;
        if (!empty($params)) {
            $filename .= '_'.md5(json_encode($params));
        }

        return $filename;
    }

    public function getPath()
    {
        return $this->path;
    }
}
