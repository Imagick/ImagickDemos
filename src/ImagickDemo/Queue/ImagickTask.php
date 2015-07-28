<?php

namespace ImagickDemo\Queue;

use ImagickDemo\Control;

class ImagickTask implements Task
{
    use \Intahwebz\Cache\KeyName;

    private $imageFunction;

    private $params;

    private $filename;

    /**
     * @param $imageFunction
     * @param $params
     * @param $filename
     */
    public function __construct($imageFunction, $params, $filename)
    {
        $this->imageFunction = $imageFunction;
        $this->params = $params;
        $this->filename = $filename;
    }

    /**
     *
     */
    public function getKey()
    {
        return $this->filename;
    }


    /**
     * @param $category
     * @param $example
     * @param $imageFunction
     * @param $params
     * @return ImagickTask
     */
    public static function create($category, $example, $imageFunction, $params)
    {
        $filename = getImageCacheFilename($category, $example, $params);
        return new \ImagickDemo\Queue\ImagickTask(
            $imageFunction, $params, $filename
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
            'imageFunction' => $this->imageFunction,
            'params' => $this->params,
            'filename' => $this->filename
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
            $serialization['imageFunction'],
            $serialization['params'],
            $serialization['filename']
        );
    }

    /**
     * @return string
     */
    public function getImageFunction()
    {
        return $this->imageFunction;
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
        return $this->filename;
    }
}
