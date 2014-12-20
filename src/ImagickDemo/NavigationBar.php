<?php


namespace ImagickDemo;


class NavigationBar {

    
    private $activeCategory;
    
    private $activeExample;
    
    
    private $navOptions = [
        "/" => "Home",
        "/Imagick" => "Imagick",
        "/ImagickDraw" => "ImagickDraw",
        "/ImagickPixel" => "ImagickPixel",
        "/ImagickPixelIterator" => "Imagick Pixel Interator",
        "/Tutorial" => "Tutorial",
    ];

    /**
     * @param null $activeCategory
     * @param null $activeExample
     */
    function __construct($category = null, $example = null) {
        $this->activeCategory = $category;
        $this->activeExample = $example;
    }

    /**
     * @return string
     */
    function renderIssueLink() {
        $output = '';
        $issueURL = "https://github.com/Danack/Imagick-demos/issues/new?title=&body=";
        if ($this->activeExample && $this->activeCategory) {
            $bodyString = sprintf("Reported from %s::%s", $this->activeCategory, $this->activeExample);

            $issueURL .= urlencode($bodyString);
        }

        $output .= "<a href='$issueURL' target='_blank'>Report an issue</a>";

        return $output;
    }
    
    
    /**
     * 
     */
    function renderSelect() {

        $output = '';

        $categoryLabel = 'Choose category'; 
        
        if ($this->activeCategory) {
            $categoryLabel = $this->activeCategory;
        }

        $output .= <<< END
<!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            $categoryLabel <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
END;
  
        foreach ($this->navOptions as $url => $name) {
            $output .= "<li><a href='$url'>$name</a></li>";
        }
$output .="
  </ul>
</div>";

        return $output;
    }

    /**
     * @return string
     */
    function render() {
        $output = "";

        foreach ($this->navOptions as $url => $name) {
            $activeClass = '';
            if (strcmp($url, '/'.$this->activeCategory) === 0) {
                $activeClass = 'active';
            }
            $output .= "<li class='menuItem $activeClass'>";
            $output .= "<a href='$url'>$name</a>";
            $output .= "</li>";
        }

        return $output;
    }

    /**
     * @return string
     */
    function renderRight() {
        
        $output = "";
        
        $output .= "
<li class='menuItem'>
    <a href='https://github.com/Danack/Imagick-demos' target='_blank'>Source code</a>
</li>";

        $issueURL = "https://github.com/Danack/Imagick-demos/issues/new?title=&body=";

        if ($this->activeExample && $this->activeCategory) {
            $bodyString = sprintf("Reported from %s::%s", $this->activeCategory, $this->activeExample);

            $issueURL .= urlencode($bodyString);
        }

        $output .= "<li class='menuItem'>";
        $output .= "<a href='$issueURL' target='_blank'>Report an issue</a>";
        $output .= "</li>";

        return $output;
    }
    
}

 