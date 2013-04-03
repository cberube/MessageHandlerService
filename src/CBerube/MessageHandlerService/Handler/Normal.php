<?php

namespace CBerube\MessageHandlerService\Handler;

use CBerube\MessageHandlerService\Formatter\Normal as NormalFormatter;
use CBerube\MessageHandlerService\Processor\Sender\File;

class Normal extends AbstractMessageHandler
{
    public function getFormatter()
    {
        return new NormalFormatter();
    }

    public function getProcessorList()
    {
        return array(
            new File()
        );
    }
}
