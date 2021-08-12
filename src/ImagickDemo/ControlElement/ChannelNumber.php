<?php

namespace ImagickDemo\ControlElement;

class ChannelNumber extends OptionKeyElement
{
    //Whoa
//RedChannel = 0x0001,
//GrayChannel = 0x0001,
//CyanChannel = 0x0001,

//GreenChannel = 0x0002,
//MagentaChannel = 0x0002,

//BlueChannel = 0x0004,
//YellowChannel = 0x0004,

//AlphaChannel = 0x0008,
//OpacityChannel = 0x0008,
//MatteChannel = 0x0008,     /* deprecated */
//BlackChannel = 0x0020,
//IndexChannel = 0x0020,
//CompositeChannels = 0x002F,
//AllChannels = 0x7ffffff,
//    /*
//    Special purpose channel types.
//    */
//TrueAlphaChannel = 0x0040, /* extract actual alpha channel from opacity */
//RGBChannels = 0x0080,      /* set alpha from  grayscale mask in RGB */
//GrayChannels = 0x0080,
//SyncChannels = 0x0100,     /* channels should be modified equally */
//DefaultChannels = ((AllChannels | SyncChannels) &~ OpacityChannel)
//    

    protected function getDefault()
    {
        return \Imagick::CHANNEL_ALL;
    }

    protected function getVariableName()
    {
        return 'channel';
    }

    protected function getDisplayName()
    {
        return 'Channel no.';
    }

    protected function getOptions()
    {
        $options = [
            \Imagick::CHANNEL_RED => '1',
            \Imagick::CHANNEL_GREEN => '2',
            \Imagick::CHANNEL_BLUE => '3',
            \Imagick::CHANNEL_ALPHA => 'Alpha',
            \Imagick::CHANNEL_BLACK => 'Black',
        ];

        return $options;
    }

    public function getChannel()
    {
        return $this->getKey();
    }
}
