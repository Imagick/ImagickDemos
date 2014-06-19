<?php


namespace Stats;


class Timer {

    private $name;

    private $value;

    private $measure_time;

    private $source;

    function __construct($name, $value, $source, $measureTime = null) {
        $this->name = $name;
        $this->value = $value;
        $this->source = $source;
        $this->measureTime = $measureTime;
    }

    function convertToArray() {
        $array = [
            "name" => $this->name,
            "value" => $this->value,
            "source" => $this->source,
        ];

        return $array;
    }

    /**
     * @return mixed
     */
    public function getMeasureTime() {
        return $this->measure_time;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSource() {
        return $this->source;
    }

    /**
     * @return mixed
     */
    public function getValue() {
        return $this->value;
    }
    
    
    
    
    
    
    
    
}

 