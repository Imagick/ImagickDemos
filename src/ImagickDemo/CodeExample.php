<?php


namespace ImagickDemo;


class CodeExample {


    public $category;
    public $functionName;
    public $lines;
    public $description;
    public $startLine;
    public $endLine = null;
    
    
    function __construct($category, $function, $lines, $description, $startLine) {
        $this->category = $category;
        $this->functionName =  $function;
        $this->lines = $lines;
        $this->description = $description;
        $this->startLine = $startLine;
    }

    /**
     * @param $endLine
     */
    public function setEndLine($endLine) {
        $this->endLine = $endLine;
    }

    /**
     * @return mixed
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getStartLine() {
        return $this->startLine;
    }

    /**
     * @return null
     */
    public function getEndLine() {
        return $this->endLine;
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
    public function getFunctionName() {
        return $this->functionName;
    }

    /**
     * @return mixed
     */
    public function getLines() {
        return $this->lines;
    }
    
    public function appendLine($line) {
        $this->lines .= $line;
    }
}
