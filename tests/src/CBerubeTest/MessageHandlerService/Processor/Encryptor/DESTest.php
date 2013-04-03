<?php

namespace CBerubeTest\MessageHandlerService\Processor\Encryptor;

use CBerube\MessageHandlerService\Processor\Encryptor\DES;

class DESTest extends \PHPUnit_Framework_TestCase
{
    public function testProcess()
    {
        $message = sha1(mt_rand());
        $initializationVector = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_DES, MCRYPT_MODE_CBC));

        $expectedResult = mcrypt_encrypt(
            MCRYPT_DES,
            '',
            $message,
            MCRYPT_MODE_CBC,
            $initializationVector
        );

        $encryptor = new DES();
        $encryptor->setInitializationVector($initializationVector);
        $actualResult = $encryptor->process($message);

        $this->assertEquals($expectedResult, $actualResult);
    }
}
