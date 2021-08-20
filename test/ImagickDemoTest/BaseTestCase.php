<?php

declare(strict_types = 1);

namespace ImagickDemoTest;

use PHPUnit\Framework\TestCase;
use Auryn\Injector;

/**
 * Class TestBase
 *
 * Allows checking that no code has output characters, or left the output buffer in a bad state.
 * @coversNothing
 */
class BaseTestCase extends TestCase
{
    private $startLevel = null;

    private Injector $injector;

    public function setup(): void
    {
        $this->startLevel = ob_get_level();
        ob_start();
//        $this->injector = createInjector();
    }

    public function teardown(): void
    {
        if ($this->startLevel === null) {
            $this->assertEquals(0, 1, "startLevel was not set, cannot complete teardown");
        }
        $contents = ob_get_contents();
        ob_end_clean();

        $endLevel = ob_get_level();
        $this->assertEquals($endLevel, $this->startLevel, "Mismatched ob_start/ob_end calls....somewhere");
        $this->assertEquals(
            0,
            strlen($contents),
            "Something has directly output to the screen: [".substr($contents, 0, 50)."]"
        );
        
        $headerList = headers_list();
        if (count($headerList)) {
            $this->fail("Something has sent headers directly: ".var_export($headerList, true));
//            header_remove();
        }
    }

    public function testPHPUnitApparentlyGetsConfused(): void
    {
        //Basically despite having:
        //<exclude>*/BaseTestCase.php</exclude>
        //in the phpunit.xml file it still thinks this file is a test class.
    }

    /**
     * @template T of Foo
     * @param class-string<T> $class
     * @return T
     */
    public function make(string $class)
    {
        return $this->injector->make($class);
    }
}
