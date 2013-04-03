<?php

namespace CBerube\MessageHandlerService\Handler;

use CBerube\MessageHandlerService\Processor\Encryptor\DES;
use CBerube\MessageHandlerService\Formatter\Urgent as UrgentFormatter;
use CBerube\MessageHandlerService\Processor\Compressor\GZip;
use CBerube\MessageHandlerService\Processor\Sender\TcpIp;

class Urgent extends AbstractMessageHandler
{
    public function getFormatter()
    {
        return new UrgentFormatter();
    }

    public function getProcessorList()
    {
        return array(
            new DES(),
            new GZip(),
            new TcpIp()
        );
    }
}
