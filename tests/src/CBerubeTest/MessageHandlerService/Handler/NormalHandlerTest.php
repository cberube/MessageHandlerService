<?php

namespace CBerubeTest\MessageHandlerService\Handler;

use CBerube\MessageHandlerService\Handler\Normal;

class NormalHandlerTest extends \PHPUnit_Framework_TestCase
{
    /** @var Normal */
    private $handler;

    public function setUp()
    {
        $this->handler = new Normal();
    }

    public function testGetFormatter()
    {
        $this->assertInstanceOf(
            '\\CBerube\\MessageHandlerService\\Formatter\\Normal',
            $this->handler->getFormatter()
        );
    }

    public function testGetProcessorList()
    {
        $expectedProcessorTypeList = array(
            '\\CBerube\\MessageHandlerService\\Processor\\Sender\\File'
        );

        $actualProcessorList = $this->handler->getProcessorList();

        $this->assertCount(count($expectedProcessorTypeList), $actualProcessorList);

        foreach ($expectedProcessorTypeList as $index => $type) {
            $this->assertInstanceOf($type, $actualProcessorList[$index]);
        }
    }
}
