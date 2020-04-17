<?php

namespace AngelosKanatsos\XM\PHP\Core\Crypto;

use AngelosKanatsos\XM\PHP\Core\MyTraits\ExtensionCheckerTrait;

final class Sodium implements CryptographyInterface
{
    use ExtensionCheckerTrait {
        checkExtension as private;
    }

    private $key;
    private $nonce;

    public function __construct()
    {        
        ExtensionCheckerTrait::checkExtension(strtolower(get_class($this)));
        $this->key   = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES); 
        $this->nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES); 
    }

    public function encrypt(string $plaintext): string
    {
        return sodium_crypto_secretbox($plaintext, $this->nonce, $this->key);
    }

    public function decrypt(string $ciphertext): string
    {
        return sodium_crypto_secretbox_open($ciphertext, $this->nonce, $this->key);
    }
}
