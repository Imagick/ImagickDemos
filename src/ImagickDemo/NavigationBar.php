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
        "/Example" => "Tutorial",
    ];
    
    function __construct($activeCategory = null, $activeExample = null) {
        $this->activeCategory = $activeCategory;
        $this->activeExample = $activeExample;
    }
    
    function render() {
        $output = "";

        foreach ($this->navOptions as $url => $name) {
            $activeClass = '';
            if (strcmp($url, '/'.$this->activeCategory) === 0) {
                $activeClass = 'active';
            }
            $output .= "<li class='$activeClass'>";
            $output .= "<a href='$url'>$name</a>";
            $output .= "</li>";
        }

        $output .= "
<li>
    <a href='https://github.com/Danack/Imagick-demos' target='_blank'>Source code</a>
</li>";
        
        
        $issueURL = "https://github.com/Danack/Imagick-demos/issues/new?title=&body=";

        if ($this->activeExample && $this->activeCategory) {
            $bodyString = sprintf("Reported from %s::%s", $this->activeCategory, $this->activeExample);

            $issueURL .= urlencode($bodyString);
        }

        $output .= "<li>";
        $output .= "<a href='$issueURL' target='_blank'>Report an issue</a>";
        $output .= "</li>";

        return $output;
    }
}

 