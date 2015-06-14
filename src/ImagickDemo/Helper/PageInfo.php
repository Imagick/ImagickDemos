<?php


namespace ImagickDemo\Helper;


class PageInfo {

    private $title = "PHP Imagick by Example";

    private $category;

    private $example;


    function getTitle()
    {
        return $this->title;
    }
    
    function setTitle($title)
    {
        // Need to escape string
        $this->title = $title;
    }

    public function setCatergoryAndExample($category, $example)
    {
        $this->category = $category; 
        $this->example = $example;
        
        if ($category == null && $example == null) {
            return;
        }
        else if ($example != null) {
            $this->title = "PHP Imagick - ".$example;
        }
        else if ($category != null) {
            $this->title = "PHP Imagick - ".$category;
        }
    }
}
