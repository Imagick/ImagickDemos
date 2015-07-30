<?php


namespace ImagickDemo\Helper;

class PageInfo
{
    private $title = "PHP Imagick by Example";

    private $category;

    private $example;

    public function __construct($category = null, $example = null)
    {
        $this->setCatergoryAndExample($category, $example);
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return mixed
     */
    public function getExample()
    {
        return $this->example;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        // Need to escape string
        $this->title = $title;
    }

    private function setCatergoryAndExample($category, $example)
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
