<?php

require_once('../vendor/autoload.php');

class HTMLPrinter {

    /**
     * @var URLResult[]
     */
    private $results; 
    
    function __construct(array $results) {
        $this->results = $results;
    }

    function output($outputStream) {

        fwrite($outputStream, "<html>");
        fwrite($outputStream, "<body>");

        fwrite($outputStream, "<table>");
        
        foreach ($this->results as $path => $result) {
            if ($result) {
                if ($result->getStatus() != 200) {
                    fwrite($outputStream, "<tr>");
        
                    fwrite($outputStream, "<td>");
                    fwrite($outputStream, "" . $result->getStatus());
    
                    fwrite($outputStream, "</td>");
    
                    fwrite($outputStream, "<td>");
                    fwrite($outputStream, "" . $result->getPath());
                    fwrite($outputStream, "</td>");
                    
                    fwrite($outputStream, "<td>");
                    fwrite($outputStream, "" . $result->getErrorMessage());
                    fwrite($outputStream, "</td>");
        
                    fwrite($outputStream, "</tr>");
                }
            }
        }

        fwrite($outputStream, "</table>");
        fprintf($outputStream, "<span>There were %d URLs scanned succesfully.</span>", count($this->results));
        fwrite($outputStream, "</body>");
        fwrite($outputStream, "</html>");
    }
}


class URLResult {

    private $path;
    private $status;
    private $errorMessage;

    function __construct($path, $status, $errorMessage = null) {
        $this->path = $path;
        $this->status = $status;
        $this->errorMessage = $errorMessage;
    }

    /**
     * @return mixed
     */
    public function getErrorMessage() {
        return $this->errorMessage;
    }

    /**
     * @return mixed
     */
    public function getPath() {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getStatus() {
        return $this->status;
    }
}


class SiteChecker {

    /**
     * @var URLResult[]
     */
    private $urlList = [];
    
    private $siteURL;
    
    private $count = 0;
    
    function __construct($siteURL) {
        $this->siteURL = $siteURL;
    }

    function getURL($path) {
        $fullURL = $this->siteURL.$path;
        echo "Getting $fullURL \n";

        $client = new \Artax\Client;
        $response = $client->request($fullURL);

//        echo "Response status code: ", $response->getStatus(), "\n";
//        echo "Response reason:      ", $response->getReason(), "\n";
//        echo "Response protocol:    ", $response->getProtocol(), "\n";
//        print_r($response->getAllHeaders());


        $status = $response->getStatus();

        //$this->urlList[$path] = $status;

        if ($status != 200) {
            return new URLResult($path, $status, substr($response->getBody(), 200));
        }

        $contentTypeHeaders = $response->getHeader('Content-Type');
        
        if (array_key_exists(0, $contentTypeHeaders) == false) {
            throw new Exception("Content-type header not set.");
            //return new URLResult($path, 500, "Content-type header not set.");
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
                $this->urlList[$href] = null;
            }
        }
    }

    function parseImgResult(DOMElement $element)  {
        $href = $element->getAttribute('src');

        if (strpos($href, '/') === 0) {
            if (array_key_exists($href, $this->urlList) == false) {
                $this->urlList[$href] = null;
            }
        }
    }
    
    function checkURL($url) {
        $this->urlList[$url] = null;
        
        $finished = false;
        while ($finished == false) {
            $finished = true;
            foreach ($this->urlList as $nextURL => $result) {
                if ($result == null) {
                    $result = $this->checkURLInternal($nextURL);
                    $this->urlList[$nextURL] = $result;
                    $finished = false;
                }
            }
        }
    }
    
    function checkURLInternal($path) {

        $this->count++;

        if ($this->count > 300) {
            //echo "Aborting - too many\n";
            //return;
        }

        //$this->urlList[$path] = 0;

        try {
            $body = $this->getURL($path);

            if ($body instanceof URLResult) {
                return $body;
            }

            if ($body) {
                $fluentDOM = new FluentDOM();
                $dom = $fluentDOM->load($body, 'text/html');
                $dom->find('//a')->each([$this, 'parseLinkResult']);
                $dom->find('//img')->each([$this, 'parseImgResult']);
            }
            
            return new URLResult($path, 200);
        }
        catch (Artax\SocketException $se) {
            return new URLResult($path, 500, "Artax\SocketException on $path - ".$se->getMessage(). " Exception type is ".get_class($se));
        }
        catch(InvalidArgumentException $iae) {
            //echo "Fluent dom exception on $path - ".$iae->getMessage(). " Exception type is ".get_class($iae)." \n";
            return new URLResult($path, 500, "Fluent dom exception on $path - ".$iae->getMessage(). " Exception type is ".get_class($iae));
        }
        catch(Exception $e) {
            //echo "Error getting $path - ".$e->getMessage(). " Exception type is ".get_class($e)." \n";
            return new URLResult($path, 500, "Error getting $path - ".$e->getMessage(). " Exception type is ".get_class($e));
        }
    }
    
    function getResults() {
        return $this->urlList;
    }

//    function showResults() {
//        foreach ($this->urlList as $url => $status) {
//            if ($status != 200) {
//                echo "$status => $url\n";
//            }
//        }
//        
//        printf("Scanned %d urls ", $this->count);
//    }
}

$siteChecker = new SiteChecker("http://imagick.test");
$siteChecker->checkURL('/');


//$siteChecker->showResults();
$printer = new HTMLPrinter($siteChecker->getResults());

$outputStream = fopen("./checkResults.html", "w");

$printer->output($outputStream);

fclose($outputStream);