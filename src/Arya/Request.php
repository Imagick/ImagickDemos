<?php

namespace Arya;

class Request implements \ArrayAccess, \Iterator {

    private $headers = [];
    private $query = [];
    private $form = [];
    private $files = [];
    private $cookies = [];
    private $vars = [];
    private $bodyStream;
    private $body = "";
    private $method = 'GET';

    private $isEncrypted;
    private $inMemoryBodyStreamSize = 2097152;
    private $isInputStreamCopied = FALSE;

    public function __construct(array $_server, array $_get, array $_post, array $_files, array $_cookie, $_input) {
        $this->processServer($_server);

        $this->query = $_get;
        $this->form = $_post;
        $this->files = $_files;
        $this->cookies = $_cookie;

        $this->processInput($_input);
    }

    private function processServer(array $_server) {
        foreach ($_server as $key => $value) {
            $this->vars[$key] = $value;
            if (strpos($key, 'HTTP_') === 0) {
                $key = str_replace('_', '-', substr($key, 5));
                $this->headers[$key] = $value;
            }
        }

        $uri = $_server['REQUEST_URI'];
        $uriPath = parse_url($uri, PHP_URL_PATH);
        $this->vars['REQUEST_URI'] = $uri;
        $this->vars['REQUEST_URI_PATH'] = $uriPath;

        $isEncrypted = !(empty($_server['HTTPS']) || strcasecmp($_server['HTTPS'], 'off') === 0);
        $this->isEncrypted = $isEncrypted;
        $this->vars['HTTPS'] = $isEncrypted;
        $this->vars['SERVER_PROTOCOL'] = substr($_server['SERVER_PROTOCOL'], -3);

        if (isset($_server['CONTENT_LENGTH'])) {
            $this->headers['CONTENT-LENGTH'] = $_server['CONTENT_LENGTH'];
        }

        if (isset($_server['CONTENT_TYPE'])) {
            $this->headers['CONTENT-TYPE'] = $_server['CONTENT_TYPE'];
        }
        
        if (isset($_server['REQUEST_METHOD'])) {
            $this->method = $_server['REQUEST_METHOD'];
        }
    }

    private function processInput($_input) {
        $this->bodyStream = $_input;

        if ($_input
            && $this->vars['REQUEST_METHOD'] !== 'POST'
            && isset($this->vars['CONTENT_TYPE'])
            && stripos($this->vars['CONTENT_TYPE'], 'multipart/form-data') === 0
        ) {
            $this->parseMultipartFormData($_input);
        }
    }

    /**
     * @TODO Parse non-POST-method multipart bodies into form/files arrays
     */
    private function parseMultipartFormData($_input) {}

    /**
     * Did the request contain the specified header field?
     *
     * Header field names are NOT case-sensitive.
     *
     * @param string $field
     * @return bool
     */
    public function hasHeader($field) {
        return isset($this->headers[strtoupper($field)]);
    }

    public function getHeader($field) {
        $ucField = strtoupper($field);
        if (isset($this->headers[$ucField])) {
            return $this->headers[$ucField];
        } else {
            throw new \DomainException(
                sprintf("Unknown header field: %s", $field)
            );
        }
    }

    public function getAllHeaders() {
        return $this->headers;
    }

    public function hasQueryParameter($field) {
        $fields = (is_array($field) || is_object($field))
            ? $field
            : func_get_args();

        foreach ($fields as $key) {
            if (!isset($this->query[$key])) {
                return false;
            }
        }

        return true;
    }

    /**
     * Retrieve the value of a query parameter
     *
     * If the specified query parameter does not exist a \DomainException is thrown. If uncaught
     * this exception results in a 500 Internal Server Error being relayed to the user.
     *
     * @param string $field
     * @throws \DomainException If query field does not exist in the request
     * @return array|string
     */
    public function getQueryParameter($field) {
        if (isset($this->query[$field])) {
            return $this->query[$field];
        } else {
            throw new \DomainException(
                sprintf("Unknown query parameter: %s", $field)
            );
        }
    }

    /**
     * A convenience method for retrieving a query parameter with the expectation that the value is an array
     *
     * An uncaught UserInputException will result in a 400 Invalid Query Parameter response being
     * returned to the user.
     *
     * @throws UserInputException
     * @throws \DomainException If query field does not exist in the request
     * @param string $field
     * @return array
     */
    public function getArrayQueryParameter($field) {
        $value = $this->getQueryParameter($field);

        if(is_array($value)) {
            return $value;
        } else {
            throw new UserInputException(
                sprintf("Wrong query parameter type (%s) at parameter %s", gettype($field), $field)
            );
        }
    }

    /**
     * A convenience method for retrieving a query parameter with the expectation that the value is a string
     *
     * An uncaught UserInputException will result in a 400 Invalid Query Parameter response being
     * returned to the user.
     *
     * @throws UserInputException
     * @throws \DomainException If query field does not exist in the request
     * @param string $field
     * @return string
     */
    public function getStringQueryParameter($field) {
        $value = $this->getQueryParameter($field);

        if(is_string($value)) {
            return $value;
        } else {
            throw new UserInputException(
                sprintf("Wrong query parameter type (%s) at parameter %s", gettype($field), $field)
            );
        }
    }

    public function getAllQueryParameters() {
        return $this->query;
    }

    public function hasFormField($field) {
        return isset($this->form[$field]);
    }

    /**
     * Retrieve the value of a submitted form field
     *
     * If the specified form field does not exist a \DomainException is thrown. If uncaught
     * this exception results in a 500 Internal Server Error being relayed to the user.
     *
     * @param string $field
     * @throws \DomainException If form field does not exist in the request
     * @return string|array
     */
    public function getFormField($field) {
        if (isset($this->form[$field])) {
            return $this->form[$field];
        } else {
            throw new \DomainException(
                sprintf("Unknown form field: %s", $field)
            );
        }
    }

    /**
     * A convenience method for retrieving a form field with the expectation that the value is an array
     *
     * An uncaught UserInputException will result in a 400 Invalid Query Parameter response being
     * returned to the user.
     *
     * @throws UserInputException
     * @throws \DomainException If form field does not exist in the request
     * @param string $field
     * @return array
     */
    public function getArrayFormField($field) {
        $value = $this->getFormField($field);

        if (is_array($value)) {
            return $value;
        } else {
            throw new UserInputException(
                sprintf("Wrong form field type (%s) at form field %s", gettype($field), $field)
            );
        }
    }

    /**
     * A convenience method for retrieving a form field with the expectation that the value is a string
     *
     * An uncaught UserInputException will result in a 400 Invalid Query Parameter response being
     * returned to the user.
     *
     * @throws UserInputException
     * @throws \DomainException If form field does not exist in the request
     * @param string $field
     * @return string
     */
    public function getStringFormField($field) {
        $value = $this->getFormField($field);

        if (is_string($value)) {
            return $value;
        } else {
            throw new UserInputException(
                sprintf("Wrong form field type (%s) at form field %s", gettype($field), $field)
            );
        }
    }

    public function getAllFormFields() {
        return $this->form;
    }

    public function hasFormFile($field) {
        return isset($this->files[$field]);
    }

    public function getFormFile($field) {
        if (isset($this->files[$field])) {
            return $this->files[$field];
        } else {
            throw new \DomainException(
                sprintf("Unknown form file: %s", $field)
            );
        }
    }

    public function getAllFormFiles() {
        return $this->files;
    }

    public function hasCookie($field) {
        return isset($this->cookies[$field]);
    }

    public function getCookie($field) {
        if (isset($this->cookies[$field])) {
            return $this->cookies[$field];
        } else {
            throw new \DomainException(
                sprintf("Unknown cookie field: %s", $field)
            );
        }
    }

    public function getAllCookies() {
        return $this->cookies;
    }

    public function hasBody() {
        return isset($this->bodyStream) || $this->body != "";
    }

    public function getBody() {
        if ($this->body != "") {
            $body = $this->body;
        } elseif ($this->bodyStream) {
            $body = $this->bufferBodyStream();
        } else {
            $body = NULL;
        }

        return $body;
    }

    public function getMethod() {
        return $this->method;
    }
    
    private function bufferBodyStream() {
        $bodyStream = $this->copyInputStream();
        $bufferedBody = stream_get_contents($bodyStream);
        rewind($bodyStream);
        $this->bodyStream = $bodyStream;
        $this->body = $bufferedBody;

        return $bufferedBody;
    }

    private function copyInputStream() {
        $tmpPath = sprintf("php://temp/maxmemory:%d", $this->inMemoryBodyStreamSize);
        if (!$tmpStream = fopen($tmpPath, 'w+')) {
            // @codeCoverageIgnoreStart
            throw new \RuntimeException(
                'Failed opening temporary entity body stream'
            );
            // @codeCoverageIgnoreEnd
        }

        stream_copy_to_stream($this->bodyStream, $tmpStream);
        rewind($tmpStream);
        $this->isInputStreamCopied = TRUE;

        return $tmpStream;
    }

    public function getBodyStream() {
        return $this->isInputStreamCopied ? $this->bodyStream : $this->getBody();
    }

    public function set($offset, $value) {
        $this->vars[$offset] = $value;
    }

    public function has($field) {
        return isset($this->vars[$field]);
    }

    public function get($field) {
        if (isset($this->vars[$field])) {
            return $this->vars[$field];
        } else {
            throw new \DomainException(
                sprintf("Unknown request variable: %s", $field)
            );
        }
    }

    public function all() {
        return $this->vars;
    }

    public function isEncrypted() {
        return $this->isEncrypted;
    }

    public function offsetSet($offset, $value) {
        $this->vars[$offset] = $value;
    }

    public function offsetExists($offset) {
        return isset($this->vars[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->vars[$offset]);
    }

    public function offsetGet($offset) {
        if (isset($this->vars[$offset]) || array_key_exists($offset, $this->vars)) {
            return $this->vars[$offset];
        } else {
            throw new \DomainException(
                sprintf("Unknown request variable: %s", $offset)
            );
        }
    }

    public function rewind() {
        reset($this->vars);
    }

    public function current() {
        return current($this->vars);
    }

    public function key() {
        return key($this->vars);
    }

    public function next() {
        return next($this->vars);
    }

    public function valid() {
        $key = key($this->vars);

        return isset($this->vars[$key]) || array_key_exists($key, $this->vars);
    }

}
