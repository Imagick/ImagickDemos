<?php

namespace Arya;

class ChunkedFileBody extends FileBody {

    private $chunkSize;

    public function __construct($path, $chunkSize = 8192) {
        parent::__construct($path);
        $this->chunkSize = @intval($chunkSize) ?: 8192;
    }

    public function send() {
        $path = $this->getPath();
        if (!$fh = @fopen($path, 'r')) {
            throw new \RuntimeException(
                sprintf("Failed opening file path: %s", $path)
            );
        }

        while (!feof($fh)) {
            echo fread($fh, $this->chunkSize);
            ob_flush();
            flush();
        }
    }

}
