<?php

namespace Arya;

interface Body {

    /**
     * Responsible for outputting entity body data to STDOUT
     */
    public function __invoke();

    /**
     * Return an optional array of headers to be sent prior to entity body output
     */
    public function getHeaders();

}
