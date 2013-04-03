<?php

namespace CBerubeTest\MessageHandlerService\Processor\Sender;

use CBerube\MessageHandlerService\Processor\Sender\File;

class FileTest extends \PHPUnit_Framework_TestCase
{
    private $filename;

    public function setUp()
    {
        //  We just take three characters here because that's the max number Windows based
        //  systems will use (and it should be sufficient in general)
        $randomPrefix = substr(md5(mt_rand()), 0, 3);
        $temporaryDirectory = sys_get_temp_dir();
        $this->filename = tempnam($temporaryDirectory, $randomPrefix);
    }

    public function tearDown()
    {
        if (file_exists($this->filename)) {
            unlink($this->filename);
        }
    }

    public function testProcess()
    {
        $expectedData = sha1(mt_rand());

        $sender = new File();
        $sender->setFilename($this->filename);

        $sender->process($expectedData);

        $actualData = file_get_contents($this->filename);

        $this->assertEquals($expectedData, $actualData);
    }
}
