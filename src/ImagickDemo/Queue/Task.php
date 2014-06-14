<?php

namespace ImagickDemo\Queue;


interface Task {
    function serialize();
    static function unserialize($foo);
    function execute(\Auryn\Provider $injector);
}
