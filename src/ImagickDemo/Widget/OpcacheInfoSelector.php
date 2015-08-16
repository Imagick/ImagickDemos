<?php


namespace ImagickDemo\Widget;

use ImagickDemo\Framework\VariableMap;

class OpcacheInfoSelector
{
    private $loadedFiles;

    public function __construct(VariableMap $variableMap)
    {
        $this->loadedFiles = $variableMap->getVariable('filesOnly', false);
    }

    /**
     * @return mixed
     */
    public function getLoadedFiles()
    {
        return $this->loadedFiles;
    }

    public function render()
    {
        $allClass = 'active';
        $loadedOnlyClass = '';
        
        if ($this->loadedFiles) {
            $allClass = '';
            $loadedOnlyClass = 'active';
        }
        
        $output = <<< END
    <a class="btn btn-default $allClass" href="/opinfo?filesOnly=" role="button">All files</a>
    <a class="btn btn-default $loadedOnlyClass" href="/opinfo?filesOnly=true" role="button">Loaded files only</a>
END;
        return $output;
    }
}
