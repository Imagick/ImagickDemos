<?php

namespace ImagickDemo\Controller;

use ImagickDemo\Helper\PageInfo;
use ImagickDemo\NavigationBar;
use ImagickDemo\Navigation\CategoryNav;

class Support
{
    public function createResponse(
        PageInfo $pageInfo,
        CategoryNav $categoryNav,
        NavigationBar $navigationBar,
    ) {
        $html = <<< HTML

<div class='contentPanel support_panel'>
    
<h2>How to give support</h2>    

<p>Todo....write words.</p>
        
        
        
<h2>How to receive support</h2>

<p>
The [issue tracker for Imagick is on Github](https://github.com/Imagick/imagick/issues). If you're going to report that some image processing isn't working properly, please post a <b>working</b> code example. A working code example means that the code runs, a
</p>

<h3>PDF conversion</h3>

<p>
</p>

<h3>SVG conversion</h3>
<p>

</p>
        
</div>
HTML;

        return renderTextPageSass(
            $pageInfo,
            $categoryNav,
            $navigationBar,
            $html
        );
    }
}
