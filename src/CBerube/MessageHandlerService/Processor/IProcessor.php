<?php

namespace CBerube\MessageHandlerService\Processor;

interface IProcessor
{
    /**
     * @param string $message
     * @return void
     */
    public function process($message);
}
