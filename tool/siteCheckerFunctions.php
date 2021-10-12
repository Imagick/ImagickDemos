<?php

require __DIR__.'/../vendor/autoload.php';

use Amp\Artax\Client as ArtaxClient;
use Amp\Artax\SocketException;
use Amp\Artax\Response;
use DMore\ChromeDriver\ChromeDriver;
use Behat\Mink\Exception\DriverException;


function compareImage(URLToCheck $urlToCheck, $resposeBody, $contentType) {

    $imageType = substr($contentType, strlen('image/'));

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

    /**
     * @var ArtaxClient
     */
    private $artaxClient;
    
    function __construct($siteURL, ArtaxClient $artaxClient) {
        $this->siteURL = $siteURL;
        $this->artaxClient = $artaxClient;
    }

    function getURLCount() {
        return count($this->urlsChecked);

    }
    
    function getErrorCount() {
        return $this->errors;
    }

    /**
     * @param URLToCheck $urlToCheck
     */
    function fetchURL(URLToCheck $urlToCheck) {
        $this->count++;
        $fullURL = $this->siteURL.$urlToCheck->getUrl();
        
        if (strpos($fullURL, '/queueinfo') !== false) {
            return null;
        }
        
        
        
        if ($this->count % 10 == 0) {
            echo "\n";
        }
        echo ".";
        echo "Getting $fullURL \n";
        $promise = $this->artaxClient->request($fullURL);
        $analyzeResult = function(\Exception $e = null, Response $response = null) use ($urlToCheck, $fullURL) {
            
            if ($e) {
                echo "Something went wrong for $fullURL : ".$e->getMessage()."\n";
                
                if ($response) {
                    var_dump($response->getAllHeaders());
                }
                
                
                $this->errors++;
                return null;
            }

            $status = $response->getStatus();
            $this->urlsChecked[] = new URLResult(
                $urlToCheck->getUrl(),
                $status,
                $urlToCheck->getReferrer(),
                substr($response->getBody(), 0, 200)
            );

            if ($status != 200 && $status != 420 && $status != 202) {
                echo "Status is not ok for ".$urlToCheck->getUrl()."\n";
                $this->errors++;
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

            switch ($contentType) {

                case ('text/html'): {
                    $body = $response->getBody();
                    $this->analyzeBody($urlToCheck, $body);
                    break;
                }
                
                case ('text/plain'): {
//                    $body = $response->getBody();
//                    throw new \Exception("site checker should be run with background processing disabled:  ". $urlToCheck->getUrl() . " ". $urlToCheck->getReferrer()  . " " .substr($body, 0, 300));
                    return null;
                    break;
                }

                case ('application/octet-stream') :
                case ('image/gif') :
                case ('image/jpeg') :
                case ('image/jpg') :
                case ('image/vnd.adobe.photoshop') :
                case ('image/png') : {
                    //echo "Image with status - $status\n";
                    //compareImage($urlToCheck, $response->getBody(), $contentType);
                    return null;
                }

                default: {
                    throw new \Exception("Unrecognised content-type $contentType");
                }
            }
        };

        $promise->when($analyzeResult);
    }

    /**
     * @param DOMElement $element
     * @param $referrer
     */
    function parseLinkResult(DOMElement $element, $referrer)  {
        $href = $element->getAttribute('href');
        $this->addLinkToProcess($href, $referrer);
    }

    /**
     * @param DOMElement $element
     * @param $referrer
     */
    function parseImgResult(DOMElement $element, $referrer)  {
        $href = $element->getAttribute('src');
        $this->addLinkToProcess($href, $referrer);
    }
    
    
//    function addLinkToProcess($href, $referrer) {
//        $this->checkURL(new URLToCheck($href, $referrer));
//    }


//    /**
//     * @param URLToCheck $urlToCheck
//     */
//    function checkURL(URLToCheck $urlToCheck) {
//        $url = $urlToCheck->getUrl();
//        if (array_key_exists($url, $this->urlsToCheck)) {
//            return;
//        }
//
//        if (strpos($urlToCheck->getUrl(), '/') !== 0) {
//            $this->urlsToCheck[$url] = new URLResult($url, 200, $urlToCheck->getReferrer());
//            return;
//        }
//
//        $this->urlsToCheck[$url] = null;
//        $this->fetchURL($urlToCheck);
//    }

    /**
     * @param URLToCheck $urlToCheck
     * @param $body
     */
    function analyzeBody(URLToCheck $urlToCheck, $body) {
        $ok = false;
        $path = $urlToCheck->getUrl();
        
        try {
        
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

            $ok = true;
        }
        catch (SocketException $se) {
            $this->urlsChecked[] = new URLResult($path, 500, "Artax\\SocketException on $path - ".$se->getMessage(). " Exception type is ".get_class($se));
        }
        catch(InvalidArgumentException $iae) {
            //echo "Fluent dom exception on $path - ".$iae->getMessage(). " Exception type is ".get_class($iae)." \n";
            $this->urlsChecked[] = new URLResult($path, 500, "Fluent dom exception on $path - ".$iae->getMessage(). " Exception type is ".get_class($iae));
        }
        catch(Exception $e) {
            echo "Error getting $path - ".$e->getMessage(). " Exception type is ".get_class($e)." \n";
//            $this->urlsChecked[] = new URLResult($path, 500, "Error getting $path - ".$e->getMessage(). " Exception type is ".get_class($e));
        }

        if ($ok != true) {
            $this->errors++;
        }
    }

    /**
     * @return URLResult[]
     */
    function getResults() {
        return $this->urlsChecked;
    }
}


function getUrlAsHtml(string $url)
{
    static $chrome = null;

    $host_ip = gethostbyname('chrome_headless');
    //echo "chrome_headless IP is $host_ip\n";
    $chrome = new ChromeDriver(
        "http://$host_ip:9222",
        null,
        'http://internal.phpimagick.com'
    );

    $chrome->start();
    $chrome->visit($url);

    $content_type = null;
    foreach ($chrome->getResponseHeaders() as $key => $value) {
        if ($key === "Content-Type") {
            $content_type = $value;
            $semiColonPosition = strpos($value, ";");
            if ($semiColonPosition !== false) {
                $content_type = substr($value, 0, $semiColonPosition);
            }
        }
    }

    return [
        $chrome->getStatusCode(),
        $content_type,
        $chrome->getContent()
    ];

//    var_dump($status, $chrome->getContent());
}


class SiteChecker2
{
    private string $base_url;
    private array $imgsToCheck = [];
    private array $urlsToCheck = [];

    /**
     * @param string $base_url
     */
    public function __construct(string $base_url)
    {
        $this->base_url = $base_url;
    }


    function addLinkToProcess(string $url)
    {
//        echo "adding link $url\n";
        if (array_key_exists($url, $this->urlsToCheck)) {
            return;
        }

        if (stripos($url, "http") === 0) {
//            echo "Ignoring external url $url";
            return;
        }

        $this->urlsToCheck[$url] = null;
    }

    function addImageToProcess(string $img_url)
    {
        if (array_key_exists($img_url, $this->imgsToCheck)) {
            return;
        }

        $this->imgsToCheck[$img_url] = null;
    }

    function extractLinks(string $body)
    {
        $fluentDOM = new FluentDOM();
        $dom = $fluentDOM->load($body, 'text/html');

        $linkClosure = function (\DOMElement $element) {
            $href = $element->getAttribute('href');
            $this->addLinkToProcess($href);
        };
        $imgClosure = function (\DOMElement $element) {
            $src = $element->getAttribute('src');
            $this->addImageToProcess($src);
        };

        $dom->find('//a')->each($linkClosure);
        $dom->find('//img')->each($imgClosure);
    }

    public function checkUrl(string $url)
    {
        echo "Checking $url\n";
        try {
            [$status_code, $content_type, $content] = getUrlAsHtml($this->base_url . $url);
        }
        catch (DriverException $de) {
            echo "Oooh, an exception: " . $de->getMessage();
            $this->urlsToCheck[$url] = "Exception: " . $de->getMessage();
        }

        if ($status_code !== 200) {
            echo "url $url had status code $status_code\n";
        }
        else {
            echo "url $url is OK.\n";
        }

        if ($content_type !== "text/html") {
            echo "URL $url had bad content type [" . $content_type . "]\n";
            $this->urlsToCheck[$url] = 'bad content type';
            return;
        }

        $this->extractLinks($content);
        $this->urlsToCheck[$url] = $status_code;
    }

    function checkNextUrl()
    {
        $count = 0;

        foreach ($this->urlsToCheck as $url => $result) {
            if ($result === null) {
                $this->checkUrl($url);
                return false;
            }

            $count += 1;
            if ($count > 5000) {
                echo "That's enough checking for now.";
                return true;
            }
        }
        return true;
    }

    function dumpResult()
    {
        echo "****Results**************\n";
        echo "****Results**************\n";
        echo "****Results**************\n";
        foreach ($this->urlsToCheck as $url => $result) {
            echo $url . " : " . $result . "\n";
        }
    }
}
