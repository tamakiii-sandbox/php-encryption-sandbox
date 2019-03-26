<?php

use Acme\Mcrypt;

require __DIR__ . '/../vendor/autoload.php';

$data = file_get_contents('php://stdin');
$iv = hex2bin(file_get_contents($argv[1]));

$mcrypt = new Mcrypt(MCRYPT_BLOWFISH, MCRYPT_MODE_CBC, $iv);
$mcrypt->setIv($iv);
$encrypted = $mcrypt->encrypt($data, 'CryptKey');

echo bin2hex($encrypted);
