<?php


namespace FilePacker;

use FileFilter\ConcatenatingFilter;
use FileFilter\GzipFilter;
use FileFilter\YuiCompressorFilter;
use Tier\Path\AutogenPath;
use Tier\Path\CachePath;
use Tier\Path\WebRootPath;
use Tier\Path\ExternalLibPath;
use Tier\File;
use FileFilter\YuiCompressorPath;

class YuiFilePacker implements FilePacker
{
    /**
     * @var string
     */
    private $cachePath;

    /**
     * @var string
     */
    private $autogenPath;

    /**
     * @var string
     */
    private $webRootPath;
    
    /** @var  string  */
    private $externalLibPath;

    public function __construct(
        CachePath $cachePath,
        AutogenPath $autogenPath,
        WebRootPath $webRootPath,
        ExternalLibPath $externalLibPath,
        YuiCompressorPath $yuiCompressorPath
    ) {
        $this->cachePath = $cachePath->getPath();
        $this->autogenPath = $autogenPath->getPath();
        $this->webRootPath = $webRootPath->getPath();
        $this->externalLibPath = $externalLibPath->getPath();
        $this->yuiCommpressorPath = $yuiCompressorPath;
    }

    public function getHeaders()
    {
        return ['Content-Encoding' =>'gzip'];
    }
    
    public function getFinalFilename(array $filesToPack, $extension)
    {
        return $this->getStubFinalFilename($filesToPack, 'min.'.$extension.'.gz');
    }

    private function getStubFinalFilename(array $filesToPack, $extension)
    {
        $jsInclude = implode("_", $filesToPack);
        $outputFilename = str_replace(array(',', '.', '/', '\\', '%2F'), '_', $jsInclude);
        $outputFilename = mb_substr($outputFilename, 0, 64).'_'.md5($outputFilename);

        return $this->cachePath."/filepacker/".$outputFilename.".".$extension;
    }
    
    public function pack($jsIncludeArray, $appendLine, $extension)
    {
        $finalFilename = $this->getStubFinalFilename($jsIncludeArray, $extension);
        $outputFile = File::fromFullPath($finalFilename);
        $filter = new ConcatenatingFilter($outputFile, $jsIncludeArray, $appendLine);
        $minFile = $outputFile->addExtension('min', true);
        
        $filter = new YuiCompressorFilter($filter, $minFile, $this->yuiCommpressorPath);
        $compressedFile = $minFile->addExtension('gz', false);
        $filter = new GzipFilter($filter, $compressedFile);

        $filter->process();
        
        $finaleFile = $filter->getFile();
        $finalFilename = $finaleFile->getPath();

        return $finalFilename;
    }
}
