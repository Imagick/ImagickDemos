<?php

namespace ImagickDemo\Banners;

class NullBanner implements Banner
{
    public function render()
    {
        return "";
    }
}
