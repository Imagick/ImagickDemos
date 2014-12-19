<?php

namespace ImagickDemo\Queue;

use ImagickDemo\Control;



class ImagickTask implements Task {

    use \Intahwebz\Cache\KeyName;

 
    private $imageFunction;

    private $params;

    private $filename;

    function __construct($imageFunction, $params, $filename) {
        $this->imageFunction = $imageFunction;
        $this->params = $params;
        $this->filename = $filename;
    }

    function getQueueName() {
        return self::getClassKey();
    }

    function itemsToRun() {
        return 1;
    }

    function getMaxRunTime() {
        return 30;
    }

    function serialize() {
        $data = [
//            'category' => $this->category,
//            'functionName' => $this->functionName,
//            'type' => $this->type,
//            'control' => $this->control
            'imageFunction' => $this->imageFunction,
            'params' => $this->params,
            'filename' => $this->filename
        ];

        return $data;
    }

    static function unserialize($serialization) {
        return new ImagickTask(
            $serialization['imageFunction'],
            $serialization['params'],
            $serialization['filename']
        );
    }

    /**
     * @return string
     */
    public function getImageFunction() {
        return $this->imageFunction;
    }

    /**
     * @return mixed
     */
    public function getParams() {
        return $this->params;
    }
    
    public function getFilename() {
        return $this->filename;
    }
    

//    function getFunctionName() {
//        return $this->functionName;
//    }

    /*
    function execute(\Auryn\Provider $injector) {

        global $cacheImages;

        $namespace = sprintf('ImagickDemo\%s\functions', $this->category);
        /* * @noinspection PhpUndefinedMethodInspection * /
        $namespace::load();

        $cacheImages = true;

        $filename = getImageCacheFilename($this->category, $this->functionName, $this->control->getFullParams([]));

        delegateAllTheThings($injector, $this->control);

        $imageCallable = 'ImagickDemo\\'.$this->category.'\\'.$this->functionName;

        $lowried = [];

        $imageCallable = function () use ($injector, $imageCallable, $lowried) {
            $injector->execute($imageCallable, $lowried);
        };

        renderImageAsFileResponse($imageCallable, $filename);
    } */

//    /**
//     * @return mixed
//     */
//    public function getCategory() {
//        return $this->category;
//    }
//
//    /**
//     * @return \ImagickDemo\Control
//     */
//    public function getControl() {
//        return $this->control;
//    }
//
//    /**
//     * @return string
//     */
//    public function getType() {
//        return $this->type;
//    }

    


}
