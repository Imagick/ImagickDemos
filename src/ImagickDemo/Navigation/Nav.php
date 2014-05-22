<?php


namespace ImagickDemo\Navigation;


interface Nav {
    function renderPreviousButton();
    function renderNextButton();
    function renderTitle();
    function renderNav();
    function getCategory();
}

 