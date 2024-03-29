<?php

namespace ImagickDemo;

interface Control
{


    public function getInjectionParams();

    public function getFullParams(array $extraParams = []);

    // url of the example....
    public function getURL();

    public function getCustomImageURL(array $extraParams = []);
    public function getImageStatusURL($extraParams = []);
    
//    public function renderImageURL($originalImageURL = null);
//    public function renderCustomImageURL($extraParams);
}
