<?php

namespace ImagickDemo\Navigation;

// TODO - delete this
interface Nav
{
    public function renderPreviousButton();
    public function renderNextButton();
    public function renderPreviousLink();
    public function renderNextLink();
    public function renderNav();
    //public function getCategory();
    public function renderSelectDropdowns();
}
