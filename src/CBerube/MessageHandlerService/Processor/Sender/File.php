<?php

namespace CBerube\MessageHandlerService\Processor\Sender;

use CBerube\MessageHandlerService\Processor\IProcessor;

class File implements IProcessor
{
    const DEFAULT_FILENAME = 'C:\\audit.log';

    private $filename;

    public function __construct()
    {
        $this->setFilename(self::DEFAULT_FILENAME);
    }

    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    public function process($content)
    {
        file_put_contents($this->filename, $content, FILE_APPEND);
    }
}
