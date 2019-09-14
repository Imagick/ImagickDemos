<?php

declare(strict_types = 1);

namespace ImagickDemo;

/**
 * Class CLIFunction
 * Set of utility functions for CLI applications.
 */
class CLIFunction
{
    public static function setupErrorHandlers()
    {
        $initialOBLevel = ob_get_level();
        $shutdownFunction = function () use ($initialOBLevel) {
            while (ob_get_level() > $initialOBLevel) {
                ob_end_clean();
            }
            self::fatalErrorShutdownHandler();
        };

        register_shutdown_function($shutdownFunction);

        set_error_handler([\ImagickDemo\CLIFunction::class, 'errorHandler']);
    }

    public static function fatalErrorShutdownHandler()
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

        if ($lastError !== null && in_array($lastError['type'], $fatals) === true) {
            $message = 'unknown';
            $file = 'unknown';
            $line = 'unknown';

            if (array_key_exists('message', $lastError) === true) {
                $message = $lastError['message'];
            }
            if (array_key_exists('file', $lastError) === true) {
                $file = $lastError['file'];
            }
            if (array_key_exists('line', $lastError) === true) {
                $line = $lastError['line'];
            }

            $errorMessage = sprintf("Fatal error: %s in %s on line %d", $message, $file, $line);

            error_log($errorMessage);
            $msg = "Oops! Something went terribly wrong :(";
            $msg .= $errorMessage;
            $msg .= "\n";

            echo $msg;

            exit(-1);
        }
    }

    public static function errorHandler($errno, $errstr, $errfile, $errline)
    {
        if (error_reporting() === 0) {
            return true;
        }
        if ($errno === E_DEPRECATED) {
            // In general we don't care.
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

        if (array_key_exists($errno, $errorNames) === true) {
            $errorType = $errorNames[$errno];
        }

        $message =  "$errorType: [$errno] '$errstr' in file $errfile on line $errline";

        throw new \ErrorException($message);
    }
}
