<?php


namespace ImagickDemo;


interface Control {

    function renderForm();

    function getParams();

    function getInjectionParams();

    function getFullParams(array $extraParams = []);

    function getURL();

    function getCustomImageURL(array $extraParams = []);

    function getImageStatusURL($extraParams = []);
    
    function renderImageURL($originalImageURL = null);
    function renderCustomImageURL($extraParams);
}

 