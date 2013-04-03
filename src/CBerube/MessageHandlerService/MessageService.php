<?php

namespace CBerube\MessageHandlerService;

use CBerube\MessageHandlerService\Handler\Normal;
use CBerube\MessageHandlerService\Handler\Urgent;

class MessageService
{
    public function sendMessage($message)
    {
        $messageData = $this->parseMessage($message);

        $messageHandler = $this->getMessageHandler($messageData);
        $messageHandler->handle($messageData);
    }

    private function getMessageParser()
    {
        return new MessageParser();
    }

    private function getMessageHandler($messageData)
    {
        if ($messageData['urgent']) {
            return new Urgent();
        }

        return new Normal();
    }

    private function parseMessage($rawMessage)
    {
        $parser = $this->getMessageParser();
        return $parser->parse($rawMessage);
    }
}
