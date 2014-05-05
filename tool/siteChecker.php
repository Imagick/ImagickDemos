<?php

require_once('../vendor/autoload.php');

class SiteChecker {

    private $urlList = [];
    
    private $siteURL;
    
    private $count = 0;
    
    function __construct($siteURL) {
        $this->siteURL = $siteURL;
    }

    function getURL($url) {
        $fullURL = $this->siteURL.$url;
        echo "Getting $fullURL \n";

        $client = new \Artax\Client;
        $response = $client->request($fullURL);

//        echo "Response status code: ", $response->getStatus(), "\n";
//        echo "Response reason:      ", $response->getReason(), "\n";
//        echo "Response protocol:    ", $response->getProtocol(), "\n";
//        print_r($response->getAllHeaders());


        $status = $response->getStatus();

        $this->urlList[$url] = $status;

        if ($status != 200) {
            return null;
        }

        $contentTypeHeaders = $response->getHeader('Content-Type');
        
        if (array_key_exists(0, $contentTypeHeaders) == false) {
            throw new Exception("Content-type header not set.");
        }

        $contentType = $contentTypeHeaders[0];
        $colonPosition = strpos($contentType, ';');
        
        if ($colonPosition !== false) {
            $contentType = substr($contentType, 0, $colonPosition);
        }
        
        switch($contentType) {

            case ('text/html'): {
                return $response->getBody();
                break;
            }

            case ('image/gif') :
            case ('image/jpg') :
            case ('image/png') : {
                //echo "Image with status - $status\n";
                return null;
            }

            default: {
                throw new \Exception("Unrecognised content-type $contentType");
            }
        }
    }

    function parseLinkResult(DOMElement $element)  {
        $href = $element->getAttribute('href');

        if (strpos($href, '/') === 0) {
            if (array_key_exists($href, $this->urlList) == false) {
                $this->urlList[$href] = -1;
            }
        }
    }

    function parseImgResult(DOMElement $element)  {
        $href = $element->getAttribute('src');

        if (strpos($href, '/') === 0) {
            if (array_key_exists($href, $this->urlList) == false) {
                $this->urlList[$href] = -1;
            }
        }
    }
    
    function checkURL($url) {

        $this->urlList[$url] = -1;
        
        $finished = false;
        while ($finished == false) {
            $finished = true;
            foreach ($this->urlList as $nextURL => $result) {
                if ($result == -1) {
                    $this->checkURLInternal($nextURL);
                    $finished = false;
                }
            }
        }
    }
    
    function checkURLInternal($url) {

        $this->count++;

        if ($this->count > 300) {
            //echo "Aborting - too many\n";
            //return;
        }

        $this->urlList[$url] = 0;

        try {
            $body = $this->getURL($url);

            if ($body) {
                $fluentDOM = new FluentDOM();
                $dom = $fluentDOM->load($body, 'text/html');
                $dom->find('//a')->each([$this, 'parseLinkResult']);
                $dom->find('//img')->each([$this, 'parseImgResult']);
            }
        }
        catch(InvalidArgumentException $iae) {
            echo "Fluent dom exception on $url - ".$iae->getMessage(). " Exception type is ".get_class($iae)." \n";
        }
        catch(Exception $e) {
            echo "Error getting $url - ".$e->getMessage(). " Exception type is ".get_class($e)." \n";
        }
    }

    function showResults() {
        foreach ($this->urlList as $url => $status) {
            if ($status != 200) {
                echo "$status => $url\n";
            }
        }
        
        printf("Scanned %d urls ", $this->count);
    }
}

$siteChecker = new SiteChecker("http://imagick.test");
$siteChecker->checkURL('/');
$siteChecker->showResults();