
## Imagick-demos

An example of all the Imagick functions. Or at least most of them. The site is hosted at http://phpimagick.com/

The site uses Docker. If you have that on your system, you should be able to run the site locally with:

```
sh runLocal.sh
```

The site will be available at the domains:

http://local.phpimagick.com - default version of ImageMagick (currently 7).

http://local.im6.phpimagick.com - explicitly use ImageMagick 6

http://local.im7.phpimagick.com - explicitly use ImageMagick 7

It will take a few minutes (or more) to come up, as it has to compile ImageMagick 6 and 7, and then Imagick. After the first run, these are cached, so should only take a few seconds.

The site is built against the master branch of Imagick at https://github.com/imagick/imagick . As it takes a long time, by default it doesn't rebuild from scratch each time. To force a rebuild against the latest version of Imagick

```
runRebuildLocal.sh
```

containers/imagick_php_base_im7/install_imagemagick.sh
containers/imagick_php_base_im6/install_imagemagick.sh


## Adding examples

There is a list of which examples still need to be added at [phpimagick.com/todo](https://phpimagick.com/todo).

Here are some instructions on adding examples.

### Text example

A text example, is an example that has text as it's output, rather than an image. A complete example for Imagick::getImageMimeType [was added in this commit](https://github.com/Imagick/ImagickDemos/commit/9df6cef1051ab6fa90d1bf834a23d083bdf5ab79).

The steps involved are:

1. Add the example to appropriate list in src/example_list.php

All of the examples are listed in one of getImagickExamples(), getImagickDrawExamples(), getImagickKernelExamples(), getImagickPixelExamples(), getImagickPixelIteratorExamples(), getTutorialExamples().

For each entry in the array, the key is the example name and value is the example controller and example function name. Although most of the time these are the same some examples re-use a controller + function, as there isn't much point duplicating code. e.g. for ImagickDraw 'popClipPath' => 'setClipPath',

2. Create a controller

The controller should be in one of the Imagick, ImagickDraw, ImagickKernel, ImagickPixel, ImagickPixelIterator or Tutorial directories under src/ImagickDemo

Usually copying an existing one is a good idea.

The render method of the controller should return a string that demonstrates the result of using the function.

3. Mark the example code with a comment with the exact spelling like:

```
//Example Imagick::getImageMimeType
    $imagick = new \Imagick($this->imageControl->getImagePath());

    $output = 'Imagick::getImageMimeType result is: ';
    $output .= $imagick->getImageMimeType();

    return $output;
//Example end
```

This makes the example code be picked up and shown on the webpage.


### Standard image example

A standard image example, is an example that has an image as it's output, where the image is produced by a single simple function. A complete example for Imagick::swirlImageWithMethod [was added in this commit](https://github.com/Imagick/ImagickDemos/commit/e8fe53b5934560779b2b6e0c7404d50aafc39298).


The steps involved are:

1. Add the example to appropriate list in src/example_list.php

All of the examples are listed in one of getImagickExamples(), getImagickDrawExamples(), getImagickKernelExamples(), getImagickPixelExamples(), getImagickPixelIteratorExamples(), getTutorialExamples().

For each entry in the array, the key is the example name and value is the example controller and example function name. Although most of the time these are the same some examples re-use a controller + function, as there isn't much point duplicating code. e.g. for ImagickDraw 'popClipPath' => 'setClipPath',

2. Create a controller

Usually copying an existing one is a good idea.

```
class swirlImageWithMethod extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::swirlImageWithMethod";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return SwirlImageWithMethodControl::class;
    }
}
```

If the image produced is the same size as the source image, then overloading the useImageControlAsOriginalImage method to return true, will make it possible to hover over the final/original image to compare the two.

3. Add example code to `src/ImagickDemo/Imagick/functions.php`

The name of the function should be the same name as the controller.

```
//Example Imagick::swirlImageWithMethod
function swirlImageWithMethod($image_path, $swirl, int $interpolate_method)
{
    $imagick = new \Imagick(realpath($image_path));
    $imagick->swirlImageWithMethod($swirl, $interpolate_method);
    header("Content-Type: image/jpeg");
    echo $imagick->getImageBlob();
}
//Example end
```

4. If necessary create a new example control class.

The getControlType method of the controller, says which control to use.

```
class SwirlImageWithMethodControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Swirl('swirl')]
        private string $swirl,
        #[InterpolateType('interpolate_method')]
        private int $interpolate_method,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'swirl' => $this->swirl,
            'interpolate_method' => getOptionFromOptions($this->interpolate_method, getInterpolateOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}
```

The keys in the array returned by `SwirlImageWithMethodControl::getValuesForForm` should match the parameter names for the function that produces the image.


### Bespoke image example

TODO - write words...