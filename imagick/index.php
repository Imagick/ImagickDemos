<?php


if (defined('LOW_MEM_CLASS_LOADER') && LOW_MEM_CLASS_LOADER == true) {
    require_once('../vendor/intahwebz/lowmemoryclassloader/LowMemoryClassloader.php');
}
else {
    require_once('../vendor/autoload.php');
}


function myBad( Exception $ex ) {
    header("HTTP/1.0 500 Internal Server Error", true, 500);
    echo "Exception ".get_class($ex).': '.$ex->getMessage();
}


function errorHandler($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting
        return true;
    }

    switch ($errno) {
        case E_CORE_ERROR:
        case E_ERROR: {
            echo "<b>Fatality</b> [$errno] $errstr on line $errline in file $errfile <br />\n";
            break;
        }

        default: {
            echo "<b>errorHandler</b> [$errno] $errstr<br />\n";
            return false;
        }
    }

    /* Don't execute PHP internal error handler */
    return true;
}


function fatalErrorShutdownHandler() {
    $last_error = error_get_last();
    
    if (!$last_error) {
        return false;
    }
    
    switch ($last_error['type']) {
        case (E_ERROR):
        case (E_PARSE): {
            // fatal error
            header("HTTP/1.0 500 Bugger bugger bugger", true, 500);
            var_dump($last_error['type'], $last_error['message'], $last_error['file'], $last_error['line']);
            exit(0);
        }

        case(E_CORE_WARNING): {
            //TODO - report errors properly.
            errorHandler($last_error['type'], $last_error['message'], $last_error['file'], $last_error['line']);
            break;
        }
            
        default: {
            header("HTTP/1.0 500 Unknown fatal error", true, 500);
            var_dump($last_error);
            break;
        }
    }

    return false;
}

register_shutdown_function('fatalErrorShutdownHandler');
set_error_handler('errorHandler');
set_exception_handler('myBad');

require_once "process.php";
