<?php


namespace ImagickDemo;


interface renderableExample {
    function renderTitle();
    function render();
    function renderCodeLink();
}

abstract class Example implements renderableExample {

    protected $control;

    function __construct(\ImagickDemo\Control $control) {
        $this->control = $control;
    }

    function renderTitle() {
        return getClassName(get_class($this));
    }

    function renderImageURL() {
        return sprintf("<img src='%s' />", $this->control->getURL());
    }

    function renderCodeLink() {
        //TODO - this is the wrong link.
        $classname = get_class($this);
        $classname = str_replace('\\', '/', $classname);
        $url = "https://github.com/Danack/Imagick-demos/blob/master/src/".$classname.".php";

        return "<a href='$url' target='_blank'>Source code on Github</a>";
    }
}

 