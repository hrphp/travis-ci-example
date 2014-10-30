<?php
/**
 * This file is part of the travis-ci-example package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HelloTest;

use \Hello\HelloWorld;
use \HelloTest\Mock\PDOMock;

class HelloWorldTest extends \PHPUnit_Framework_TestCase
{
    private $helloWorld;

    public function testGetLanguage()
    {
        $language = $this->getHelloWorld()->getLanguage();
        $expectedType = '\Hello\Language\LanguageInterface';
        $this->assertInstanceOf($expectedType, $language);
    }

    public function testGreet()
    {
        $expectedValue = '<pre>Hello, World!</pre>';
        $this->assertSame($expectedValue, $this->getHelloWorld()->greet());
    }

    protected function setUp()
    {
        $language = $this->getMock('\Hello\Language\English', ['getGreeting'], [new PDOMock()]);
        $language->expects($this->any())
            ->method('getGreeting')
            ->will($this->returnValue('Hello, World!'));
        $this->helloWorld = new HelloWorld($language);
    }

    protected function getHelloWorld()
    {
        return $this->helloWorld;
    }
}
