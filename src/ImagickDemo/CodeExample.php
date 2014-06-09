<?php


namespace ImagickDemo;


class CodeExample {
    function __construct($category, $exampleName, $lines) {
        $this->category = $category;
        $this->exampleName =  $exampleName;
        $this->lines = $lines;
    }

    /**
     * @return mixed
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * @return mixed
     */
    public function getExampleName() {
        return $this->exampleName;
    }

    /**
     * @return mixed
     */
    public function getLines() {
        return $this->lines;
    }
}
