<?php

namespace CBerube\MessageHandlerService\Formatter;

class Normal implements IFormatter
{
    const MESSAGE_HEADER = 'NORMAL';
    const LINE_SEPARATOR = PHP_EOL;

    public function format($message)
    {
        return
            self::MESSAGE_HEADER . self::LINE_SEPARATOR .
            'Date/Time: ' . $message['timestamp'] . self::LINE_SEPARATOR .
            'From: ' . $message['from'] . self::LINE_SEPARATOR .
            'To: ' . $message['to'] . self::LINE_SEPARATOR .
            'Address: ' . $message['address'] . self::LINE_SEPARATOR .
            self::LINE_SEPARATOR .
            $message['content'];
    }
}
