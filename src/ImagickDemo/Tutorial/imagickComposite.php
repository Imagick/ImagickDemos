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

        $imageURL = $this->renderImageURL();
        
        $output = <<< END
<div class='row'>
    <div class='col-md-12'>
        <h4>Input images</h4>
    </div>
</div>        
<div class='row'>
    <div class='col-md-4'>
        <img src='/images/im/holocaust_tn.gif' />
    </div>
    <div class='col-md-4'>
        <img src='/images/im/overlap_mask.png' />
    </div>
    <div class='col-md-4'>
        <img src='/images/im/spiral_stairs_tn.gif' />
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
    <h4>Output image</h4>
    </div>
</div>        
    
<div class='row'>
    <div class='col-md-12'>$imageURL</div>
</div>    
        
END;

        return $output;
    }
}