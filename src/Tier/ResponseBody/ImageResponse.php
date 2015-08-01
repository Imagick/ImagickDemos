<?php

namespace Tier\ResponseBody;

use Arya\Body;

class ImageResponse implements Body
{
    private $mimeType;
    private $data;

    public function __construct($filename, $mimeType, $data)
    {
        $this->mimeType = $mimeType;
        $this->data = $data;
        $this->filename = $filename;
    }
    
    public function __invoke()
    {
        echo $this->data;
    }

    /**
     * Return an optional array of headers to be sent prior to entity body output
     */
    public function getHeaders()
    {
        $headers = [];
        
        if ($this->mimeType) {
            $headers['Content-Type'] = $this->mimeType;
        }
        
        $headers['Content-Length'] = strlen($this->data);
        
        // TODO - this is not safe, needs to be encode by the appropriate
        // rfc scheme
        
        $headers["Content-Disposition:"] =" filename=".$this->filename;
        
        return $headers;
    }
}
