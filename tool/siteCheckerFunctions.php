<?php

require __DIR__.'/../vendor/autoload.php';

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

function getUrlAsHtml(string $url)
{
    static $chrome = null;

    if ($chrome === null) {
        $host_ip = gethostbyname('chrome_headless');
        //echo "chrome_headless IP is $host_ip\n";
        $chrome = new ChromeDriver(
            "http://$host_ip:9222",
            null,
            'http://internal.phpimagick.com'
        );

        $chrome->start();
    }

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

//        echo "Added $img_url \n";
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
            return;
        }

        if ($status_code !== 200) {
            echo "url $url had status code $status_code\n";
        }
        else {
            // echo "url $url is OK.\n";
        }

        if ($content_type === "image/gif" ||
            $content_type === "image/png" ||
            $content_type === "image/jpeg") {
            $this->urlsToCheck[$url] = $content_type;
            return;
        }
        else if ($content_type !== "text/html") {
            echo "URL $url had bad content type [" . $content_type . "]\n";
            $this->urlsToCheck[$url] = 'bad content type [' . $content_type . "]\n";
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

    private function checkImage(string $img_url)
    {
        echo "Checking $img_url\n";
        try {
            [$status_code, $content_type, $content] = getUrlAsHtml($this->base_url . $img_url);
            echo "no exception \n";
        }
        catch (DriverException $de) {
            echo "Oooh, an exception: " . $de->getMessage();
            $this->imgsToCheck[$img_url] = "Exception: " . $de->getMessage();
            return;
        }

        echo "Status code = $status_code \n";

        if ($status_code !== 200) {
            $this->imgsToCheck[$img_url] = $status_code;
            //var_dump($this->imgsToCheck);
            return;
        }

        if ($content_type === "image/gif" ||
            $content_type === "image/png" ||
            $content_type === "image/jpg" ||
            $content_type === "image/jpeg") {
//            echo "content type was okay... $content_type \n";
            $this->imgsToCheck[$img_url] = $content_type;
            return;
        }

        echo "what do: " . $img_url . "what do type $content_type status $status_code \n";

        $this->imgsToCheck[$img_url] = "what do type $content_type status $status_code \n";
    }

    public function checkNextImage()
    {
        $count = 0;

        foreach ($this->imgsToCheck as $img_url => $result) {
            if ($result === null) {
                $this->checkImage($img_url);
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

    public function checkEverything()
    {
        do {
            $finished = $this->checkNextUrl();
        } while ($finished === false);

        do {
            $finished = $this->checkNextImage();
        } while ($finished === false);
    }


function dumpResult()
    {
        echo "****Results**************\n";
        echo "****Results**************\n";
        echo "****Results**************\n";
        printf(
            "Checked %d urls and %d images\n",
            count($this->urlsToCheck),
            count($this->imgsToCheck)
        );

        echo "Problematic urls:\n";
        foreach ($this->urlsToCheck as $url => $result) {
            if ($result === 200) {
                continue;
            }
            echo $url . " : " . $result . "\n";
        }

        echo "Problematic img:\n";
        foreach ($this->imgsToCheck as $img_url => $result) {
            if ($result === "image/gif" ||
                $result === "image/png" ||
                $result === "image/jpg" ||
                $result === "image/jpeg") {
                continue;
            }
            if ($result === null) {
                echo "[" . $img_url . "] : result is null?\n";
            }

            echo "[" . $img_url . "] : " . $result . "\n";
        }
    }
}
