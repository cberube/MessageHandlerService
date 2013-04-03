<?php

namespace CBerubeTest\MessageHandlerService\Formatter;

use CBerube\MessageHandlerService\Formatter\Normal;

class NormalTest extends AbstractFormatterTest
{
    public function testFormat()
    {
        $message = $this->getNormalTestMessage();

        $expectedText =
            'NORMAL' . self::EXPECTED_LINE_SEPARATOR .
            'Date/Time: ' . $message['timestamp'] . self::EXPECTED_LINE_SEPARATOR .
            'From: ' . $message['from'] . self::EXPECTED_LINE_SEPARATOR .
            'To: ' . $message['to'] . self::EXPECTED_LINE_SEPARATOR .
            'Address: ' . $message['address'] . self::EXPECTED_LINE_SEPARATOR .
            self::EXPECTED_LINE_SEPARATOR .
            $message['content'];

        $formatter = new Normal();

        $actualText = $formatter->format($message);

        $this->assertEquals($expectedText, $actualText);
    }
}
