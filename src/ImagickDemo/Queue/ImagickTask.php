<?php

namespace ImagickDemo\Queue;

use ImagickDemo\App;
use ImagickDemo\Control;
use ImagickDemo\Helper\PageInfo;
use ImagickDemo\ImageCachePath;

class ImagickTask implements Task
{
    use \Intahwebz\Cache\KeyName;

    /**
     * @var PageInfo
     */
    private $pageInfo;

    private $params;

    private $customImage;
    
    private $uri;

    public function __construct(PageInfo $pageInfo, $params, $customImage, $uri)
    {
        $this->pageInfo = $pageInfo;
        $this->params = $params;
        $this->customImage = $customImage;
        $this->uri = $uri;
    }

    /**
     * @return mixed
     */
    public function isCustomImage()
    {
        return $this->customImage;
    }

    /**
     *
     */
    public function getKey()
    {
        $key = hash("sha256", json_encode($this->params));

        return sprintf(
            "%s_%s_%s",
            $this->pageInfo->getCategory(),
            $this->pageInfo->getExample(),
            $key
        );
    }

    public function getQueueName()
    {
        return self::getClassKey();
    }

    public function itemsToRun()
    {
        return 1;
    }

    public function getMaxRunTime()
    {
        return 30;
    }

    /**
     * @return array
     */
    public function serialize()
    {
        $data = [
            'categoryNav' => $this->pageInfo,
            'params' => $this->$params,
            'customImage' => $this->customImage,
            'uri' => $this->uri
        ];

        return $data;
    }

    /**
     * @param $serialization
     * @return ImagickTask
     */
    public static function unserialize($serialization)
    {
        return new ImagickTask(
            $serialization['categoryNav'],
            $serialization['params'],
            $serialization['customImage'],
            $serialization['uri']
        );
    }

    public function getPageInfo()
    {
        return $this->pageInfo;
    }
    
    public function getUri()
    {
        return $this->uri;
    }
    
    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    public function getFilename()
    {
        return ImageCachePath::getImageCacheFilename(
            $this->pageInfo,
            $this->params
        );
    }
}
