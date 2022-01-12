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


    public function renderNav()
    {
        return "";
    }

    public function getURL()
    {

    }

    public function getCategory()
    {
        return '';
    }

    public function renderSelectDropdowns()
    {
        return "shimmy";
    }


}
