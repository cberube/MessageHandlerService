<?php

namespace CBerubeTest\MessageHandlerService\Formatter;

use CBerube\MessageHandlerService\Formatter\Urgent;

class UrgentTest extends AbstractFormatterTest
{
    public function testFormat()
    {
        $message = $this->getUrgentTestMessage();

        $expectedText =
            'URGENT' . self::EXPECTED_LINE_SEPARATOR .
            'From: ' . $message['from'] . self::EXPECTED_LINE_SEPARATOR .
            'To: ' . $message['to'] . self::EXPECTED_LINE_SEPARATOR .
            'Address: ' . $message['address'] . self::EXPECTED_LINE_SEPARATOR .
            self::EXPECTED_LINE_SEPARATOR .
            $message['content'] . self::EXPECTED_LINE_SEPARATOR .
            self::EXPECTED_LINE_SEPARATOR .
            'Date/Time: ' . $message['timestamp'] . self::EXPECTED_LINE_SEPARATOR;

        $formatter = new Urgent();

        $actualText = $formatter->format($message);

        $this->assertEquals($expectedText, $actualText);
    }
}
