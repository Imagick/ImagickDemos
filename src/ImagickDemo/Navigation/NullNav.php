<?php

namespace ImagickDemo\Navigation;

class NullNav implements Nav
{
    public function renderPreviousButton()
    {
    }

    public function renderNextButton()
    {
    }

    public function renderPreviousLink()
    {
    }

    public function renderNextLink()
    {
    }

    public function renderSelect()
    {

    }

//    function renderTitle() {
//        return "Hello!";
//    }

    public function renderNav()
    {
        return "Yeah this is a null nv.";
    }

    public function getURL()
    {

    }

    public function getCategory()
    {
        return '';
    }
}
