<?php

declare(strict_types = 1);

/**
 * This is a set of functions that map exceptions that are otherwise uncaught into
 * acceptable responses that will be seen by the public
 */

use Psr\Http\Message\ResponseInterface;

function encapsulateTextInHtml(string $text)
{
    $html = <<< HTML
<html>
  <head>
  </head>
  <body>
    $text;
  </body>
</html>
HTML;

    return $html;
}

function debuggingCaughtExceptionExceptionMapperApp(
    \Osf\Exception\DebuggingCaughtException $pdoe,
    ResponseInterface $response
) {
    $text = getTextForException($pdoe);

    $text .= "\n<!-- This is caught in the exception mapper -->";

    \error_log($text);
    return new \SlimAuryn\Response\HtmlResponse(nl2br($text), [], 512);
}


function parseErrorMapperForApp(\ParseError $parseError, ResponseInterface $response)
{
    $string = sprintf(
        "Parse error: %s\nFile %s\nLine %d",
        $parseError->getMessage(),
        $parseError->getFile(),
        $parseError->getLine()
    );

    return new \SlimAuryn\Response\HtmlResponse(nl2br($string));
}
