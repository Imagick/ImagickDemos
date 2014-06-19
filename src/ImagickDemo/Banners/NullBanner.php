<?php


namespace ImagickDemo\Banners;


class NullBanner implements Banner{
    function render() {
        return "";
    }
}

 