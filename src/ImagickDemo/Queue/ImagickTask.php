<?php

namespace ImagickDemo\Queue;

use ImagickDemo\Control;



class ImagickTask implements Task {

    use \Intahwebz\Cache\KeyName;

    /**
     * @var
     */
    private $category;
    /**
     * @var
     */
    private $functionName;

    /**
     * @var \ImagickDemo\Control
     */
    private $control;

    function __construct($category, $functionName, \ImagickDemo\Control $control) {
        $this->category = $category;
        $this->functionName = $functionName;
        //$this->params = $params;
        $this->control = $control;
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
        $foo = [
            'category' => $this->category,
            'functionName' => $this->functionName,
            'control' => $this->control
        ];

        return $foo;
    }

    static function unserialize($serialization) {
        return new ImagickTask(
            $serialization['category'],
            $serialization['functionName'],
            $serialization['control']
        );
    }

    function getFunctionName() {
        return $this->functionName;
    }

    function execute(\Auryn\Provider $injector) {

        global $imageCache;

        $namespace = sprintf('ImagickDemo\%s\functions', $this->category);
        $namespace::load();

        $imageCache = true;

        $functionFullname = 'ImagickDemo\\'.$this->category.'\\'.$this->functionName;
        $filename = getImageCacheFilename($this->category, $this->functionName, $this->control->getParams());

        delegateAllTheThings($injector, $this->control);
        $image = createAndCacheFile($injector, $functionFullname, $filename);

        $imageSize = strlen($image);

    }

    /**
     * @return mixed
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * @return \ImagickDemo\Control
     */
    public function getControl() {
        return $this->control;
    }
    
    
    
    
}
