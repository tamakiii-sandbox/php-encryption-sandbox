<?php

use Acme\Mcrypt;

require __DIR__ . '/../vendor/autoload.php';

$mcrypt = new Mcrypt(MCRYPT_BLOWFISH, MCRYPT_MODE_CBC);
echo bin2hex($mcrypt->generateIv());
