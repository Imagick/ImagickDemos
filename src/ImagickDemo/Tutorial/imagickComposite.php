<?php

namespace ImagickDemo\Tutorial;

class imagickComposite extends \ImagickDemo\Example {


    /**
     * @var \Intahwebz\Request
     */
    private $request;

    function __construct(\ImagickDemo\Control $control, \Intahwebz\Request $request) {
        $this->control = $control;
        $this->request = $request;
    }


    function renderDescription() {

        $output = <<< END
This is a simple example of how to cross fade between two images with a pre-computed gradient.
END;
 
        return nl2br($output);
    }

    
    function render() {
        echo "<img src='/images/im/holocaust_tn.gif' /> + ";
        echo "<img src='/images/im/overlap_mask.png' /> + ";
        echo "<img src='/images/im/spiral_stairs_tn.gif' /> => ";

        return $this->renderImageURL();
    }
}