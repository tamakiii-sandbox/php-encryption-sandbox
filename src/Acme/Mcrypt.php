<?php

namespace Acme;

class Mcrypt
{
    const NO_DIRECTORY = '';

    private $cipher;
    private $mode;
    private $iv;
    private $algorithmDirectory = self::NO_DIRECTORY;
    private $modeDirectory = self::NO_DIRECTORY;
    private $ivSource = MCRYPT_DEV_URANDOM;

    public function __construct($cipher, $mode)
    {
        $this->cipher = $cipher;
        $this->mode = $mode;
    }

    public function setIv($iv)
    {
        $this->iv = $iv;
    }

    public function encrypt($data, $key)
    {
        $td = $this->open();
        mcrypt_generic_init($td, $key, $this->iv);

        $encrypted = mcrypt_generic($td, $data);

        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);

        return $encrypted;
    }

    public function decrypt($data, $key)
    {
        $td = $this->open();
        mcrypt_generic_init($td, $key, $this->iv);

        $decrypted = mdecrypt_generic($td, $data);

        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);

        return $decrypted;
    }

    private function open()
    {
        return mcrypt_module_open($this->cipher, $this->algorithmDirectory, $this->mode, $this->modeDirectory);
    }

    public function generateIv()
    {
        return $this->createIv($this->getIvSize());
    }

    public function getIvSize()
    {
        return mcrypt_get_iv_size($this->cipher, $this->mode);
    }

    public function createIv($size)
    {
        return mcrypt_create_iv($size, $this->ivSource);
    }
}
