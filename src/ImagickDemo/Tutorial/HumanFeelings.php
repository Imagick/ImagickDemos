<?php

namespace ImagickDemo\Tutorial;

use ImagickDemo\Helper\PageInfo;

class HumanFeelings extends \ImagickDemo\Example
{
    /** @var \ImagickDemo\Helper\PageInfo */
    private $pageInfo;

    public function __construct(PageInfo $pageInfo, \ImagickDemo\Control $control)
    {
        $this->pageInfo = $pageInfo;
        parent::__construct($control);
    }

    public function renderDescription()
    {
        $output = <<< END
<p>
Human interactions are annoying.
</p>
END;

        return $output;
    }

    public function renderImageURL()
    {
        return $this->control->getURL();
    }

    public function render()
    {
        $html = <<< HTML
<div id="human_feelings"></div>
<div id="feelingsControls"></div>
HTML;

        return $html;
    }
}
