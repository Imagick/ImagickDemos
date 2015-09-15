<?php


function exceptionHandler(Exception $ex)
{
    //TODO - need to ob_end_clean as many times as required because
    //otherwise partial content gets sent to the client.

    if (headers_sent() == false) {
        header("HTTP/1.0 500 Internal Server Error", true, 500);
    }
    else {
        //Exception after headers sent
    }

    while ($ex) {
        echo "Exception " . get_class($ex) . ': ' . $ex->getMessage()."<br/>";

        foreach ($ex->getTrace() as $tracePart) {
            if (isset($tracePart['file']) && isset($tracePart['line'])) {
                echo $tracePart['file'] . " " . $tracePart['line'] . "<br/>";
            }
            else if (isset($tracePart["function"])) {
                echo $tracePart["function"] . "<br/>";
            }
            else {
                var_dump($tracePart);
            }
        }
        $ex = $ex->getPrevious();
        if ($ex) {
            echo "Previously ";
        }
    };
}

function errorHandler($errno, $errstr, $errfile, $errline)
{
    if (error_reporting() == 0) {
        return true;
    }
    if ($errno == E_DEPRECATED) {
        //lol don't care.
        return true;
    }

    $errorNames = [
        E_ERROR => "E_ERROR",
        E_WARNING => "E_WARNING",
        E_PARSE => "E_PARSE",
        E_NOTICE => "E_NOTICE",
        E_CORE_ERROR => "E_CORE_ERROR",
        E_CORE_WARNING => "E_CORE_WARNING",
        E_COMPILE_ERROR => "E_COMPILE_ERROR",
        E_COMPILE_WARNING => "E_COMPILE_WARNING",
        E_USER_ERROR => "E_USER_ERROR",
        E_USER_WARNING => "E_USER_WARNING",
        E_USER_NOTICE => "E_USER_NOTICE",
        E_STRICT => "E_STRICT",
        E_RECOVERABLE_ERROR => "E_RECOVERABLE_ERROR",
        E_DEPRECATED => "E_DEPRECATED",
        E_USER_DEPRECATED => "E_USER_DEPRECATED",
    ];
    
    $errorType = "Error type $errno";

    if (array_key_exists($errno, $errorNames)) {
        $errorType = $errorNames[$errno];
    }

    $message =  "$errorType: [$errno] $errstr in file $errfile on line $errline";

    throw new \LogicException($message);
}

function fatalErrorShutdownHandler()
{
    $fatals = [
        E_ERROR,
        E_PARSE,
        E_USER_ERROR,
        E_CORE_ERROR,
        E_CORE_WARNING,
        E_COMPILE_ERROR,
        E_COMPILE_WARNING
    ];
    $lastError = error_get_last();

    if ($lastError && in_array($lastError['type'], $fatals)) {
//        if (headers_sent()) {
//            return;
//        }
        header_remove();
        header("HTTP/1.0 500 Internal Server Error");
        
        extract($lastError);
        $errorMessage = sprintf("Fatal error: %s in %s on line %d", $message, $file, $line);

        error_log($errorMessage);
        $msg = "Oops! Something went terribly wrong :(";

        //$msg = "<pre style=\"color:red;\">{$msg}</pre>";
        $msg = sprintf(
            "<pre style=\"color:red;\">%s</pre>",
            $errorMessage
        );

        echo "<html><body><h1>500 Internal Server Error</h1><hr/>{$msg}</body></html>";
    }
}
