<?php


namespace ImagickDemo\Navigation;


interface Nav {
    function renderPreviousButton();
    function renderNextButton();
    function renderPreviousLink();
    function renderNextLink();
    function renderTitle();
    function renderNav();
    function getCategory();
    function renderSelect();
}

 