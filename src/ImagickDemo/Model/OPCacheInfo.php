<?php

namespace ImagickDemo\Model;

use ImagickDemo\Widget\OpcacheInfoSelector;

class OPCacheInfo
{
    private $loadedFiles = false;
    private $root;

    public function __construct(
        OpcacheInfoSelector $infoSelector//,
        //VariableMap $variableMap
    ) {
        //$this->loadedFiles = $variableMap->getVariable('filesOnly', false);
        
        $this->loadedFiles = $infoSelector->getLoadedFiles();
        $this->root = realpath(__DIR__.'/../../../');
    }

    private function sizeForHumans($bytes)
    {
        if ($bytes > 1048576) {
            return sprintf("%.2f MB", $bytes / 1048576);
        }
        else if ($bytes > 1024) {
            return sprintf("%.2f kB", $bytes / 1024);
        }
        else {
            return sprintf("%d bytes", $bytes);
        }
    }

    public function render($tableName = 'myTable')
    {
        if (!function_exists('opcache_get_status')) {
            return "Opcache not loaded.";
        }

        if ($this->loadedFiles == true) {
            $output = $this->renderLoadedFiles($tableName);
        }
        else {
            $output = $this->renderJustOpcache($tableName);
        }

        return $output;
    }

    public function renderJustOpcache($tableName)
    {
        $status = opcache_get_status();

        $scriptInfoArray = array();

        foreach ($status['scripts'] as $scriptInfo) {
            $newScriptInfo = array();

            $newScriptInfo['path'] = $scriptInfo["full_path"];

            if (mb_strpos($scriptInfo["full_path"], $this->root) === 0) {
                $newScriptInfo['path'] = '.'.mb_substr($scriptInfo["full_path"], mb_strlen($this->root));
            }

            $newScriptInfo["memory_consumption"] = $scriptInfo["memory_consumption"];
            $newScriptInfo["hits"] = $scriptInfo["hits"];

            $scriptInfoArray[] = $newScriptInfo;
        }

        return $this->renderTable($tableName, $scriptInfoArray);
    }


    public function renderLoadedFiles($tableName)
    {
        $status = opcache_get_status(true);
        $loadedFiles = get_included_files();
        $scriptInfo = array();

        if (isset($status['scripts']) == false) {
            return "Failed to load scripts info to generate OPCache info.";
        }

        foreach ($loadedFiles as $loadedFile) {
            $newScriptInfo = array();

            if (array_key_exists($loadedFile, $status['scripts']) == true) {
                $newScriptInfo["memory_consumption"] = $status['scripts'][$loadedFile]["memory_consumption"];
                $newScriptInfo["hits"] = $status['scripts'][$loadedFile]["hits"];
            } else {
                $newScriptInfo["memory_consumption"] = "-";
                $newScriptInfo["hits"] = "-";
            }

            $newScriptInfo['path'] = $loadedFile;

            if (mb_strpos($loadedFile, $this->root) === 0) {
                $newScriptInfo['path'] = '.'.mb_substr($loadedFile, mb_strlen($this->root));
            }
            $scriptInfo[] = $newScriptInfo;
        }

        return $this->renderTable($tableName, $scriptInfo);
    }

    public function renderTable($tableName, $scriptInfoArray)
    {
        $output = "<table id='$tableName' class='tablesorter tablefilter' style='border-collapse:collapse; border: 2px solid #1f2f1f;'>";

        $headers = array(
            "Size",
            "Hits&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",
            "Filename"
        );

        $output .= "<thead><tr>";
        foreach ($headers as $header) {
            $output .= "<th style='text-align: left;'>";
            $output .= $header;
            $output .= "</th>";
        }

        $output .= "</tr><tr>";
        $output .= "<td colspan='3' style='text-align:right; padding-right: 5px' >";
        $output .= "<input id='opcacheFilterInput' class='form-control form-inline' type='search' placeholder='search this table' name='' style='margin-left: 3px; width: 700px; margin-top: 3px; margin-bottom: 3px; display: inline-block' >";
        $output .= "</td>";
        $output .= "</tr></thead>";

        $output .= "<tbody>";

        $totalMemory = 0;
        $totalFiles = 0;

        foreach ($scriptInfoArray as $scriptInfo) {
            $output .= "<tr>";
            $output .= "<td style='text-align: right' data-memory='".$scriptInfo["memory_consumption"]."'>";
            $output .= $this->sizeForHumans($scriptInfo["memory_consumption"]);
            $output .= "</td><td style='text-align: right'>";
            $output .= $scriptInfo["hits"];
            $output .= "</td><td>";
            $output .= $scriptInfo["path"];
            $totalMemory += $scriptInfo["memory_consumption"];
            $output .= "</td></tr>";
            
            $totalFiles++;
        }

        $output .= "</tbody>";
        $output .= "<tfoot>";
        $output .= "<tr>";
        $output .= "<td colspan='2'>Total: ".$this->sizeForHumans($totalMemory)."</td>";
        $output .= "<td>Total files: $totalFiles</td>";
        $output .= "</tr>";
        $output .= "</tfoot>";
        $output .= "</table>";
        
        return $output;
    }
}
