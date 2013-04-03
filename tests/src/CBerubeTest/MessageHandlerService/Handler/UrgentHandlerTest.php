<?php

namespace CBerubeTest\MessageHandlerService\Handler;

use CBerube\MessageHandlerService\Handler\Urgent;

class UrgentHandlerTest extends \PHPUnit_Framework_TestCase
{
    /** @var \CBerube\MessageHandlerService\Handler\Urgent */
    private $handler;

    public function setUp()
    {
        $this->handler = new Urgent();
    }

    public function testGetFormatter()
    {
        $this->assertInstanceOf(
            '\\CBerube\\MessageHandlerService\\Formatter\\Urgent',
            $this->handler->getFormatter()
        );
    }

    public function testGetProcessorList()
    {
        $expectedProcessorTypeList = array(
            '\\CBerube\\MessageHandlerService\\Processor\\Encryptor\\DES',
            '\\CBerube\\MessageHandlerService\\Processor\\Compressor\\GZip',
            '\\CBerube\\MessageHandlerService\\Processor\\Sender\\TcpIp'
        );

        $actualProcessorList = $this->handler->getProcessorList();

        $this->assertCount(count($expectedProcessorTypeList), $actualProcessorList);

        foreach ($expectedProcessorTypeList as $index => $type) {
            $this->assertInstanceOf($type, $actualProcessorList[$index]);
        }
    }
}
