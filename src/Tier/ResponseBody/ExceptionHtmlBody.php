<?php

namespace Tier\ResponseBody;

function getTrace($traceParts, $directory)
{
    $traceText = "";
    $i = 1;

    foreach ($traceParts as $node) {
        $traceText .= "#$i ";
        if (isset($node['file'])) {
            $traceText .= $node['file']." ";
        }
        if (isset($node['line'])) {
            $traceText .= "(".$node['line']."): ";
        }
        if (isset($node['class'])) {
            $traceText .= $node['class'] . "->";
        }
        $traceText .= $node['function'] . "()\n";
        $i++;
    }
    
    $traceText = str_replace($directory, '', $traceText);

    return $traceText;
}


/**
 * Class ExceptionHtmlBody
 *
 * We use this class to generate exception pages rather than the template renderer, to
 * avoid yo' dawging if the template renderer has an exception.
 *
 * @package Tier\ResponseBody
 */
class ExceptionHtmlBody extends HtmlBody
{
    public function __construct(\Exception $e)
    {
        $fullText = $this->getBeforeText();
        $fullText .= "<p>";
        $fullText .= "Exception caught: ".$e->getMessage(). "<br/>";
        $fullText .= "</p>";

        $fullText .= "<p>";
        $fullText .= "Exception type: ".get_class($e). "<br/>";
        $fullText .= "</p>";

        $fullText .= "<p><pre>";
        $fullText .= getTrace($e->getTrace(), realpath(__DIR__."/../../../"));
        $fullText .= "</pre></p>";

        $fullText .= $this->getAfterText();

        parent::__construct($fullText);
    }

    private function getBeforeText()
    {
        $text = <<< END

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Tier - DI based application</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='/css/bootstrap.min.css' />
    <link rel='stylesheet' type='text/css' href='/css/bootstrap-theme.css' />
    <script type='text/javascript' src='/js/bootstrap.js'></script>
</head>

<body>
<div class="container">
  
<div class="row">
  <div class="col-md-10 col-md-offset-2">
        <div class="page-header">
            <h1>Tier <small>using DI to implement app architecture</small></h1>
        </div>
  </div>
</div>

<div class="row">
    <div class="col-md-2">


<nav class="bs-docs-sidebar hidden-print">
    <ul class="nav">
        <li>
            <a href="/">Home</a>
        </li>
    </ul>
</nav>
    </div>
    
    <div class="col-md-9">
         <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
END;

        return $text;
    }
    
    
    private function getAfterText()
    {
        $text = <<< END
            </div>
        </div>
    </div> 
    </div>
</div>
</body>
</html>

END;

        return $text;
    }
}
