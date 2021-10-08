<?php

namespace ImagickDemo\Navigation;

use ImagickDemo\Helper\PageInfo;

class CategoryNav implements Nav
{
    private $pageInfo;
    
    public function __construct(PageInfo $pageInfo)
    {
        $this->pageInfo = $pageInfo;
    }
    
        /**
     * @param bool $horizontal
     */
    public function renderNav()
    {
        $html = sprintf(
            "<div 
              class='contentPanel navContainer' 
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
            return "<a href='/".$this->pageInfo->getCategory()."/".$previousNavName."'>
             <span class='glyphicon glyphicon-arrow-left'></span> ".$previousNavName."
            </a>";
        }

        return "";
    }
    
    
    /**
     * @return string
     */
    public function renderNextButton()
    {
        $nextName = $this->getNextName();

        if ($nextName) {
            return "<a href='/".$this->pageInfo->getCategory()."/".$nextName."'>
            <button type='button' class='btn btn-primary'>
            ".$nextName." <span class='glyphicon  glyphicon-arrow-right'></span>
            </button>
            </a>";
        }

        return "";
    }

    /**
     * @return string
     */
    public function renderNextLink()
    {
        $nextName = $this->getNextName();

        if ($nextName) {
            return "<a href='/".$this->pageInfo->getCategory()."/".$nextName."'>
            ".$nextName." <span class='glyphicon  glyphicon-arrow-right'></span>
            </a>";
        }

        return "";
    }
   
    /**
     *
     */
    public function renderSelect()
    {
        $output = '';

        $exampleLabel = 'Choose example';

        if ($this->pageInfo->getExample()) {
            $exampleLabel = $this->pageInfo->getExample();
        }

        $output .= <<< END
<!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            $exampleLabel <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
END;
        
        $exampleList = getCategoryList($this->pageInfo->getCategory());
        
        foreach ($exampleList as $exampleName => $exampleDefinition) {
            //$output .= "<li><a href='$url'>$name</a></li>";
            $imagickExample = $exampleName;
            $output .= "<li>";
            $output .= sprintf(
                "<a href='/%s/%s'>%s</a>",
                $this->pageInfo->getCategory(),
                $imagickExample,
                $imagickExample
            );
            $output .= "</li>";
        }

        $output .="
  </ul>
</div>";

        return $output;
    }

    /**
     * @return string
     */
    public function renderSearchBox()
    {
        $output = <<< END
<div class='smallPadding navSpacer searchContainer' role='search'   >
    <input type="search" class='searchBox' id='searchInput' placeholder="Search..." name="query" value="" />
</div>

<div class='smallPadding navSpacer' id='searchResultNone' style='display: none; padding-top: 15px'>
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


        return $output;
    }
}
