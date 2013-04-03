<?php

namespace CBerube\MessageHandlerService\Handler;

abstract class AbstractMessageHandler
{
    public function handle($messageData)
    {
        $formatter = $this->getFormatter();
        $processorList = $this->getProcessorList();

        $content = $formatter->format($messageData);

        /** @var $processor \CBerube\MessageHandlerService\Processor\IProcessor */
        foreach ($processorList as $processor) {
            $processor->process($content);
        }
    }

    /**
     * @return \CBerube\MessageHandlerService\Formatter\IFormatter
     */
    abstract protected function getFormatter();

    /**
     * @return array
     */
    abstract protected function getProcessorList();
}
