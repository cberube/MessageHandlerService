<?php

namespace CBerube\MessageHandlerService\Processor\Compressor;

use CBerube\MessageHandlerService\Processor\IProcessor;

class GZip implements IProcessor
{
    public function process($message)
    {
        return gzcompress($message);
    }
}
