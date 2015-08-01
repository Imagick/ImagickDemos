<?php

namespace Arya;

class Response implements \ArrayAccess {

    private $status = 200;
    private $reasonPhrase = '';
    private $headers = [];
    private $ucHeaders = [];
    private $cookies = [];
    private $body;
    private $asgiMap = [];
    private $cookieOptions = [
        'expire' => 0,
        'path' => '',
        'domain' => '',
        'secure' => FALSE,
        'httponly' => FALSE
    ];

    public function __construct(array $map = []) {
        foreach ($map as $key => $value) {
            $this->offsetSet($key, $value);
        }
    }

    /**
     * Assign the response status code (default: 200)
     *
     * @param int $statusCode
     * @throws \InvalidArgumentException
     * @return Response Returns the current object instance
     */
    public function setStatus($statusCode) {
        $statusCode = @intval($statusCode);

        if ($statusCode < 100 || $statusCode > 599) {
            throw new \InvalidArgumentException(
                'Invalid response status code'
            );
        } else {
            $this->status = $statusCode;
        }

        return $this;
    }

    /**
     * Assign an optional reason phrase (e.g. Not Found) to accompany the status code
     *
     * @param string $reasonPhrase
     * @throws \InvalidArgumentException
     * @return Response Returns the current object instance
     */
    public function setReasonPhrase($reasonPhrase) {
        if (is_string($reasonPhrase)) {
            $this->reasonPhrase = $reasonPhrase;
        } else {
            throw new \InvalidArgumentException(
                sprintf('Reason phrase must be a string; %s provided', gettype($reasonPhrase))
            );
        }

        return $this;
    }

    /**
     * Set multiple headers from a key-value array
     *
     * Existing values matching the specified field are replaced.
     * Header field names are NOT case-sensitive.
     *
     * @param array
     * @throws \InvalidArgumentException
     * @return Response Returns the current object instance
     */
    public function setAllHeaders(array $headerArray) {
        foreach ($headerArray as $field => $value) {
            $this->setHeader($field, $value);
        }

        return $this;
    }

    /**
     * Assign a header value
     *
     * Existing values matching the specified field are replaced.
     * Header field names are NOT case-sensitive.
     *
     * @param string $field
     * @param string $value
     * @throws \InvalidArgumentException
     * @return Response Returns the current object instance
     */
    public function setHeader($field, $value) {
        if (!$field = @trim($field)) {
            throw new \InvalidArgumentException(
                'Non-empty string field name required at Argument 1'
            );
        }

        $ucField = strtoupper($field);

        if ($ucField === 'SET-COOKIE') {
            $this->setCookieFromRawHeaderValue($value);

            return $this;
        } elseif (is_scalar($value) || is_null($value)) {
            $value = [(string) $value];
        } elseif (!(is_array($value) && $this->isValidArrayHeader($value))) {
            throw new \InvalidArgumentException(
                'Invalid header; scalar or one-dimensional array of scalars required'
            );
        }

        if (isset($this->ucHeaders[$ucField])) {
            // There's already a case-insensitive match for this field name. Reuse the
            // existing case mapping.
            $field = $this->ucHeaders[$ucField];
        }

        $this->headers[$field] = $value;
        $this->ucHeaders[$ucField] = $field;

        return $this;
    }

    private function isValidArrayHeader(array $headerValues) {
        foreach ($headerValues as $value) {
            if (!is_scalar($value)) {
                return FALSE;
            }
        }

        return TRUE;
    }

    private function setCookieFromRawHeaderValue($rawCookieStr) {
        if (!$rawCookieStr) {
            throw new \InvalidArgumentException(
                'Invalid cookie string'
            );
        }

        $parts = explode(';', trim($rawCookieStr));
        $nvPair = array_shift($parts);

        if (strpos($nvPair, '=') === FALSE) {
            throw new \InvalidArgumentException;
        }

        list($name, $value) = explode('=', $nvPair, 2);

        $attrStruct = $this->cookieOptions;

        foreach ($parts as $part) {
            $part = trim($part);
            if (0 === stripos($part, 'secure')) {
                $attrStruct['secure'] = TRUE;
                continue;
            } elseif (0 === stripos($part, 'httponly')) {
                $attrStruct['httponly'] = TRUE;
                continue;
            } elseif (strpos($part, '=') === FALSE) {
                throw new \InvalidArgumentException(
                    'Invalid cookie string: ' . $part
                );
            }

            list($attr, $attrValue) = explode('=', $part, 2);

            $attr = strtolower($attr);
            if (isset($attrStruct[$attr])) {
                $attrStruct[$attr] = trim($attrValue, "\"\t\n\r\0\x0B\x20");
            }
        }

        $attrStruct['httponly'] = !empty($attrStruct['httponly']);
        $attrStruct['secure'] = !empty($attrStruct['secure']);

        $this->assignCookieHeader($name, $value, $attrStruct, $rawFlag = TRUE);
    }

    /**
     * Assign multiple raw header lines at once
     *
     * @param array<string> An array of header lines of the form "My-Header: some value"
     * @throws \InvalidArgumentException
     * @return Response Returns the current object instance
     */
    public function setAllHeaderLines(array $lines) {
        foreach ($lines as $line) {
            $this->setHeaderLine($line);
        }

        return $this;
    }

    /**
     * Assign a raw header line of the form "Some-Header-Field: my value"
     *
     * Existing values matching the header line's field are replaced by the new value.
     * Header field names are NOT case-sensitive.
     *
     * @param string $line
     * @throws \InvalidArgumentException
     * @return Response Returns the current object instance
     */
    public function setHeaderLine($line) {
        list($field, $value) = $this->splitHeaderLine($line);
        $this->setHeader($field, $value);

        return $this;
    }

    /**
     * Append multiple raw header lines of the form "Some-Header-Field: my value"
     *
     * @param array $lines
     * @throws \InvalidArgumentException
     * @return Response Returns the current object instance
     */
    public function addAllHeaderLines(array $lines) {
        foreach ($lines as $line) {
            $this->addHeaderLine($line);
        }

        return $this;
    }

    /**
     * Appends a raw header line of the form "Some-Header-Field: my value"
     *
     * The header's value is appended to existing headers with the same field name.
     * Header field names are NOT case-sensitive.
     *
     * @param string $line
     * @throws \InvalidArgumentException
     * @return Response Returns the current object instance
     */
    public function addHeaderLine($line) {
        list($field, $value) = $this->splitHeaderLine($line);
        $this->addHeader($field, $value);

        return $this;
    }

    private function splitHeaderLine($line) {
        $fieldEndPosition = strpos($line, ':');
        if (!$fieldEndPosition) {
            throw new \DomainException(
                'Header line must match the format "Field-Name: value"'
            );
        }

        $field = trim(substr($line, 0, $fieldEndPosition));
        if (empty($field)) {
            throw new \DomainException(
                'Invalid header field'
            );
        }

        $value = ltrim(substr($line, $fieldEndPosition + 1));

        return [$field, $value];
    }

    /**
     * Append a header value
     *
     * The header value is appended to existing fields with the same name.
     * Header field names are NOT case-sensitive.
     *
     * @param string $field
     * @param string $value
     * @throws \InvalidArgumentException
     * @return Response Returns the current object instance
     */
    public function addHeader($field, $value) {
        if ($this->hasHeader($field)) {
            $existing = $this->getHeader($field);
            $existing = is_array($existing) ? $existing : [$existing];
            $value = is_scalar($value) ? [$value] : $value;
            $newHeaders = array_merge($existing, $value);
            $this->setHeader($field, $newHeaders);
        } else {
            $this->setHeader($field, $value);
        }

        return $this;
    }

    /**
     * Does the response currently have a value for the specified header field?
     *
     * Header field names are NOT case-sensitive.
     *
     * @param string $field
     * @return bool
     */
    public function hasHeader($field) {
        $ucField = strtoupper($field);

        return isset($this->ucHeaders[$ucField]) || ($ucField === 'SET-COOKIE' && $this->cookies);
    }

    /**
     * Removes assigned headers for the specified field
     *
     * Header field names are NOT case-sensitive.
     *
     * @param string $field
     * @return Response Returns the current object instance
     */
    public function removeHeader($field) {
        $ucField = strtoupper($field);

        if ($ucField === 'SET-COOKIE') {
            $this->cookies = [];
        } elseif (isset($this->ucHeaders[$ucField])) {
            $field = $this->ucHeaders[$ucField];
            unset(
                $this->ucHeaders[$ucField],
                $this->headers[$field]
            );
        }

        return $this;
    }

    /**
     * Removes all assigned headers
     *
     * @return Response Returns the current object instance
     */
    public function removeAllHeaders() {
        $this->headers = [];
        $this->ucHeaders = [];
        $this->cookies = [];

        return $this;
    }

    /**
     * Set a cookie value to be sent with the response.
     *
     * Cookie values will be available upon the client's next request. Extended cookie options
     * beyond the name-value pair may be specified using individual keys in the $options array:
     *
     *     [
     *         'expire' => 0,       // Expiration time (unix timestamp) for this cookie
     *         'path' => '',        // The server path on which the cookie will be available
     *         'domain' => '',      // The domain on which the cookie will be available
     *         'secure' => FALSE,   // Indicates the cookie should only be sent via HTTPS
     *         'httponly' => FALSE  // When TRUE the cookie is only available via the HTTP protocol
     *     ];
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return Response Returns the current object instance
     */
    public function setCookie($name, $value = '', array $options = []) {
        $value = urlencode($value);
        $this->assignCookieHeader($name, $value, $options);

        return $this;
    }

    /**
     * Same as Response::setCookie except that the cookie value will not be automatically urlencoded
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return Response Returns the current object instance
     */
    public function setRawCookie($name, $value = '', array $options = []) {
        $this->assignCookieHeader($name, $value, $options);

        return $this;
    }

    private function assignCookieHeader($name, $value, array $options) {
        $options = array_intersect_key($options, $this->cookieOptions);
        $options = array_merge($this->cookieOptions, $options);
        extract($options);

        $header = "{$name}={$value}";

        if ($expire) {
            $header .= "; Expires={$expire}";
        }
        if ($path) {
            $header .= "; Path={$path}";
        }
        if ($domain) {
            $header .= "; Domain={$domain}";
        }
        if ($secure) {
            $header .= "; Secure";
        }
        if ($httponly) {
            $header .= "; HttpOnly";
        }

        $this->cookies[$name] = $header;
    }

    /**
     * Has a cookie with this name been assigned to the response?
     *
     * @param string $name
     * @return bool
     */
    public function hasCookie($name) {
        return isset($this->cookies[$name]);
    }

    /**
     * Remove an assigned cookie matching the specified name
     *
     * @param string $name
     * @return Response Returns the current object instance
     */
    public function removeCookie($name) {
        unset($this->cookies[$name]);

        return $this;
    }

    /**
     * Get the status code for this response
     *
     * @return int
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Get the assigned reason phrase for this response
     *
     * @return string
     */
    public function getReasonPhrase() {
        return $this->reasonPhrase;
    }

    /**
     * Retrieve assigned header values for the specified field
     *
     * If only one value is assigned for the specified field, that scalar value is returned. If
     * multiple values are assigned for the field an array of scalars is returned.
     *
     * @param string $field
     * @throws \DomainException
     * @return string|array
     */
    public function getHeader($field) {
        $ucField = strtoupper($field);

        if ($ucField === 'SET-COOKIE' && $this->cookies) {
            $result = array_values($this->cookies);
        } elseif (isset($this->ucHeaders[$ucField])) {
            $field = $this->ucHeaders[$ucField];
            $result = $this->headers[$field];
        } else {
            throw new \DomainException(
                sprintf('Header field is not assigned: %s', $field)
            );
        }

        return isset($result[1]) ? $result : $result[0];
    }

    /**
     * Assign a response entity body
     *
     * @param null|string|callable|Body $body
     * @throws \InvalidArgumentException
     * @return Response Returns the current object instance
     */
    public function setBody($body) {
        if (is_string($body) || is_null($body)) {
            $this->body = $body;
        } elseif ($body instanceof Body) {
            $this->body = $body;
            $this->setAllHeaders($body->getHeaders());
        } elseif (is_callable($body)) {
            $this->body = $body;
        } else {
            throw new \InvalidArgumentException(
                sprintf('Body must be a string or valid callable; %s provided', gettype($body))
            );
        }

        return $this;
    }

    /**
     * Retrieve an array mapping header field names to their assigned values
     *
     * @return array
     */
    public function getAllHeaders() {
        $headers = $this->headers;
        if ($this->cookies) {
            $headers['Set-Cookie'] = array_values($this->cookies);
        }

        return $headers;
    }

    /**
     * Retrieve an array of header strings appropriate for output
     *
     * @return array
     */
    public function getAllHeaderLines() {
        $headers = [];
        foreach ($this->getAllHeaders() as $field => $valueArray) {
            foreach ($valueArray as $value) {
                $headers[] = "{$field}: $value";
            }
        }

        return $headers;
    }

    /**
     * Retrieve the entity body assigned for this response
     *
     * @return void|string|callable
     */
    public function getBody() {
        return $this->body;
    }

    /**
     * Is an entity body assigned for this response?
     *
     * @return bool
     */
    public function hasBody() {
        return isset($this->body);
    }

    /**
     * Import values from external Response instance
     *
     * Calling import() will clear all previously assigned values before assigning those from the
     * new Response instance.
     *
     * @param \Arya\Response $response
     * @return Response Returns the current object instance
     */
    public function import(Response $response) {
        $this->clear();
        foreach ($response->toArray() as $key => $value) {
            $this->offsetSet($key, $value);
        }

        return $this;
    }

    /**
     *
     */
    public function importArray(array $response) {
        $this->clear();
        foreach ($response as $key => $value) {
            $this->offsetSet($key, $value);
        }

        return $this;
    }

    /**
     *
     */
    public function toArray() {
        return array_merge([
            'status' => $this->status,
            'reason' => $this->reasonPhrase,
            'headers' => $this->getAllHeaderLines(),
            'body' => $this->body
        ], $this->asgiMap);
    }

    /**
     * Remove all assigned values and reset defaults
     *
     * @return Response Returns the current object instance
     */
    public function clear() {
        $this->status = 200;
        $this->reasonPhrase = '';
        $this->headers = [];
        $this->ucHeaders = [];
        $this->cookies = [];
        $this->body = NULL;
        $this->asgiMap = [];

        return $this;
    }

    public function offsetSet($offset, $value) {
        switch ($offset) {
            case 'status':
                $this->setStatus($value);
                break;
            case 'reason':
                $this->setReasonPhrase($value);
                break;
            case 'headers':
                $this->addAllHeaderLines($value);
                break;
            case 'body':
                $this->setBody($value);
                break;
            default:
                $this->asgiMap[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        switch ($offset) {
            case 'status': // fallthrough on purpose
            case 'reason': // fallthrough on purpose
            case 'headers': // fallthrough on purpose
            case 'body':
                $exists = TRUE;
                break;
            default:
                $exists = isset($this->asgiMap[$offset]);
        }

        return $exists;
    }

    public function offsetUnset($offset) {
        switch ($offset) {
            case 'status':
                $this->status = 200;
                break;
            case 'reason':
                $this->reasonPhrase = '';
                break;
            case 'headers':
                $this->headers = [];
                break;
            case 'body':
                $this->body = NULL;
                break;
            default:
                unset($this->asgiMap[$offset]);
        }
    }

    public function offsetGet($offset) {
        switch ($offset) {
            case 'status':
                $value = $this->status;
                break;
            case 'reason':
                $value = $this->reasonPhrase;
                break;
            case 'headers':
                $value = $this->headers ? $this->getAllHeaderLines() : $this->headers;
                break;
            case 'body':
                $value = $this->body;
                break;
            default:
                if (isset($this->asgiMap[$offset]) || array_key_exists($offset, $this->asgiMap)) {
                    $value = $this->asgiMap[$offset];
                } else {
                    throw new \DomainException(
                        sprintf("Unknown request variable: %s", $offset)
                    );
                }
        }

        return $value;
    }

}
