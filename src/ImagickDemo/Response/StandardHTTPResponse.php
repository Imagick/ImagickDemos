<?php


namespace ImagickDemo\Response;



class StandardHTTPResponse implements \ImagickDemo\Response\Response {

    private $httpCode;
    private $uri;
    private $body;
    
    function __construct($httpCode, $uri, $body = null) {
        $this->httpCode = $httpCode;
        $this->uri = $uri;
        $this->body = $body;
    }
    
    function setBody($body) {
        $this->body = $body;
    }
    
    //            header("HTTP/1.0 404 Not Found", true, 404);
//            echo "No route matched. No route matched.No route matched.No route matched.No route matched.No route matched.No route matched.No route matched.";
//            break;


    function send() {
        header("HTTP/1.0 ".$this->httpCode." Temporary Redirect");
        //TODO - make this look nice
        echo $this->uri;
        
        if ($this->body) {
            echo $this->body;
        }
    }
}

 