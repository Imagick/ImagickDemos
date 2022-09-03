<?php

declare(strict_types = 1);

namespace ImagickDemoTest;

use ImagickDemo\ExampleExtractor;
use ImagickDemo\CodeExample;

class ExampleExtractorTest extends BaseTestCase
{
    public function testWorks()
    {
        $category = 'Imagick';
        $example = 'setImageMatte';
        $code = <<< 'CODE'
//Example Imagick::setImageMatte
function setImageMatte($alpha_type, $matte_enabled)
{
    // code goes here
}
//Example end
CODE;

        $lines = explode("\n", $code);
        $exampleExtractor = new ExampleExtractor(
            $lines,
            $category,
            $example
        );

        $codeExample = $exampleExtractor->getNextExample();

        $this->assertInstanceOf(CodeExample::class, $codeExample);
        $this->assertCount(4, $codeExample->lines);
        $this->assertSame('setImageMatte', $codeExample->function);
    }

    public function testGetsTwoExamples()
    {
        $category = 'Imagick';
        $example = 'distortImage';
        $code = <<< 'CODE'
    public function renderImageAffine()
    {
//Example Imagick::distortImage Affine
        // code goes here
//Example end
    }

    public function renderImageAffineProjection()
    {
//Example Imagick::distortImage Projection
        // code goes here
//Example end
    }
CODE;

        $lines = explode("\n", $code);
        $exampleExtractor = new ExampleExtractor(
            $lines,
            $category,
            $example
        );

        $codeExamples = $exampleExtractor->getAllCodeExamples();
        $this->assertCount(2, $codeExamples);

        $this->assertSame("Affine", $codeExamples[0]->description);
        $this->assertSame("Projection", $codeExamples[1]->description);
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function testDoesntPickupDifferentName()
    {
        $code = <<< 'CODE'
//Example Imagick::setImageMatteColour
function setImageMatte($alpha_type, $matte_enabled)
{
    // code goes here
}
//Example end
CODE;

        $lines = explode("\n", $code);
        $exampleExtractor = new ExampleExtractor(
            $lines,
            'Imagick',
            'setImageMatte'
        );

        $codeExample = $exampleExtractor->getNextExample();

        $this->assertNull($codeExample);
    }
}
