<?php

namespace ImagickDemo\Navigation;

use ImagickDemo\Helper\PageInfo;

class CategoryNav implements Nav
{
    private $pageInfo;

    private $navOptions = [
        "/" => "Home",
        "/Imagick" => "Imagick",
        "/ImagickDraw" => "ImagickDraw",
        "/ImagickPixel" => "ImagickPixel",
        "/ImagickPixelIterator" => "Imagick Pixel Iterator",
        "/ImagickKernel" => "Imagick Kernel",
        "/Tutorial" => "Tutorial",
    ];

    public function __construct(PageInfo $pageInfo)
    {
        $this->pageInfo = $pageInfo;
    }

    /**
     * @param bool $horizontal
     */
    public function renderNav()
    {
        // this is the horizontal one.
        $html = sprintf(
            "<div 
              class='navContainer contentPanel' 
              id='navigationPanel'
              data-links_json='%s'
              data-current_link='%s' >",
            json_encode($this->getLinksData()),
            $this->pageInfo->getExample()
        );
        $html .= $this->renderSearchBox();
        $html .= $this->renderVertical();
        $html .=  "</div>";

        return $html;
    }
    
        /**
     * @return mixed
     */
    public function renderTitle()
    {
        $currentExample = $this->pageInfo->getExample();
        if ($currentExample) {
            return $currentExample;
        }

        return $this->pageInfo->getCategory();
    }

        /**
     * @internal param $current
     * @internal param $array
     * @return string
     */
    public function getPreviousName()
    {
        $current = $this->pageInfo->getExample();
        $previous = null;
        
        $exampleList = getCategoryList($this->pageInfo->getCategory());
        
        foreach ($exampleList as $exampleName => $exampleToRun) {
            if (strcmp($current, $exampleName) === 0) {
                if ($previous) {
                    return $previous;
                }
            }
            $previous = $exampleName;
        }

        return null;
    }

    /**
     * @internal param $current
     * @return string
     */
    public function getNextName()
    {
        $current = $this->pageInfo->getExample();
        $next = false;
        $exampleList = getCategoryList($this->pageInfo->getCategory());
        foreach ($exampleList as $exampleName => $exampleToRun) {
            if ($next == true) {
                return $exampleName;
            }
            if (strcmp($current, $exampleName) === 0) {
                $next = true;
            }
        }

        return null;
    }

    /**
     * @return string
     */
    public function renderPreviousButton()
    {
        $previousNavName = $this->getPreviousName();

        if ($previousNavName) {
            return "<a href='/".$this->pageInfo->getCategory()."/".$previousNavName."'>
            <button type='button' class='btn btn-primary'>
             <span class='glyphicon glyphicon-arrow-left'></span> ".$previousNavName."
            </button>
            </a>";
        }

        return "";
    }

    /**
     * @return string
     */
    public function renderPreviousLink()
    {
        $previousNavName = $this->getPreviousName();

        if ($previousNavName) {
            return sprintf(
                "<a href='/%s/%s'>← %s</a>",
                $this->pageInfo->getCategory(),
                $previousNavName,
                $previousNavName
            );
        }

        return "";
    }
    
    
//    /**
//     * @return string
//     */
    public function renderNextButton()
    {
//        $nextName = $this->getNextName();
//
//        if ($nextName) {
//            return sprintf(
//                "<a href='/%s/%s'>%s →</a>",
//                $this->pageInfo->getCategory(),
//                $nextName,
//                $nextName
//            );
//        }
        throw new \Exception("This isn't used right?");
        return "";
    }

    /**
     * @return string
     */
    public function renderNextLink()
    {
        $nextName = $this->getNextName();

        if ($nextName) {
            return sprintf(
                "<a href='/%s/%s'>%s →</a>",
                $this->pageInfo->getCategory(),
                $nextName,
                $nextName
            );
        }

        return "";
    }

    function renderSelectDropdowns(): string
    {
        $category = $this->pageInfo->getCategory();

        $output = $this->renderChooseCategoryDropdown();

        if ($category !== null) {
            $output .= $this->renderExampleSelect();
        }

        return $output;
    }


    function renderChooseCategoryDropdown(): string
    {
        $category = $this->pageInfo->getCategory();

        $output = <<< END
<div>
  Category
  <select class="category_select">
END;

        foreach ($this->navOptions as $url => $name) {
            $selected = '';
            if (strcmp($url, '/' . $category) === 0) {
                $selected = 'selected';
            }

            $output .= sprintf(
                "<option value='%s' %s>%s</option>",
                $url,
                $selected,
                $name
            );
        }
        $output .= "
  </select>
</div>";

        return $output;
    }


//0xE2 0x80 0x8C
     /**
     *
     */
    public function renderExampleSelect()
    {
        $output = <<< END
<div>
Example
  <select class="example_select">
END;

        $currentExample = $this->pageInfo->getExample();
        $exampleList = getCategoryList($this->pageInfo->getCategory());
        $selected = '';
        if ($currentExample === null) {
            $selected = 'selected';
        }

        $output .="<option disabled $selected>Choose example</option>";

        foreach ($exampleList as $exampleName => $exampleDefinition) {

            $selected = '';
            if (strcmp($exampleName, $currentExample) === 0) {
                $selected = 'selected';
            }

            $output .= sprintf(
                "<option value='/%s/%s' %s>%s</option>",
                $this->pageInfo->getCategory(),
                $exampleName,
                $selected,
                $exampleName
            );
        }

        $output .="
  </select>
</div>";

        return $output;
    }

    /**
     * @return string
     */
    public function renderSearchBox()
    {
        $output = <<< END
<div class='searchContainer' role='search'>
    <input type="search" class='searchBox' id='searchInput' placeholder="Search..." name="query" value="" />
</div>

<div class='searchNoResults' id='searchResultNone'>
    No matches found
</div>
END;

        return $output;
    }

    public function getLinksData()
    {
        $links = [];

        $exampleList = getCategoryList($this->pageInfo->getCategory());
        foreach ($exampleList as $exampleName => $exampleToRun) {

            if (is_string($exampleName) === false || is_string($exampleToRun) === false) {
                throw new \Exception("exampleList has bad data for $exampleName => $exampleToRun");
            }

            $link['url'] = sprintf(
                '/%s/%s',
                $this->pageInfo->getCategory(),
                $exampleName,
            );

            $name = $exampleName;
            $link['description'] = $name;

            $links[] = $link;
        }

        return $links;
    }
    
    public function renderVertical()
    {
        $output = "<!-- This is placeholder HTML to make the nav work when JS -->";
        $output .= "<!-- is disabled in the browser. Check NavigationPanel.tsx -->";
        $output .= "<ul class='nav nav-sidebar smallPadding' id='searchList'>";
        $exampleList = getCategoryList($this->pageInfo->getCategory());
        
        foreach ($exampleList as $exampleName => $exampleToRun) {
            // Dumb hack to avoid forcing container wider

            $active = '';
            $activeLink = '';
            
            if ($this->pageInfo->getExample() === $exampleName) {
                $active = 'navActive';
                $activeLink = 'navActiveLink';
            }

            $name = str_replace(
                "QuadraticBezier",
                "Quadratic Bezier",
                $exampleName
            );

            $output .= "<li class='navSpacer $active'>";

            $output .= sprintf(
                "<a class='smallPadding %s' href='/%s/%s'>%s</a>",
                $activeLink,
                $this->pageInfo->getCategory(),
                $exampleName,
                $name
            );
            $output .= "</li>";
        }

        $output .= "</ul>";


        return "<div>" . $output . "</div>";
    }
}

