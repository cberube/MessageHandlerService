<?php

namespace CBerube\MessageHandlerService\Processor\Encryptor;

use CBerube\MessageHandlerService\Processor\IProcessor;

class DES implements IProcessor
{
    const CIPHER = MCRYPT_DES;
    const KEY = '';
    const MODE = MCRYPT_MODE_CBC;

    private $initializationVector;

    public function __construct()
    {
        $initializationVectorSize = mcrypt_get_iv_size(self::CIPHER, self::MODE);
        $this->setInitializationVector(mcrypt_create_iv($initializationVectorSize));
    }

    public function setInitializationVector($initializationVector)
    {
        $this->initializationVector = $initializationVector;
    }

    public function process($message)
    {
        return mcrypt_encrypt(MCRYPT_DES, self::KEY, $message, self::MODE, $this->initializationVector);
    }
}
