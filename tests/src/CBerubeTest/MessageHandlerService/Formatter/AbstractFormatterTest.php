<?php

namespace CBerubeTest\MessageHandlerService\Formatter;

abstract class AbstractFormatterTest extends \PHPUnit_Framework_TestCase
{
    const EXPECTED_LINE_SEPARATOR = PHP_EOL;

    protected function getRandomString()
    {
        return md5(mt_rand());
    }

    protected function getNormalTestMessage()
    {
        return array(
            'urgent'    => false,
            'timestamp' => $this->getRandomString(),
            'address'   => $this->getRandomString(),
            'to'        => $this->getRandomString(),
            'from'      => $this->getRandomString(),
            'content'   => $this->getRandomString()
        );
    }

    protected function getUrgentTestMessage()
    {
        $message = $this->getNormalTestMessage();
        $message['urgent'] = true;

        return $message;
    }
}
