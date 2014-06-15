<?php


namespace Stats;


class Gauge {

//The unique identifying name of the property being tracked. The metric name is used both to create new measurements and query existing measurements. Must be 255 or fewer characters, and may only consist of 'A-Za-z0-9.:-_'. Depending on the submission format the location of the name parameter may vary, see examples below in "Measurement Formats". The metric namespace is case insensitive.
    
    private $name;

    private $value;

    private $measure_time;

    private $source;


    //Librato accepts summarised gauges.
    //count
    //sum
    //max
    //min
    //sum_squares

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

        return [$array];
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

 