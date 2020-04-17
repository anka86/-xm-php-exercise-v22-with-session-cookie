<?php

namespace AngelosKanatsos\XM\PHP\Core\Crypto;

use AngelosKanatsos\XM\PHP\Core\MyTraits\ExtensionCheckerTrait;

final class Openssl implements CryptographyInterface
{
    use ExtensionCheckerTrait {
        checkExtension as private;
    }

    private const METHOD = "AES-256-CBC";
    private $key = '';
    private $iv = '';

    // key and vector initialization
    public function __construct(string $userSecretPin = '')
    {
        ExtensionCheckerTrait::checkExtension(strtolower(basename(get_class($this))));
        $this->key = hash('sha256', 'ooooooooooooooooooof' . $userSecretPin);
        $this->iv = substr(hash('sha256', 'foooooooooooooooooooooooo'), 0, 16);
    }

    public function encrypt(string $plaintext): string
    {
        return openssl_encrypt($plaintext, self::METHOD, $this->key, 0, $this->iv);
    }

    public function decrypt(string $ciphertext): string
    {
        return openssl_decrypt($ciphertext, self::METHOD, $this->key, 0, $this->iv);
    }
}
