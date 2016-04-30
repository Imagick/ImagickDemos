<?php


namespace ImagickDemo;

class Display
{
    public static function getPanelStart($smaller, $extraClass = '', $style = '')
    {
        if ($smaller == true) {
            $output = "<div class='row'>
            <div class='col-md-12 visible-xs visible-sm contentPanel $extraClass'  style='$style'>";
        } else {
            $output = "<div class='row'>
            <div class='col-md-12 visible-md visible-lg contentPanel $extraClass'  style='$style'>";
        }

        return $output;
    }

    public static function getPanelEnd()
    {
        return "</div></div>";
    }



    public static function renderKernelTable($matrix)
    {
        $output = "<table class='infoTable'>";
    
        foreach ($matrix as $row) {
            $output .= "<tr>";
            foreach ($row as $cell) {
                $output .= "<td style='text-align:left'>";
                if ($cell === false) {
                    $output .= "false";
                }
                else {
                    $output .= round($cell, 3);
                }
                $output .= "</td>";
            }
            $output .= "</tr>";
        }
    
        $output .= "</table>";
    
        return $output;
    }

    public static function renderImgTag($url, $id = '', $extra = '')
    {
        $output = sprintf(
            "<img src='%s' id='%s' class='img-responsive' %s />",
            $url,
            $id,
            $extra
        );
    
        return $output;
    }
}
