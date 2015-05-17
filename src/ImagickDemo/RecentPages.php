<?php


namespace ImagickDemo;

use ASM\Session;

class RecentPages {

    /**
     * @var Session
     */
    private $session;
    
    function __construct(Session $session)
    {
        $this->session = $session;
    }

    function log($uri)
    {
        $sessionData = &$this->session->getData();
        $sessionData['uris'][] = $uri;
        $numberURIs = count($sessionData['uris']);
        if ($numberURIs > 5) {
            $sessionData['uris'] = array_slice(
                $sessionData['uris'],
                $numberURIs - 5,
                5
            );
        }
    }

    function display()
    {
        $sessionData = $this->session->getData();
        if (isset($sessionData['uris']) && is_array($sessionData['uris'])) {
            echo "<ul>";
            foreach ($sessionData['uris'] as $uri) {
                echo "<li>".$uri."</li>";
            }
            echo "</ul>";
        }
        else {
            echo "No previous uris";
        }
    }
}

