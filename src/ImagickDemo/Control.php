<?php


namespace ImagickDemo;


interface Control {

    function renderForm();

    function getParams();

    function getFullParams(array $extraParams = []);

    function getURL();

    function getCustomImageURL(array $extraParams = []);
}

 