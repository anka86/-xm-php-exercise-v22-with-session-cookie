<?php

namespace AngelosKanatsos\XM\PHP\Core\Crypto;

interface CryptographyInterface
{
    public function encrypt(string $plaitext);
    public function decrypt(string $ciphertext);
}
