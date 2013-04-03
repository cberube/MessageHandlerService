<?php

namespace CBerubeTest\MessageHandlerService\Processor\Sender;

use CBerube\MessageHandlerService\Processor\Sender\TcpIp;

class TcpIpTest extends \PHPUnit_Framework_TestCase
{
    private $socketAddress;
    private $serverSocket;

    public function setUp()
    {
        $this->socketAddress = 'tcp://127.0.0.1:11000';
        $this->serverSocket = stream_socket_server($this->socketAddress);
    }

    public function tearDown()
    {
        fclose($this->serverSocket);
    }

    public function testProcess()
    {
        $expectedData = sha1(mt_rand());

        $sender = new TcpIp();

        $sender->connect($this->socketAddress);
        $sender->process($expectedData);

        $inputSocket = stream_socket_accept($this->serverSocket);
        $actualData = stream_get_contents($inputSocket);
        fclose($inputSocket);

        $this->assertEquals($expectedData, $actualData);
    }
}
