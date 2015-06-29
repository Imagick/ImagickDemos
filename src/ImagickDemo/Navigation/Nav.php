<?php


namespace ImagickDemo\Navigation;


interface Nav {
    function renderPreviousButton();
    function renderNextButton();
    function renderPreviousLink();
    function renderNextLink();
    function renderNav();
    function getCategory();
    function renderSelect();
}

 