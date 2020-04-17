<?php

require_once __DIR__  . DIRECTORY_SEPARATOR . 'autoloader.inc.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'settings.inc.php';

use AngelosKanatsos\XM\PHP\Core\SessionLoader;

if (CHECK_SESSION && session_status() == PHP_SESSION_NONE) {
   $sessionLoader = new SessionLoader(CRYPTO_ALGO);
}

if(!isset($sessionLoader)){
   $messages[] = "If you want to enable Session Cookie, please set the CHECK_SESSION constant to TRUE in config > settings.inc.php";  
}
