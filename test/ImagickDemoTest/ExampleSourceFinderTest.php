<?php

declare(strict_types = 1);

namespace ImagickDemoTest;

use ImagickDemo\ExampleSourceFinder;

class ExampleSourceFinderTest extends BaseTestCase
{
    public function testWorks()
    {
        $exampleFinder = new ExampleSourceFinder();

        $codeExamples = $exampleFinder->findExamples('Imagick', 'adaptiveBlurImage');

        $this->assertCount(1, $codeExamples);
    }
}
