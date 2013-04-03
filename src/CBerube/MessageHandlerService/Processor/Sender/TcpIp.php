<?php

namespace CBerube\MessageHandlerService\Processor\Sender;

use CBerube\MessageHandlerService\Processor\IProcessor;

class TcpIp implements IProcessor
{
    private $socketAddress;

    public function process($message)
    {
        $outputSocket = stream_socket_client($this->socketAddress);
        fwrite($outputSocket, $message);
        fclose($outputSocket);
    }

    public function connect($socketAddress)
    {
        $this->socketAddress = $socketAddress;
    }
}
