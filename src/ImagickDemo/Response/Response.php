<?php


namespace ImagickDemo\Response;


interface Response {
    function send(array $headers = []);
}

 