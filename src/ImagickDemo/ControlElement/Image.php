<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

//TODO - rename this to imagePath
class Image implements ControlElement {

    private $imagePath;
    
    private $imageName = 'Lorikeet';

    private $images = [
        "../images/Skyline_400.jpg" => 'Skyline',
        "../images/Biter_500.jpg" => 'Lorikeet',
    ];

    function __construct(Request $request) {//, $imageBaseURL) {
        $this->imageName = $request->getVariable('image', $this->imageName);
        
        foreach ($this->images as $imagePath => $value) {
            if (strcmp($this->imageName, $value) === 0 || $this->imageName == null) {
                $this->imagePath = $imagePath;
            }
        }
        //zendcode eats braces
    }

    /**
     * @return array
     */
    function getParams() {
        return ['image' => $this->imageName];
    }

    /**
     * @return string
     */
    function renderFormElement() {


        $output = "<tr>
                    <td class='standardCell'>Image
                </td>
                <td class='standardCell'>";


        $output .= "<select name='image'>";

        foreach ($this->images as $imagePath => $imageName) {
            $selected = '';
            if (strcmp($imageName, $this->imageName) === 0) {
                $selected = "selected='selected'";
            }
            $output .= "<option value='".$imageName."' $selected>$imageName</option>";
        }

        $output .= "</select>
                    </td>
            </tr>";

        return $output;
    }

    function getImagePath() {
        return $this->imagePath;
    }
}

 