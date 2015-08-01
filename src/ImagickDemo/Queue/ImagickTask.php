<?php

namespace ImagickDemo\Queue;

use ImagickDemo\Control;
use ImagickDemo\Navigation\CategoryNav;

class ImagickTask implements Task
{
    use \Intahwebz\Cache\KeyName;

    /**
     * @var CategoryNav
     */
    private $categoryNav;
    
    
    private $params;

    /**
     * @param CategoryNav $categoryNav
     * @param $params
     */
    public function __construct(CategoryNav $categoryNav, $params)
    {
        $this->categoryNav = $categoryNav;
        $this->params = $params;
    }

    /**
     *
     */
    public function getKey()
    {
        $key = '';
        foreach ($this->params as $param) {
            $key = hash("sha256", $key.$param);
        }

        return sprintf(
            "%s_%s_%s",
            $this->categoryNav->getCategory(),
            $this->categoryNav->getExample(),
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
            'categoryNav' => $this->categoryNav,
            'params' => $this->$params
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
            $serialization['params']
        );
    }

    public function getCategoryNav()
    {
        return $this->categoryNav;
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
        return getImageCacheFilename(
            $this->categoryNav->getPageInfo(),
            $this->params
        );
    }
}
