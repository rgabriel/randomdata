<?php

/**
 * Taken blantently from here:
 * https://wiki.php.net/rfc/splclassloader
 * 
 * You can use any autoloader that is PSR-0 compliant, this is just for the tests
 * 
 * @param string $className
 */
function autoloader($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';

    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }

    $fileName = __DIR__ . DIRECTORY_SEPARATOR . $fileName . $className . '.php';

    require $fileName;
}

spl_autoload_register('autoloader');