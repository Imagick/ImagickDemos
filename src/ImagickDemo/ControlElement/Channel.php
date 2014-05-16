<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class Channel implements ControlElement {

    private $channelValue;
    
    private $channelName = 'Default';
    
    const name = 'channel'; 

    private $channels = [
        \Imagick::CHANNEL_RED       => 'Red',
        \Imagick::CHANNEL_GRAY      => 'Gray',
        \Imagick::CHANNEL_CYAN      => 'Cyan',
        \Imagick::CHANNEL_GREEN     => 'Green',
        \Imagick::CHANNEL_MAGENTA   => 'Magenta',
        \Imagick::CHANNEL_BLUE      => 'Blue',
        \Imagick::CHANNEL_YELLOW    => 'Yellow',
        \Imagick::CHANNEL_ALPHA     => 'Alpha',
        \Imagick::CHANNEL_OPACITY   => 'Opacity',
        \Imagick::CHANNEL_MATTE     => 'Matte',
        \Imagick::CHANNEL_BLACK     => 'Black',
        \Imagick::CHANNEL_INDEX     => 'Index',
        \Imagick::CHANNEL_ALL       => 'All',
        \Imagick::CHANNEL_DEFAULT   => 'Default',
    ];

    function __construct(Request $request) {
        $this->channelName = $request->getVariable(self::name, $this->channelName);

        foreach ($this->channels as $channelValue => $channelName) {
            if (strcmp($this->channelName, $channelName) === 0 || $this->channelName == null) {
                $this->channelValue = $channelValue;
            }
        }
        //zendcode eats braces
    }

    /**
     * @return array
     */
    function getParams() {
        return [self::name => $this->channelName];
    }

    /**
     * @return string
     */
    function renderFormElement() {

        $output = "<tr>
                    <td class='standardCell'>Channel
                </td>
                <td class='standardCell'>";


        $output .= "<select name='".self::name."'>";

        foreach ($this->channels as $imagePath => $imageName) {
            $selected = '';
            if (strcmp($imageName, $this->channelName) === 0) {
                $selected = "selected='selected'";
            }
            $output .= "<option value='".$imageName."' $selected>$imageName</option>";
        }

        $output .= "</select>
                    </td>
            </tr>";

        return $output;
    }

    function getChannelValue() {
        return $this->channelValue;
    }
}

 