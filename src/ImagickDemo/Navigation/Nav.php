<?php

namespace ImagickDemo\Navigation;

interface Nav
{
    public function renderPreviousButton();
    public function renderNextButton();
    public function renderPreviousLink();
    public function renderNextLink();
    public function renderNav();
    //public function getCategory();
    public function renderSelect();
}
