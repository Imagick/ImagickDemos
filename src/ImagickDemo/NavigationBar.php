<?php


namespace ImagickDemo;

use ImagickDemo\Helper\PageInfo;

class NavigationBar
{

    private $activeCategory;

    private $activeExample;

    private $navOptions = [
        "/" => "Home",
        "/Imagick" => "Imagick",
        "/ImagickDraw" => "ImagickDraw",
        "/ImagickPixel" => "ImagickPixel",
        "/ImagickPixelIterator" => "Imagick Pixel Iterator",
        "/ImagickKernel" => "Imagick Kernel",
        "/Development" => "Development",
        "/Tutorial" => "Tutorial",
    ];

    /**
     * @param null $category
     * @param null $example
     * @internal param null $activeCategory
     * @internal param null $activeExample
     */
    public function __construct(PageInfo $pageInfo)
    {
        $this->activeCategory = $pageInfo->getCategory();
        $this->activeExample = $pageInfo->getExample();

    }

    /**
     * @return string
     */
    public function renderIssueLink()
    {
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
     * @return string
     */
    public function renderInternalLinks()
    {
        $output = "";
        $html_placeholder = "<span class='header_item menuItem :attr_activeclass'><a href=':attr_url'>:html_name</a></span>";

        foreach ($this->navOptions as $url => $name) {
            $activeClass = '';
            if (strcmp($url, '/' . $this->activeCategory) === 0) {
                $activeClass = 'active';
            }

            $params = [
                ':attr_activeclass' => $activeClass,
                ':attr_url' => $url,
                ':html_name' => $name
            ];

            $output .= esprintf($html_placeholder, $params);
        }

        return $output;
    }

    /**
     * @return string
     */
    public function renderExternalLinks()
    {
        $output = "<span class='header_item menuItem'><a href='https://github.com/Danack/Imagick-demos' target='_blank'>Source code</a></span>";

        $issueURL = "https://github.com/Danack/Imagick-demos/issues/new?title=&body=";

        if ($this->activeExample && $this->activeCategory) {
            $bodyString = sprintf("Reported from %s::%s", $this->activeCategory, $this->activeExample);
            $issueURL .= urlencode($bodyString);
        }

        $html_template = <<< HTML
<span class='header_item menuItem'><a href=':attr_url' target='_blank'>Report an issue</a></span>
HTML;

        $output .= esprintf($html_template, [':attr_url' => $issueURL]);

        return $output;
    }
}
