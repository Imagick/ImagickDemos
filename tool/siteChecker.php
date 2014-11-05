<?php

require __DIR__.'/../vendor/autoload.php';


function compareImage(URLToCheck $urlToCheck, $resposeBody, $contentType) {

    $imageType = substr($contentType, strlen('image/'));
    
    
//    echo " ".$urlToCheck->getUrl();

    $blahblah = str_replace(['?', '&', '/', '='], '_', $urlToCheck->getUrl());
    
    if (strlen($blahblah) >= 100) {
        $md5 = md5($blahblah);
        $blahblah = substr($blahblah, 0, 100).$md5;
    }
    
    $oututFilename = 'compare/'.$blahblah.'.'.$imageType;
    
    if (file_exists($oututFilename) == false) {
        echo "First compare, creating file of $blahblah\n";
        file_put_contents($oututFilename, $resposeBody);
        return;
    }
    
    
    $imagickNew = new Imagick();
    $imagickNew->readimageblob($resposeBody);
    
    $imagickCompare = new Imagick($oututFilename);
    
    $result = $imagickCompare->compareImages($imagickNew, \Imagick::LAYERMETHOD_COMPAREANY);

    list($imagickDifference, $distance) = $result;

    if ($distance > 0.01) {
        echo "Differrence detected in $blahblah \n";
        /** @var $imagickDifference Imagick */
        $imagickDifference->writeimage($blahblah."diff".time().'.'.$imageType);
    }
}



class HTMLPrinter {

    /**
     * @var URLResult[]
     */
    private $results; 
    
    function __construct(array $results, $baseURL) {
        $this->results = $results;
        $this->baseURL = $baseURL;
    }


    
    function output($outputStream) {

        fwrite($outputStream, "<html>");
        fwrite($outputStream, "<body>");

        fwrite($outputStream, "<table>");

        fwrite($outputStream, "<thead>");
        fwrite($outputStream, "<tr>");
        fwrite($outputStream, "<th>Status</th>");
        fwrite($outputStream, "<th>Path</th>");
        fwrite($outputStream, "<th>Referrer</th>");
        fwrite($outputStream, "<th>Message</th>");
        
        fwrite($outputStream, "</tr>");
        fwrite($outputStream, "</thead>");
        
        fwrite($outputStream, "<tbody>");

        foreach ($this->results as $path => $result) {
            if ($result) {
                if ($result->getStatus() != 200) {
                    fwrite($outputStream, "<tr>");
        
                    fwrite($outputStream, "<td>");
                    fwrite($outputStream, "" . $result->getStatus());
    
                    fwrite($outputStream, "</td>");
    
                    fwrite($outputStream, "<td>");
                    fwrite($outputStream, sprintf("<a href='%s%s'>", $this->baseURL, $result->getPath()));
                    fwrite($outputStream, "" . $result->getPath());
                    fwrite($outputStream, "</a>");
                    fwrite($outputStream, "</td>");

                    fwrite($outputStream, "<td>");
                    fwrite($outputStream, "" . $result->getReferrer());
                    fwrite($outputStream, "</td>");
                    
                    fwrite($outputStream, "<td>");
                    fwrite($outputStream, "" . $result->getErrorMessage());
                    fwrite($outputStream, "</td>");
        
                    fwrite($outputStream, "</tr>");
                }
            }
        }

        fwrite($outputStream, "</tbody>");

        fwrite($outputStream, "</table>");
        fprintf($outputStream, "<span>There were %d URLs scanned succesfully.</span>", count($this->results));
        fwrite($outputStream, "</body>");
        fwrite($outputStream, "</html>");
    }
}

class URLToCheck {
    
    private $url;
    private $referrer;
    
    function __construct($url, $referrer) {
        $this->url = $url;
        $this->referrer = $referrer;   
    }

    /**
     * @return mixed
     */
    public function getReferrer() {
        return $this->referrer;
    }

    /**
     * @return mixed
     */
    public function getUrl() {
        return $this->url;
    }
}

class URLResult {

    private $path;
    private $status;
    private $errorMessage;
    private $referrer;

    function __construct($path, $status, $referrer, $errorMessage = null) {
        $this->path = $path;
        $this->status = $status;
        $this->errorMessage = $errorMessage;
        $this->referrer = $referrer;
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
    
    public function getReferrer() {
        return $this->referrer;
    }
}


class SiteChecker {

    /**
     * @var URLResult[]
     */
    private $urlsChecked = [];
    
    /** @var URLToCheck[] */
    private $urlsToCheck = [];
    
    private $siteURL;
    
    private $count = 0;

    private $errors = 0;
    
    function __construct($siteURL) {
        $this->siteURL = $siteURL;
    }

    function getURLCount() {
        return count($this->urlsChecked);

    }
    
    function getErrorCount() {
        return $this->errors;
    }



    function getURL(URLToCheck $urlToCheck) {
        $fullURL = $this->siteURL.$urlToCheck->getUrl();
        //echo "Getting $fullURL \n";
        echo ".";

        $client = new \Artax\Client;
        
        $client->setOption('transfertimeout', 25);
        $response = $client->request($fullURL);
        $status = $response->getStatus();

        $this->urlsChecked[] = new URLResult(
            $urlToCheck->getUrl(),
            $status,
            $urlToCheck->getReferrer(),
            substr($response->getBody(), 0, 200)
        );
        

        if ($status != 200) {
            return null;
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
            case ('image/jpeg') :
            case ('image/jpg') :
            case ('image/png') : {
                //echo "Image with status - $status\n";

                compareImage($urlToCheck, $response->getBody(), $contentType);
                                     
                return null;
            }

            default: {
                throw new \Exception("Unrecognised content-type $contentType");
            }
        }
    }

    function parseLinkResult(DOMElement $element, $referrer)  {
        $href = $element->getAttribute('href');

        if (strpos($href, '/') === 0) {
            if (array_key_exists($href, $this->urlsToCheck) == false) {
                $this->urlsToCheck[$href] = new URLToCheck($href, $referrer);;
            }
        }
    }

    function parseImgResult(DOMElement $element, $referrer)  {
        $href = $element->getAttribute('src');

        if (strpos($href, '/') === 0) {
            if (array_key_exists($href, $this->urlsChecked) == false) {
                $this->urlsToCheck[$href] = new URLToCheck($href, $referrer);
            }
        }
    }
    
    function checkURL($url) {
        $this->urlsToCheck[$url] = new URLToCheck($url, '/');
        $finished = false;
        while ($finished == false) {
            $finished = true;
            foreach ($this->urlsToCheck as $url => $urlToCheck) {
                if ($urlToCheck != null) {
                    $this->checkURLInternal($urlToCheck);
                    $this->urlsToCheck[$url] = null;
                    $finished = false;
                }
            }
        }
    }
    
    function checkURLInternal(URLToCheck $urlToCheck) {

        $this->count++;
        $ok = false;
        
        $path = $urlToCheck->getUrl();

        //if ($this->count > 300) {
            //echo "Aborting - too many\n";
            //return;
        //}

        try {
            $body = $this->getURL($urlToCheck);

            if ($body) {
                $fluentDOM = new FluentDOM();
                $dom = $fluentDOM->load($body, 'text/html');
                
                $linkClosure = function (DOMElement $element) use ($urlToCheck) {
                    $this->parseLinkResult($element, $urlToCheck->getUrl());
                };
                $imgClosure = function (DOMElement $element) use ($urlToCheck) {
                    $this->parseImgResult($element, $urlToCheck->getUrl());
                };

                $dom->find('//a')->each($linkClosure);
                $dom->find('//img')->each($imgClosure);
            }

            $ok = true;
//            return new URLResult($path, 200, $urlToCheck->getReferrer());
        }
        catch (Artax\SocketException $se) {
            $this->urlsChecked[] = new URLResult($path, 500, "Artax\\SocketException on $path - ".$se->getMessage(). " Exception type is ".get_class($se));
        }
        catch(InvalidArgumentException $iae) {
            //echo "Fluent dom exception on $path - ".$iae->getMessage(). " Exception type is ".get_class($iae)." \n";
            $this->urlsChecked[] = new URLResult($path, 500, "Fluent dom exception on $path - ".$iae->getMessage(). " Exception type is ".get_class($iae));
        }
        catch(Exception $e) {
            //echo "Error getting $path - ".$e->getMessage(). " Exception type is ".get_class($e)." \n";
            $this->urlsChecked[] = new URLResult($path, 500, "Error getting $path - ".$e->getMessage(). " Exception type is ".get_class($e));
        }

        if ($ok != true) {
            $this->errors++;
        }
        
    }
    
    function getResults() {
        return $this->urlsChecked;
    }
}

$site = "http://imagick.test";
//$site = "http://test.phpimagick.com"

$siteChecker = new SiteChecker($site);
$siteChecker->checkURL('/');
//$siteChecker->checkURL('/image/Imagick/edgeExtend?image=Lorikeet');

$printer = new HTMLPrinter($siteChecker->getResults(), $site);
$outputStream = fopen("./checkResults.html", "w");
$printer->output($outputStream);

fclose($outputStream);

echo "Check complete. Found ".$siteChecker->getURLCount()." URIs with ".$siteChecker->getErrorCount()."errors.";