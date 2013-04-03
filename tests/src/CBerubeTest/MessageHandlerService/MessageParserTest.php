<?php

namespace CBerubeTest\MessageHandlerService;

use CBerube\MessageHandlerService\MessageParser;

class MessageParserTest extends \PHPUnit_Framework_TestCase
{
    public function testParseMessage()
    {
        $message = ' 1234567890-Address------------+To+++++++++++++++++=From===============';
        $expectedContent = str_repeat("*", 255 - strlen($message));
        $message .= $expectedContent;

        $expectedData = array(
            'urgent'    => false,
            'timestamp' => '1234567890',
            'address'   => '-Address------------',
            'to'        => '+To+++++++++++++++++',
            'from'      => '=From===============',
            'content'   => $expectedContent
        );

        $messageParser = new MessageParser();
        $actualData = $messageParser->parse($message);

        $this->assertEquals($expectedData, $actualData);
    }
}
