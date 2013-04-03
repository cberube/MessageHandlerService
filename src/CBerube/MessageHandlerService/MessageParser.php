<?php

namespace CBerube\MessageHandlerService;

class MessageParser
{
    const MESSAGE_PATTERN = '~^(.)(.{10})(.{20})(.{20})(.{20})(.+)$~';
    const URGENCY_SIGNIFIER = '*';

    private static $arrayItemNames = array(
        'urgent', 'timestamp', 'address', 'to', 'from', 'content'
    );

    public function parse($message)
    {
        preg_match(self::MESSAGE_PATTERN, $message, $messageParts);

        //  Throw away the complete match -- we don't need it
        array_shift($messageParts);

        //  Translate the urgency specifier
        $messageParts[0] = ($messageParts[0] == self::URGENCY_SIGNIFIER);

        //  Name the elements in the array
        $messageParts = array_combine(static::$arrayItemNames, $messageParts);

        return $messageParts;
    }
}
