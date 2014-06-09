<?php


namespace ImagickDemo\Navigation;


class NullNav implements Nav {

    function renderPreviousButton() {
    }

    function renderNextButton() {
    }

    function renderPreviousLink() {
    }

    function renderNextLink() {
    }


    function renderTitle() {
        return "Hello!";
    }
    
    function renderNav() {
        
    }

    function getURL() {
        
    }

    function renderDescription() {
        return "I are description.";
    }
    
    function getCategory(){
        return '';
    }
}

 