<?php

use Acme\Mcrypt;

require __DIR__ . '/../vendor/autoload.php';

$data = file_get_contents('php://stdin');
$iv = hex2bin(file_get_contents($argv[1]));

$mcrypt = new Mcrypt(MCRYPT_BLOWFISH, MCRYPT_MODE_CBC);
$mcrypt->setIv($iv);
$decrypted = $mcrypt->decrypt(hex2bin($data), 'CryptKey');

echo $decrypted;
