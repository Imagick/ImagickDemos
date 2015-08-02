<?php

namespace ImagickDemo\Model;

class OPCacheInfo
{
    private $loadedFiles = false;
    private $root = "/home/github/imagick-demos/imagick-demos";

    public function __construct($loadedFiles = false)
    {
        $this->loadedFiles = $loadedFiles;
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
            return $this->renderLoadedFiles($tableName);
        }

        $this->renderJustOpcache($tableName);
    }

    public function renderJustOpcache($tableName)
    {
        //$config = opcache_get_configuration();
        $status = opcache_get_status();
//
//        htmlvar_dump($status);
//        exit(0);

        $scriptInfoArray = array();

        foreach ($status['scripts'] as $scriptInfo) {
            $newScriptInfo = array();

            $newScriptInfo['path'] = $scriptInfo["full_path"];

            if (mb_strpos($scriptInfo["full_path"], $this->root) === 0) {
                $newScriptInfo['path'] = mb_substr($scriptInfo["full_path"], mb_strlen($this->root));
            }

            $newScriptInfo["memory_consumption"] = $scriptInfo["memory_consumption"];
            $newScriptInfo["hits"] = $scriptInfo["hits"];

            $scriptInfoArray[] = $newScriptInfo;
        }

        $this->renderTable($tableName, $scriptInfoArray);
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
                $newScriptInfo['path'] = mb_substr($loadedFile, mb_strlen($this->root));
            }
            $scriptInfo[] = $newScriptInfo;
        }

        $this->renderTable($tableName, $scriptInfo);
        
        return "";
    }


    public function renderTable($tableName, $scriptInfoArray)
    {
        echo "<table id='$tableName' class='tablesorter' style='border-collapse:collapse; border: 2px solid #1f2f1f;'>";

        $headers = array(
            "Size",
            "Hits&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",
            "Filename"
        );

        echo "<thead><tr>";
        foreach ($headers as $header) {
            echo "<th style='text-align: left;'>";
            echo $header;
            echo "</th>";
        }


        echo "</tr></thead>";

        echo "<tbody>";

        $totalMemory = 0;

        foreach ($scriptInfoArray as $scriptInfo) {
            echo "<tr>";

            echo "<td style='text-align: right' data-memory='".$scriptInfo["memory_consumption"]."'>";

            echo $this->sizeForHumans($scriptInfo["memory_consumption"]);
            echo "</td><td style='text-align: right'>";
            echo $scriptInfo["hits"];
            echo "</td><td>";

            echo $scriptInfo["path"];

            $totalMemory += $scriptInfo["memory_consumption"];

            echo "</td></tr>";
        }


//        'scripts' => ARRAY
//        (
//            '/home/intahwebz/intahwebz/lib/amazonWS/sdk.class.php' => ARRAY
//            (
//                'full_path' =>  "/home/intahwebz/intahwebz/lib/amazonWS/sdk.class.php",
//                'hits' =>  80,
//                'memory_consumption' =>  127624,
//                'last_used' =>  "Mon Aug  5 15:32:31 2013",
//                'last_used_timestamp' =>  1375716751,
//                'timestamp' =>  1363226973,
//            ),
//        

        echo "</tbody>";

        echo "<tfoot>";
        echo "<tr>";
        echo "<td>" . $this->sizeForHumans($totalMemory) . "</td>";
        echo "<td></td>";
        echo "<td>Total memory</td>";
        echo "</tr>";
        echo "</tfoot>";
        echo "</table>";
    }
}
