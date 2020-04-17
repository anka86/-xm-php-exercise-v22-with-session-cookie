<?php

namespace AngelosKanatsos\XM\PHP\Core\MyTraits;

use Exception;

trait ExtensionCheckerTrait
{
    public static function checkExtension(string $extensionName): void
    {        
        if(!extension_loaded(basename($extensionName))) {
            throw new Exception("The extension \"" . basename($extensionName) . "\" is not enabled/installed.");
        }
    }

}
