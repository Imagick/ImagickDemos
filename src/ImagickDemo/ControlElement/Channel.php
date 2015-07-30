<?php

namespace ImagickDemo\ControlElement;

class Channel extends OptionKeyElement
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
        return 'Channel';
    }

    protected function getOptions()
    {
        $options = [
            \Imagick::CHANNEL_RED => 'Red',
            //\Imagick::CHANNEL_GRAY      => 'Gray',
            //\Imagick::CHANNEL_CYAN      => 'Cyan',
            \Imagick::CHANNEL_GREEN => 'Green',
            //\Imagick::CHANNEL_MAGENTA   => 'Magenta',
            \Imagick::CHANNEL_BLUE => 'Blue',
            //\Imagick::CHANNEL_YELLOW    => 'Yellow',
            \Imagick::CHANNEL_ALPHA => 'Alpha',
            //\Imagick::CHANNEL_OPACITY   => 'Opacity',
            //\Imagick::CHANNEL_MATTE     => 'Matte',
            //\Imagick::CHANNEL_BLACK     => 'Black',
            //\Imagick::CHANNEL_INDEX     => 'Index',
            \Imagick::CHANNEL_ALL => 'All',
            //\Imagick::CHANNEL_DEFAULT   => 'Default',
        ];

        return $options;
    }

    public function getChannel()
    {
        return $this->getKey();
    }
}
