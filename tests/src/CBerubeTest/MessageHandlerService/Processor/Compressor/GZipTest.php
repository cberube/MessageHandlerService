<?php

namespace CBerubeTest\MessageHandlerService\Processor\Compressor;

use CBerube\MessageHandlerService\Processor\Compressor\GZip;

class GZipTest extends \PHPUnit_Framework_TestCase
{
    public function testProcess()
    {
        $message = sha1(mt_rand());

        $expectedResult = gzcompress($message);

        $compressor = new GZip();
        $actualResult = $compressor->process($message);

        $this->assertEquals($expectedResult, $actualResult);
    }
}
