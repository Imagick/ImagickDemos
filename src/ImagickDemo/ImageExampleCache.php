<?php


namespace ImagickDemo\Imagick {


}

namespace ImagickDemo\ImagickDraw {

    function header($string, $replace = true, $http_response_code = null) {
        global $imageType;

        if (stripos($string, "Content-Type: image/") === 0) {
            $imageType = substr($string, strlen("Content-Type: image/"));
        }

        \header($string, $replace, $http_response_code);
    }
}

namespace ImagickDemo\ImagickPixel {

    function header($string, $replace = true, $http_response_code = null) {
        global $imageType;

        if (stripos($string, "Content-Type: image/") === 0) {
            $imageType = substr($string, strlen("Content-Type: image/"));
        }

        \header($string, $replace, $http_response_code);
    }
}

namespace ImagickDemo\ImagickPixelIterator {

    function header($string, $replace = true, $http_response_code = null) {
        global $imageType;

        if (stripos($string, "Content-Type: image/") === 0) {
            $imageType = substr($string, strlen("Content-Type: image/"));
        }

        \header($string, $replace, $http_response_code);
    }
}

namespace ImagickDemo\Tutorial {

    function header($string, $replace = true, $http_response_code = null) {
        global $imageType;

        if (stripos($string, "Content-Type: image/") === 0) {
            $imageType = substr($string, strlen("Content-Type: image/"));
        }

        \header($string, $replace, $http_response_code);
    }
}


namespace ImagickDemo {



}