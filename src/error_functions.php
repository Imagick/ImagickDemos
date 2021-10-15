<?php

declare(strict_types = 1);

function getExceptionText(\Throwable $exception): string
{
    $text = "";
    do {
        $text .= get_class($exception) . ":" . $exception->getMessage() . "\n\n";
        $text .= $exception->getTraceAsString();

        $exception = $exception->getPrevious();
    } while ($exception !== null);

    return $text;
}

function purgeExceptionMessage(\Throwable $exception): string
{
    $rawMessage = $exception->getMessage();



    $purgeAfterPhrases = [
        'with params'
    ];

    $message = $rawMessage;

    foreach ($purgeAfterPhrases as $purgeAfterPhrase) {
        $matchPosition = strpos($message, $purgeAfterPhrase);
        if ($matchPosition !== false) {
            $message = substr($message, 0, $matchPosition + strlen($purgeAfterPhrase));
            $message .= '**PURGED**';
        }
    }

    $file = $exception->getFile();

//    // normaliseFilePath
//    if (strpos($file, "/var/app/") === 0) {
//        $file = substr($file, strlen("/var/app/"));
//    }

//    $message .= sprintf(
//        "file %s:%s",
//        $file,
//        $exception->getLine()
//    );

    return $message;
}


function getTextForException(\Throwable $exception): string
{
    $currentException = $exception;
    $text = '';

    do {
        $text .= sprintf(
            "Exception type: %s\nMessage:  %s\nFile:  %s \n\nStack trace:\n%s\n",
            get_class($currentException),
            purgeExceptionMessage($currentException),
            normaliseFilePath($currentException->getFile()) . ':' . $currentException->getLine(),
            formatLinesWithCount(getExceptionStackAsArray($currentException))
        );

        $currentException = $currentException->getPrevious();
    } while ($currentException !== null);

    return $text;
}

function getStacktraceForException(\Throwable $exception): string
{
    return formatLinesWithCount(getExceptionStackAsArray($exception));
}

/**
 * Remove the installation directory prefix from a filename
 */
function normaliseFilePath(string $file): string
{
    if (strpos($file, "/var/app/") === 0) {
        $file = substr($file, strlen("/var/app/"));
    }

    return $file;
}


function saneErrorHandler(
    int $errorNumber,
    string $errorMessage,
    string $errorFile,
    int $errorLine
): bool {

    var_dump($errorNumber,
    $errorMessage,
    $errorFile,
    $errorLine);


    if (error_reporting() === 0) {
        // Error reporting has been silenced
        if ($errorNumber !== E_USER_DEPRECATED) {
            // Check it isn't this value, as this is used by twig, with error suppression. :-/
            return true;
        }
    }
//    if ($errorNumber === E_DEPRECATED) {
//        return true;
//    }
    if ($errorNumber === E_CORE_ERROR || $errorNumber === E_ERROR) {
        // For these two types, PHP is shutting down anyway. Return false
        // to allow shutdown to continue
        return false;
    }
    $message = "Error: [$errorNumber] $errorMessage in file $errorFile on line $errorLine.";
    throw new \Exception($message);
}



/**
 * @param array<string, string> $trace
 * @return string
 * @throws Exception
 */
function formatTraceLine(array $trace): string
{
    $location = '??';
    $function = 'unknown';

    if (isset($trace["file"]) && isset($trace["line"])) {
        $location = $trace["file"]. ':' . $trace["line"];
    }
    else if (isset($trace["file"])) {
        $location = $trace["file"] . ':??';
    }
//    else {
//        var_dump($trace);
//        exit(0);
//    }

    $baseDir = realpath(__DIR__ . '/../');
    if ($baseDir === false) {
        throw new \Exception("Couldn't find parent directory from " . __DIR__);
    }

    $location = str_replace($baseDir, '', $location);

    if (isset($trace["class"]) && isset($trace["type"]) && isset($trace["function"])) {
        $function = $trace["class"] . $trace["type"] . $trace["function"];
    }
    else if (isset($trace["class"]) && isset($trace["function"])) {
        $function = $trace["class"] . '_' . $trace["function"];
    }
    else if (isset($trace["function"])) {
        $function = $trace["function"];
    }
    else {
        $function = "Function is weird: " . json_encode(var_export($trace, true));
    }

    return sprintf(
        "%s %s",
        $location,
        $function
    );
}

function getExceptionStack(\Throwable $exception): string
{
    $line = "Exception of type " . get_class($exception). "\n";

    foreach ($exception->getTrace() as $trace) {
        $line .=  formatTraceLine($trace);
    }

    return $line;
}


/**
 * @param Throwable $exception
 * @return string[]
 */
function getExceptionStackAsArray(\Throwable $exception)
{
    $lines = [];
    foreach ($exception->getTrace() as $trace) {
        $lines[] = formatTraceLine($trace);
    }

    return $lines;
}



//function cliHandleInjectionException(Application $console, \Auryn\InjectionException $ie)
//{
//    fwrite(STDERR, "time: " . date(\ImagickDemo\App::DATE_TIME_FORMAT) . " ");
////    $output = new \Danack\Console\Output\BufferedOutput();
////    $console->renderException($ie, $output);
////    fwrite(STDERR, $output->fetch());
////
////    fwrite(STDERR, "Stacktrace:\n");
//
//
//    fwrite(STDERR, getTextForException($ie) . "\n");
//    fwrite(STDERR, "Dependency chain:\n");
//    fwrite(STDERR, implode("\n  ", $ie->getDependencyChain()));
//    fwrite(STDERR, "\n");
//
//    exit(-1);
//}
