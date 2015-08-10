<?php

namespace ScriptServer\Controller;

use Tier\ResponseBody\FileResponseIM as FileResponse;
use Tier\Path\WebRootPath;
use Tier\ResponseBody\FileResponseCreator;
use FilePacker\FilePacker;
use Arya\Request;
use Arya\Response;
use Tier\ResponseBody\EmptyBody;
use Tier\ResponseBody\FileResponseIMFactory;

function extractItems($cssInclude)
{
    $items = [];
    $cssIncludeArray = explode(',', $cssInclude);
    foreach ($cssIncludeArray as $cssIncludeItem) {
        $cssIncludeItem = urldecode($cssIncludeItem);
        $cssIncludeItem = trim($cssIncludeItem);
        $versionString = str_replace(
            array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "."),
            "",
            $cssIncludeItem
        );
        
        $versionString = trim($versionString);

        if (mb_strlen($versionString) == 0) {
            //This isn't actually a JS include but is instead a version number
            continue;
        }

        $items[] = $cssIncludeItem;
    }

    return $items;
}


function checkIfModifiedHeader(Request $request, $lastModifiedTime)
{
    if ($lastModifiedTime === false) {
        return false;
    }
    
    if (!$request->hasHeader('If-Modified-Since')) {
        return false;
    }

    $header = $request->getHeader('If-Modified-Since');
    $clientModifiedTime = @strtotime($header);
    
    if ($clientModifiedTime == false) {
        return false;
    }

    if ($clientModifiedTime < $lastModifiedTime) {
        return false;
    }
 
    return true;
}


class ScriptServer
{
    /**
     * @var FilePacker
     */
    private $filePacker;

    private $fileResponseFactory;
    
    public function __construct(
        Response $response,
        FileResponseIMFactory $fileResponseFactory,
        FilePacker $filePacker,
        WebRootPath $webRootPath
    ) {
        $this->fileResponseFactory = $fileResponseFactory;
        $this->webRootPath = $webRootPath->getPath();
        $this->filePacker = $filePacker;
        $this->response = $response;
    }

    /**
     * @param $cssInclude
     * @return array
     */
    private function getCSSFilesToInclude($cssInclude)
    {
        $files = array();
        $items = extractItems($cssInclude);
        foreach ($items as $item) {
            $files[] = $this->getCSSFilename($item);
        }

        return $files;
    }

    /**
     * @param $cssIncludeItem
     * @return string
     */
    private function getCSSFilename($cssIncludeItem)
    {
        $cssIncludeItem = str_replace(array("\\", ".." ), "", $cssIncludeItem);

        return $this->webRootPath."/css/".$cssIncludeItem.".css";
    }

    /**
     * @param $jsIncludeItem
     * @return string
     */
    private function getJavascriptFilename($jsIncludeItem)
    {
        $jsIncludeItem = str_replace(array("\\", ".."), "", $jsIncludeItem);

        return $this->webRootPath . "js/" . $jsIncludeItem . ".js";
    }

    /**
     * @param $jsInclude
     * @return array
     */
    private function getJSFilesToInclude($jsInclude)
    {
        $files = array();
        $items = extractItems($jsInclude);
        foreach ($items as $item) {
            $files[] = $this->getJavascriptFilename($item);
        }

        return $files;
    }

        /**
     * @param $cssInclude
     * @return FileResponse
     */
    public function getPackedCSS(Request $request, $cssInclude)
    {
        $cssIncludeArray = $this->getCSSFilesToInclude($cssInclude);

        return $this->getPackedFiles(
            $request,
            $cssIncludeArray,
            $appendLine = "\n",
            'text/css',
            'css'
        );
    }


    /**
     * @param $jsInclude
     * @return FileBody|EmptyBody
     * @throws \Exception
     */
    public function getPackedJavascript(Request $request, $jsInclude)
    {
        $jsIncludeArray = $this->getJSFilesToInclude($jsInclude);

        return $this->getPackedFiles(
            $request,
            $jsIncludeArray,
            $appendLine = "",
            'application/javascript',
            'js'
        );
    }
    
    public function getPackedFiles(Request $request, $jsIncludeArray, $appendLine, $contentType, $extension)
    {
        $finalFilename = $this->filePacker->getFinalFilename($jsIncludeArray, $extension);        
        $notModifiedHeader = checkIfModifiedHeader(
            $request,
            @filemtime($finalFilename)
        );

        if ($notModifiedHeader) {
            $this->response->setStatus(304);
            return new EmptyBody();
        }
        
        $finalFilename = $this->filePacker->pack($jsIncludeArray, $appendLine, $extension);

        return $this->fileResponseFactory->create(
            $finalFilename,
            $contentType,
            $this->filePacker->getHeaders()
        );
    }
}
